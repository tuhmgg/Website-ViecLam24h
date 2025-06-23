<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\User;
use function PHPUnit\Framework\stringContains;

class JoblistingController extends Controller
{

    protected $casts = [
        'salary' => 'integer',
    ];
    public function index()
    {
//        return Listing::with('profile')->get();
//        lấy ra 8 job mới nhất phân trang
        $jobs = Listing::with('profile')->whereHas('profile')->approved()->latest()->paginate(8);
        $jobType = "";
        $salaryRange = "";
        $search = "";
        $address = "";
// đếm số lượng job
        $count = Listing::approved()->count();

//        dếm số lượng người đăng bài
        $countCompany = User::where('user_type', 'employer')->count();

// đêm số lượng employee trong model user
        $countEmployee = User::where('user_type', 'employee')->count();
        return view('homepage', compact('jobs' , 'count' , 'countCompany' , 'countEmployee', 'search', 'address' , 'jobType' , 'salaryRange'));
    }

//    hàm show() hiển thị job.show và sẽ lấy shortlisted trong pivot table
    public function show(Listing $listing)
    {
        // Kiểm tra xem tin có được duyệt không
        if ($listing->status !== 'approved') {
            abort(404, 'Tin tuyển dụng không tồn tại hoặc chưa được duyệt.');
        }
        
        $listing->load('users');
//        lấy user người đăng bài
        $user = User::where('id', $listing->user_id)->first();
        return view('job.show', compact('listing', 'user'));
    }

// hàm xử lý tìm kiếm
    public function search(Request $request)
    {

        // lấy ra tất cả các job có title giống với từ khóa tìm kiếm
        $jobType = $request->job_type;
        $salaryRange = $request->salary_range;
        $search = $request->search;
        $address = $request->address;
        $jobs = Listing::approved()->where(function($q) use ($search, $address, $jobType, $salaryRange){
            if($search){
                $q->where('title', 'like', "%{$search}%");
            }
            if($address){
                $q->where('address', 'like', "%{$address}%");
            }
            if($jobType){
                $q->where('job_type', $jobType);
            }
            if($salaryRange){
                if($salaryRange == "Thỏa Thuận") {
                    $q->where('salary', 0);
                }
                if($salaryRange == "Dưới 5 triệu") {
                    $q->whereBetween('salary', [1, 5000000]);
                }
                if($salaryRange == "5 - 10 triệu") {
                    $q->whereBetween('salary', [5000000, 10000000]);
                }
                if($salaryRange == "10 - 15 triệu") {
                    $q->whereBetween('salary', [10000000, 15000000]);
                }
                if($salaryRange == "Trên 15 triệu") {
                    $q->where('salary', '>=', 15000000);
                }

            }
        })->latest()->paginate(8);
        // đếm số lượng job
        $count = Listing::approved()->count();
        // đếm số lượng người đăng bài
        $countCompany = User::where('user_type','employer')->count();        
        // đếm số lượng employee trong model user
        $countEmployee = User::where('user_type', 'employee')->count();
        return view('homepage', compact('jobs' , 'count' , 'countCompany' , 'countEmployee', 'search', 'address' , 'jobType' , 'salaryRange'));
    }


}
