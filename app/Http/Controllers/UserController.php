<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;

class UserController extends Controller
{
//    hàm khởi tạo để xác định các route cần phải đăng nhập
    public function __construct()
    {
        $this->middleware(['auth'])->except(['login', 'register', 'storeTim', 'storeEmployer', 'createTim', 'createEmployer', 'postLogin']);
    }
    //    hàm này để hiển thị form đăng nhập
    public function login()
    {
        return view('user.login');
    }

//    hàm này để hiển thị form chọn người đăng ký
    public function register()
    {
        return view('user.register');
    }
    // hàm này để hiển thị form đăng ký cho ứng viên
    public  function createTim()
    {
        return view('user.tim-register');
    }

//    hàm lưu thông tin đăng ký của ứng viên
    public function storeTim(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => 'employee',
        ]);

        Auth::login($user);
// Gửi email xác minh
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('success', 'Vui lòng xác minh email để đăng nhập');
    }

//    hàm này để hiển thị form đăng ký cho nhà tuyển dụng
    public function createEmployer()
    {
        return view('user.employer-register');
    }


//    hàm lưu thông tin nhà tuyển dụng
    public function storeEmployer(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => 'employer',
            'user_trial' => now() -> addWeek()
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('success', 'Vui lòng xác minh email để đăng nhập');
    }

//    hàm xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->user_type == 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else if ($user->user_type == 'employer') {
                return redirect()->intended(route('dashboard'));
            } else if ($user->user_type == 'employee') {
                return redirect()->intended(route('homepage'));
            }
        }
        return back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
    }
//    hàm xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

//    hàm hiển thị thông tin cá nhân
    public function profile()
    {
        return view('user.profile');
    }

//    hàm cập nhật thông tin cá nhân
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = auth()->user();
        $updateData = $request->only(['name', 'about']);

        // Xử lý upload hình ảnh profile
        if($request->hasFile('profile_pic')){
            // Xóa hình ảnh cũ nếu có
            if($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)){
                Storage::disk('public')->delete($user->profile_pic);
            }
            
            // Lưu hình ảnh mới
            $imagePath = $request->file('profile_pic')->store('images', 'public');
            $updateData['profile_pic'] = $imagePath;
        }

        $user->update($updateData);

        return back()->with('message', 'Đã Cập Nhật Thông Tin Thành Công!');
    }

//    hàm cập nhật mật khẩu
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
//            'confirm_password' => 'required|confirmed'
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with(['error','Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('message', 'Đã Cập Nhật Mật Khẩu Thành Công!');
    }
//    hàm đăng CV cho employee
    public function updateCv(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx'
        ]);

        if($request->hasFile('resume')){
            $cvPath = $request->file('resume')->store('resume', 'public');
            User::find(auth()->user()->id)->update(['resume' => $cvPath]);
        }
        return back()->with('message', 'Đã tải lên CV Thành Công!');
    }

//    hàm xóa CV
    public function deleteCv()
    {
        $user = auth()->user();
        
        if ($user->resume) {
            // Xóa file CV từ storage
            if (Storage::disk('public')->exists($user->resume)) {
                Storage::disk('public')->delete($user->resume);
            }
            
            // Cập nhật database
            $user->update(['resume' => null]);
            
            return back()->with('message', 'Đã xóa CV thành công!');
        }
        
        return back()->with('error', 'Không có CV nào để xóa!');
    }

//    hàm tải CV từ CV builder
    public function uploadCvFromBuilder(Request $request)
    {
        try {
            $user = auth()->user();
            
            // Validate dữ liệu
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string|max:255',
                'about' => 'nullable|string',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'birthday' => 'nullable|date',
                'gender' => 'nullable|string|max:10',
                'address' => 'nullable|string|max:500',
                'skills' => 'nullable|string',
                'color' => 'nullable|string|max:7',
                'education' => 'nullable|array',
                'experience' => 'nullable|array',
                'certificates' => 'nullable|array',
                'hobbies' => 'nullable|array'
            ]);
            
            // Tạo PDF từ dữ liệu CV
            $cvData = $request->all();
            
            // Tạo tên file
            $fileName = 'cv_' . $user->id . '_' . time() . '.pdf';
            $filePath = 'resume/' . $fileName;
            
            // Tạo PDF content
            $pdfContent = $this->generateCvPdf($cvData);
            
            // Lưu file PDF
            Storage::disk('public')->put($filePath, $pdfContent);
            
            // Xóa CV cũ nếu có
            if ($user->resume && Storage::disk('public')->exists($user->resume)) {
                Storage::disk('public')->delete($user->resume);
            }
            
            // Cập nhật database
            $user->update(['resume' => $filePath]);
            
            // Trả về JSON response
            return response()->json([
                'success' => true,
                'message' => 'CV đã được tải lên thành công!',
                'redirect_url' => route('user.cv')
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi tải CV: ' . $e->getMessage()
            ], 500);
        }
    }
    
    private function generateCvPdf($cvData)
    {
        // Tạo nội dung HTML cho CV
        $html = view('pdf.cv-template', compact('cvData'))->render();
        
        // Cấu hình Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        
        // Tạo PDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        return $dompdf->output();
    }

//    hàm hiển thị view đăng CV
    public function cv()
    {
//        không cho emplouer đăng cv
        if(auth()->user()->user_type == 'employer')
            return redirect()->route('dashboard')->with('error', 'Bạn là nhà tuyển dụng, không có quyền truy cập vào trang này');
        return view('user.cv');
    }

