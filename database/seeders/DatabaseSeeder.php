<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Tạo tài khoản admin mẫu
        User::create([
            'name' => 'Admin',
            'email' => 'admin@vieclam24h.com',
            'password' => Hash::make('admin123'),
            'user_type' => 'admin',
            'email_verified_at' => now(), // Đã xác thực email
        ]);

        // Tạo tài khoản employer mẫu
        User::create([
            'name' => 'Nhà Tuyển Dụng',
            'email' => 'employer@vieclam24h.com',
            'password' => Hash::make('employer123'),
            'user_type' => 'employer',
            'email_verified_at' => now(),
            'user_trial' => now()->addWeek(),
        ]);

        // Tạo tài khoản employee mẫu
        User::create([
            'name' => 'Ứng Viên',
            'email' => 'employee@vieclam24h.com',
            'password' => Hash::make('employee123'),
            'user_type' => 'employee',
            'email_verified_at' => now(),
        ]);
    }
}
