# Hướng Dẫn Đăng Nhập - Việc Làm 24h

## Tài Khoản Mẫu Đã Tạo

Hệ thống đã được tạo sẵn 3 tài khoản mẫu để test các chức năng khác nhau:

### 1. Tài Khoản Admin
- **Email**: `admin@vieclam24h.com`
- **Mật khẩu**: `admin123`
- **Quyền**: Quản trị toàn bộ hệ thống
- **Chức năng**: Duyệt tin tuyển dụng, quản lý người dùng, thống kê

### 2. Tài Khoản Nhà Tuyển Dụng
- **Email**: `employer@vieclam24h.com`
- **Mật khẩu**: `employer123`
- **Quyền**: Đăng tin tuyển dụng, quản lý ứng viên
- **Chức năng**: Đăng tin, xem danh sách ứng viên, quản lý tin đã đăng

### 3. Tài Khoản Ứng Viên
- **Email**: `employee@vieclam24h.com`
- **Mật khẩu**: `employee123`
- **Quyền**: Tìm việc, nộp hồ sơ
- **Chức năng**: Tìm kiếm việc làm, nộp hồ sơ, quản lý CV

## Cách Đăng Nhập

### Bước 1: Truy cập trang đăng nhập
- Vào đường dẫn: `/login`
- Hoặc click vào nút "Đăng nhập" trên trang chủ

### Bước 2: Nhập thông tin
- **Email**: Nhập email tương ứng với loại tài khoản muốn test
- **Mật khẩu**: Nhập mật khẩu tương ứng
- Click "Đăng Nhập"

### Bước 3: Chuyển hướng sau đăng nhập
- **Admin**: Sẽ được chuyển đến `/admin/dashboard`
- **Nhà tuyển dụng**: Sẽ được chuyển đến `/dashboard`
- **Ứng viên**: Sẽ được chuyển đến trang chủ `/`

## Chức Năng Theo Từng Loại Tài Khoản

### Admin (`admin@vieclam24h.com`)
1. **Dashboard Admin**: Thống kê tổng quan hệ thống
2. **Quản lý tin tuyển dụng**:
   - Xem tin chờ duyệt
   - Duyệt/từ chối tin
   - Xem tất cả tin với bộ lọc
3. **Quản lý người dùng**: Xem danh sách người dùng
4. **Menu "Quản Trị"**: Hiển thị trên thanh navigation

### Nhà Tuyển Dụng (`employer@vieclam24h.com`)
1. **Dashboard**: Thống kê tin đã đăng
2. **Đăng tin tuyển dụng**: Tạo tin mới
3. **Quản lý tin**: Xem, sửa, xóa tin đã đăng
4. **Quản lý ứng viên**: Xem danh sách ứng viên nộp hồ sơ
5. **Menu "Quản Lý Tuyển Dụng"**: Hiển thị trên thanh navigation

### Ứng Viên (`employee@vieclam24h.com`)
1. **Tìm kiếm việc làm**: Trên trang chủ
2. **Quản lý CV**: Tải lên, tạo CV mới
3. **Nộp hồ sơ**: Ứng tuyển vào các tin tuyển dụng
4. **Menu "Quản Lý CV"**: Hiển thị trên thanh navigation

## Lưu Ý Quan Trọng

### Về Email Xác Thực
- Tất cả tài khoản mẫu đã được xác thực email (`email_verified_at` đã được set)
- Trong thực tế, người dùng mới đăng ký cần xác thực email trước khi đăng nhập

### Về Quyền Truy Cập
- **Admin**: Có quyền truy cập tất cả chức năng
- **Nhà tuyển dụng**: Chỉ có quyền quản lý tin và ứng viên của mình
- **Ứng viên**: Chỉ có quyền quản lý CV và nộp hồ sơ

### Về Bảo Mật
- Các tài khoản mẫu chỉ dùng để test
- Trong môi trường production, nên thay đổi mật khẩu
- Không nên sử dụng mật khẩu đơn giản như trong ví dụ

## Troubleshooting

### Không đăng nhập được
1. Kiểm tra email và mật khẩu có đúng không
2. Đảm bảo email đã được xác thực
3. Kiểm tra kết nối database

### Không thấy menu chức năng
1. Đăng xuất và đăng nhập lại
2. Kiểm tra `user_type` trong database
3. Refresh trang

### Lỗi 403 "Không có quyền truy cập"
1. Đảm bảo đang sử dụng tài khoản admin
2. Kiểm tra middleware admin đã được cấu hình đúng
3. Xóa cache: `php artisan cache:clear`

## Tạo Tài Khoản Admin Mới

Nếu muốn tạo tài khoản admin mới, có thể:

### Cách 1: Sử dụng Tinker
```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Tên Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('matkhau123'),
    'user_type' => 'admin',
    'email_verified_at' => now(),
]);
```

### Cách 2: Cập nhật tài khoản hiện có
```sql
UPDATE users SET user_type = 'admin' WHERE email = 'email@example.com';
```

### Cách 3: Thêm vào DatabaseSeeder
Thêm vào file `database/seeders/DatabaseSeeder.php` và chạy:
```bash
php artisan db:seed
``` 