<?php

namespace App\Http\Controllers;

use App\Mail\ShortlistMail;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //        lấy ra số lượng job của user và lấy thông tin các user đã ứng tuyển
        $shortlists = Listing::latest()->with('users')->where('user_id', auth()->user()->id)->get();

//        lấy ra số lượng user chưa được shortlist trong các job vừa lấy và lưu vào mảng $counts
        $counts = [];
        foreach ($shortlists as $shortlist) {
            $count = 0;
            foreach ($shortlist->users as $user) {
                if($user->pivot->shortlisted == false)
                    $count++;
            }
            array_push($counts, $count);
        }

        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();

//cho count vừa rồi vào mảng $listings
        foreach ($listings as $key => $listing) {
            $listing->count = $counts[$key];
        }

        return view('applicants.index', compact('listings', 'shortlists'));
    }

    public function view(Listing $listing)
    {
        if($listing->user_id != auth()->user()->id){
            abort(403);
        }
        
        // Lấy ra tất cả ứng viên (không chỉ những người đã được admin duyệt)
        $users = $listing->users()->paginate(6);

        return view('applicants.view', compact('listing', 'users'));
    }

    public function shortlist($listingId, $userId)
    {
        $company_name = auth()->user()->name;
        $company_email = auth()->user()->email;

        $listing = Listing::find($listingId);
        $user = User::find($userId);
        if($listing){
            $listing->users()->updateExistingPivot($userId, ['shortlisted' => true]);
            
            // Gửi email thông báo cho ứng viên được thêm vào danh sách
            try {
                Mail::to($user->email)->queue(new ShortlistMail($user->name, $listing->title, $company_name, $company_email));
            } catch (\Exception $e) {
                // Log lỗi nếu không gửi được email nhưng vẫn cập nhật trạng thái
                \Log::error('Không thể gửi email thông báo: ' . $e->getMessage());
            }
            
            return redirect()->back()->with('message', 'Đã thêm vào danh sách và gửi email thông báo');
        }
        return redirect()->back();
    }

    public function apply($listingId)
    {
        $user = auth()->user();
        
        // Kiểm tra user đã đăng nhập
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Kiểm tra user có phải là employee không
        if ($user->user_type !== 'employee') {
            return back()->with('error', 'Chỉ ứng viên mới có thể ứng tuyển.');
        }
        
        // Kiểm tra CV
        if(!$user->resume){
            return back()->with('error', 'Vui lòng tải lên CV trước khi ứng tuyển.');
        }
        
        // Kiểm tra xem đã ứng tuyển chưa
        $existingApplication = $user->listings()->where('listing_id', $listingId)->first();
        
        if ($existingApplication) {
            $applicationStatus = $existingApplication->pivot->application_status;
            
            // Nếu đã bị từ chối, cho phép ứng tuyển lại
            if ($applicationStatus === 'rejected') {
                $user->listings()->updateExistingPivot($listingId, [
                    'application_status' => 'pending',
                    'shortlisted' => false
                ]);
                return back()->with('message', 'Đã ứng tuyển lại thành công. Hồ sơ của bạn đang chờ quản trị viên duyệt.');
            } else {
                return back()->with('error', 'Bạn đã ứng tuyển vị trí này rồi.');
            }
        }
        
        // Thêm vào danh sách ứng tuyển
        $user->listings()->attach($listingId, [
            'shortlisted' => false,
            'application_status' => 'pending'
        ]);
        
        return back()->with('message', 'Đã ứng tuyển thành công. Hồ sơ của bạn đang chờ quản trị viên duyệt.');
    }

    public function removeApplicant($listingId, $userId)
    {
        $listing = Listing::findOrFail($listingId);

        if ($listing->user_id !== auth()->id()) {
            abort(403, 'Không có quyền thực hiện hành động này.');
        }

        $listing->users()->detach($userId);

        return redirect()->back()->with('message', 'Đã xóa ứng viên khỏi danh sách ứng tuyển.');
    }

    public function rejectApplicant($listingId, $userId)
    {
        $listing = Listing::findOrFail($listingId);
        
        // Kiểm tra quyền: chỉ admin hoặc chủ tin tuyển dụng mới có thể từ chối
        if (auth()->user()->user_type !== 'admin' && $listing->user_id !== auth()->id()) {
            abort(403, 'Không có quyền thực hiện hành động này.');
        }
        
        // Cập nhật trạng thái thành rejected
        $listing->users()->updateExistingPivot($userId, [
            'application_status' => 'rejected',
            'shortlisted' => false
        ]);
        
        return redirect()->back()->with('message', 'Đã từ chối ứng viên thành công.');
    }
}
