<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Thêm middleware kiểm tra quyền admin nếu cần
    }

    /**
     * Hiển thị dashboard admin
     */
    public function dashboard()
    {
        $totalJobs = Listing::count();
        $pendingJobs = Listing::pending()->count();
        $approvedJobs = Listing::approved()->count();
        $rejectedJobs = Listing::rejected()->count();
        $totalUsers = User::count();
        $pendingApplications = DB::table('listing_user')->where('application_status', 'pending')->count();
        $approvedApplications = DB::table('listing_user')->where('application_status', 'approved')->count();
        $rejectedApplications = DB::table('listing_user')->where('application_status', 'rejected')->count();

        $chartData = [
            'pending' => $pendingJobs,
            'approved' => $approvedJobs,
            'rejected' => $rejectedJobs,
        ];

        return view('admin.dashboard', compact(
            'totalJobs', 
            'pendingJobs', 
            'approvedJobs', 
            'rejectedJobs', 
            'totalUsers', 
            'pendingApplications',
            'approvedApplications',
            'rejectedApplications',
            'chartData'
        ));
    }

    /**
     * Hiển thị danh sách tin tuyển dụng chờ duyệt
     */
    public function pendingJobs()
    {
        $jobs = Listing::pending()
            ->with('profile')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pending-jobs', compact('jobs'));
    }

    /**
     * Hiển thị danh sách tất cả tin tuyển dụng
     */
    public function allJobs(Request $request)
    {
        $query = Listing::with('profile');

        // Bộ lọc theo trạng thái
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Tìm kiếm theo tiêu đề
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.all-jobs', compact('jobs'));
    }

    /**
     * Duyệt tin tuyển dụng
     */
    public function approveJob($id)
    {
        $job = Listing::findOrFail($id);
        $job->update(['status' => 'approved']);

        return back()->with('success', 'Tin tuyển dụng đã được duyệt thành công!');
    }

    /**
     * Từ chối tin tuyển dụng
     */
    public function rejectJob($id)
    {
        $job = Listing::findOrFail($id);
        $job->update(['status' => 'rejected']);

        return back()->with('success', 'Tin tuyển dụng đã bị từ chối!');
    }

    /**
     * Đặt lại trạng thái về chờ duyệt
     */
    public function resetJob($id)
    {
        $job = Listing::findOrFail($id);
        $job->update(['status' => 'pending']);

        return back()->with('success', 'Tin tuyển dụng đã được đặt lại về trạng thái chờ duyệt!');
    }

    /**
     * Xem chi tiết tin tuyển dụng
     */
    public function viewJob($id)
    {
        $job = Listing::with('profile')->findOrFail($id);
        return view('admin.view-job', compact('job'));
    }

    /**
     * Hiển thị danh sách người dùng
     */
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Hiển thị danh sách hồ sơ ứng tuyển chờ duyệt
     */
    public function pendingApplications()
    {
        $applications = DB::table('listing_user')
            ->join('listings', 'listing_user.listing_id', '=', 'listings.id')
            ->join('users', 'listing_user.user_id', '=', 'users.id')
            ->where('listing_user.application_status', 'pending')
            ->select(
                'listings.id as listing_id', 
                'listings.title as job_title', 
                'users.id as user_id', 
                'users.name as applicant_name', 
                'users.email as applicant_email', 
                'listing_user.created_at as application_date'
            )
            ->orderBy('listing_user.created_at', 'desc')
            ->paginate(10);

        return view('admin.pending-applications', compact('applications'));
    }

    /**
     * Duyệt hồ sơ ứng tuyển
     */
    public function approveApplication($listing_id, $user_id)
    {
        DB::table('listing_user')
            ->where('listing_id', $listing_id)
            ->where('user_id', $user_id)
            ->update(['application_status' => 'approved']);

        // Gửi mail thông báo cho nhà tuyển dụng (sẽ được thêm sau)
        
        return back()->with('success', 'Hồ sơ đã được duyệt và gửi đến nhà tuyển dụng.');
    }

    /**
     * Từ chối hồ sơ ứng tuyển
     */
    public function rejectApplication($listing_id, $user_id)
    {
        DB::table('listing_user')
            ->where('listing_id', $listing_id)
            ->where('user_id', $user_id)
            ->update(['application_status' => 'rejected']);

        return back()->with('success', 'Hồ sơ đã bị từ chối.');
    }

    /**
     * Hiển thị danh sách hồ sơ đã duyệt
     */
    public function approvedApplications()
    {
        $applications = DB::table('listing_user')
            ->join('users', 'listing_user.user_id', '=', 'users.id')
            ->join('listings', 'listing_user.listing_id', '=', 'listings.id')
            ->select(
                'listing_user.user_id',
                'listing_user.listing_id',
                'listing_user.application_status',
                'listing_user.created_at as application_date',
                'users.name as applicant_name',
                'users.email as applicant_email',
                'listings.title as job_title'
            )
            ->where('listing_user.application_status', 'approved')
            ->orderBy('listing_user.created_at', 'desc')
            ->paginate(10);

        return view('admin.approved-applications', compact('applications'));
    }

    /**
     * Hiển thị danh sách hồ sơ từ chối
     */
    public function rejectedApplications()
    {
        $applications = DB::table('listing_user')
            ->join('users', 'listing_user.user_id', '=', 'users.id')
            ->join('listings', 'listing_user.listing_id', '=', 'listings.id')
            ->select(
                'listing_user.user_id',
                'listing_user.listing_id',
                'listing_user.application_status',
                'listing_user.created_at as application_date',
                'users.name as applicant_name',
                'users.email as applicant_email',
                'listings.title as job_title'
            )
            ->where('listing_user.application_status', 'rejected')
            ->orderBy('listing_user.created_at', 'desc')
            ->paginate(10);

        return view('admin.rejected-applications', compact('applications'));
    }
}
