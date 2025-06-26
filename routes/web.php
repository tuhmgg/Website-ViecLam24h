<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isPremiumUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavoriteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [JoblistingController::class, 'index'])->name('homepage');
// route tới about
Route::get('/about', function () {
    return view('about');
})->name('about');

// route tới contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//route tới help
Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('job/show/{listing:slug}', [JoblistingController::class, 'show'])->name('job.show');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/register/tim', [UserController::class, 'createTim'])->name('create.tim');
Route::post('/register/tim', [UserController::class, 'storeTim'])->name('store.tim');

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'postLogin'])->name('login.post');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware(['auth', 'verified']);
Route::post('user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update')->middleware(['auth', 'verified']);
Route::post('user/profile/password', [UserController::class, 'updatePassword'])->name('user.profile.password')->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])  
    ->name('dashboard');
Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('user/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');


//
Route::get('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

Route::post('pay/monthly', [SubscriptionController::class, 'pay'])->name('pay.monthly');
Route::post('pay/yearly', [SubscriptionController::class, 'pay'])->name('pay.yearly');
Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');

Route::get('job/create', [PostJobController::class, 'create'])->name('job.create');
Route::post('job/store', [PostJobController::class, 'store'])->name('job.store');
Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
Route::put('job/{listing}/update', [PostJobController::class, 'update'])->name('job.update');
Route::get('job', [PostJobController::class, 'index'])->name('job.index');
Route::get('job/{id}/delete', [PostJobController::class, 'destroy'])->name('job.delete');

Route::get('user/cv', [UserController::class, 'cv'])->name('user.cv');
Route::post('user/cv', [UserController::class, 'updateCv'])->name('user.cv.update');
Route::delete('user/cv', [UserController::class, 'deleteCv'])->name('user.cv.delete');
Route::post('user/cv/upload-from-builder', [UserController::class, 'uploadCvFromBuilder'])->name('user.cv.upload-from-builder');
Route::get('user/cv/view/{user_id?}', [UserController::class, 'viewCv'])->name('user.cv.view');

Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('applicants/{listing:slug}', [ApplicantController::class, 'view'])->name('applicants.view');
Route::delete('/applicants/{listingId}/{userId}', [ApplicantController::class, 'removeApplicant'])->name('applicants.remove');
Route::post('shortlist/{listingId}/{userId}', [ApplicantController::class, 'shortlist'])->name('applicant.shortlist');

Route::post('/application/{listingId}/submit', [ApplicantController::class, 'apply'])->name('application.submit');

// route job.search và route job.filter
Route::get('/job/search', [JoblistingController::class, 'search'])->name('job.search');

// route tới suggest
Route::get('/suggest', [SuggestController::class, 'index'])->name('suggest.index');

Route::post('/suggest', [SuggestController::class, 'suggest'])->name('suggest');


// route tới tạo cv
Route::get('/user/cv/create', [UserController::class, 'createCv'])->name('create.cv');

// bật tắt nhận việc mail
Route::post('/user/mail', [DashboardController::class, 'mail'])->name('user.mail');


//route tới xem preview pdf
Route::get('/user/cv/preview', [UserController::class, 'previewPDF'])->name('preview.pdf');
Route::post('/user/cv/preview', [UserController::class, 'previewPDF'])->name('preview.pdf.post');

//route tới lưu mẫu CV
Route::post('/user/cv/save-template', [UserController::class, 'saveCvTemplate'])->name('save.cv.template')->middleware(['auth', 'verified']);

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pending-jobs', [AdminController::class, 'pendingJobs'])->name('pending-jobs');
    Route::get('/all-jobs', [AdminController::class, 'allJobs'])->name('all-jobs');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/job/{id}', [AdminController::class, 'viewJob'])->name('view-job');
    Route::post('/job/{id}/approve', [AdminController::class, 'approveJob'])->name('approve-job');
    Route::post('/job/{id}/reject', [AdminController::class, 'rejectJob'])->name('reject-job');
    Route::post('/job/{id}/reset', [AdminController::class, 'resetJob'])->name('reset-job');

    // Application management routes
    Route::get('/applications/pending', [AdminController::class, 'pendingApplications'])->name('applications.pending');
    Route::post('/application/{listing_id}/{user_id}/approve', [AdminController::class, 'approveApplication'])->name('application.approve');
    Route::post('/application/{listing_id}/{user_id}/reject', [AdminController::class, 'rejectApplication'])->name('application.reject');
});

Route::post('/user/cv/download-pdf', [App\Http\Controllers\UserController::class, 'downloadCvPdfFromBuilder'])->name('user.cv.downloadPdf');

Route::middleware(['auth'])->group(function () {
    Route::post('/favorites/{listing}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});