//    hàm xem cv đã tải lên
    public function viewCv(Request $request, $user_id = null)
    {
        // Nếu admin xem CV của người khác
        if (auth()->check() && auth()->user()->user_type === 'admin' && $user_id) {
            $user = User::findOrFail($user_id);
        } else {
            // Người dùng tự xem CV của mình
            $user = auth()->user();
        }

        if (!$user || !$user->resume) {
            abort(404, 'Không tìm thấy CV.');
        }

        // Kiểm tra xem file có trong public/img không
        if (strpos($user->resume, 'img/') === 0) {
            $path = public_path($user->resume);
            if (!file_exists($path)) {
                abort(404, 'File CV không tồn tại.');
            }
            return response()->file($path);
        } else {
            // File trong storage
            $path = Storage::path('public/'.$user->resume);
            if (!Storage::exists('public/'.$user->resume)) {
                abort(404, 'File CV không tồn tại.');
            }
            return response()->file($path);
        }
    }

//    hàm hiển thị form tạo cv
    public function createCv()
    {
        return view('user.create-cv');
    }


//    lấy các trường trong form tạo cv và xem trước cv
    public function previewPDF( Request $request)
    {
        $data = $request->all();
        $imagePath = null;
        
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
        }
        
        // Hiển thị view PDF thay vì tạo file PDF
        return view('pdf', compact('data', 'imagePath'));
    }

//    hàm lưu mẫu CV
    public function saveCvTemplate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'des' => 'required|string',
            'phone' => 'required|string|max:20',
            'mail' => 'required|email|max:255',
            'social' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'school-1' => 'required|string|max:255',
            'des-school-1' => 'required|string',
            'school-2' => 'nullable|string|max:255',
            'des-school-2' => 'nullable|string',
            'company-name-1' => 'required|string|max:255',
            'position-1' => 'required|string|max:255',
            'pos-des-1' => 'required|string',
            'company-name-2' => 'nullable|string|max:255',
            'position-2' => 'nullable|string|max:255',
            'pos-des-2' => 'nullable|string',
            'skill-1' => 'required|string|max:255',
            'skill-2' => 'nullable|string|max:255',
            'certificate' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = auth()->user();
        
        // Xử lý upload hình ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('img')) {
            // Xóa hình ảnh cũ nếu có
            if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            
            // Lưu hình ảnh mới
            $imagePath = $request->file('img')->store('images', 'public');
        }

        // Lưu thông tin CV vào database
        $cvData = [
            'name' => $request->input('name'),
            'description' => $request->input('des'),
            'phone' => $request->input('phone'),
            'email' => $request->input('mail'),
            'social' => $request->input('social'),
            'address' => $request->input('address'),
            'school_1' => $request->input('school-1'),
            'des_school_1' => $request->input('des-school-1'),
            'school_2' => $request->input('school-2'),
            'des_school_2' => $request->input('des-school-2'),
            'company_name_1' => $request->input('company-name-1'),
            'position_1' => $request->input('position-1'),
            'pos_des_1' => $request->input('pos-des-1'),
            'company_name_2' => $request->input('company-name-2'),
            'position_2' => $request->input('position-2'),
            'pos_des_2' => $request->input('pos-des-2'),
            'skill_1' => $request->input('skill-1'),
            'skill_2' => $request->input('skill-2'),
            'certificate' => $request->input('certificate'),
        ];

        // Loại bỏ các giá trị null
        $cvData = array_filter($cvData, function($value) {
            return $value !== null && $value !== '';
        });

        // Cập nhật thông tin user
        $user->update([
            'name' => $cvData['name'],
            'about' => $cvData['description'],
            'profile_pic' => $imagePath ?: $user->profile_pic,
            'cv_template' => json_encode($cvData, JSON_UNESCAPED_UNICODE)
        ]);

        // Refresh session để đảm bảo dữ liệu được cập nhật
        auth()->user()->refresh();
        
        // Debug: Log dữ liệu đã lưu
        \Log::info('CV Template saved:', $cvData);
        \Log::info('CV Template JSON:', ['json' => json_encode($cvData, JSON_UNESCAPED_UNICODE)]);
        \Log::info('User updated:', ['user_id' => $user->id, 'cv_template' => $user->cv_template]);

        return back()->with('message', 'Đã lưu mẫu CV cập nhật thành công! Bạn có thể sử dụng mẫu này cho lần tạo CV tiếp theo.');
    }

    public function downloadCvPdfFromBuilder(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string|max:255',
                'about' => 'nullable|string',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'birthday' => 'nullable|date',
                'gender' => 'nullable|string|max:10',
                'address' => 'nullable|string|max:500',
                'skills' => 'nullable|string',
                'color' => 'nullable|string|max:7',
                'education' => 'nullable|array',
                'experience' => 'nullable|array',
                'certificates' => 'nullable|array',
                'hobbies' => 'nullable|array'
            ]);
            $cvData = $request->all();
            $html = view('pdf.cv-template', compact('cvData'))->render();
            $options = new \Dompdf\Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('isRemoteEnabled', true);
            $options->set('defaultFont', 'DejaVu Sans');
            $dompdf = new \Dompdf\Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            return response($dompdf->output(), 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="cv-vieclam24h.pdf"');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response('Lỗi validate: ' . json_encode($e->errors(), JSON_UNESCAPED_UNICODE), 500);
        } catch (\Exception $e) {
            return response('Lỗi khi tạo PDF: ' . $e->getMessage(), 500);
        }
    }

}
