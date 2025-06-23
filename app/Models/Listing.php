<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'predes',
        'description',
        'roles',
        'job_type',
        'address',
        'salary',
        'application_close_date',
        'feature_image',
        'slug',
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'listing_user', 'listing_id', 'user_id')
            ->withPivot(['shortlisted', 'application_status'])
            ->withTimestamps();
    }

    public function profile(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Scope để lọc tin đã được duyệt
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope để lọc tin chờ duyệt
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope để lọc tin bị từ chối
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

//
}
