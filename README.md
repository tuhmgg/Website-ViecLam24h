<p align="center"><a href="#" target="_blank"><img src="https://github.com/tuhmgg/Website-ViecLam24h/blob/master/public/image/logo-vieclam24h.png" width="200" alt="Logo"></a></p>



# Đề Tài Tốt Nghiệp: Website Tìm Kiếm Việc Làm

Đây là dự án đề tài tốt nghiệp - xây dựng Website Việc Làm 24h.

## Mô Tả

Website được xây dựng với mục tiêu cung cấp một nền tảng cho người tìm việc và nhà tuyển dụng. Có các tính năng chính sau:
- Đăng ký và đăng nhập cho ứng viên và nhà tuyển dụng.
- Tìm kiếm việc làm dựa trên mức lương, địa chỉ.
- Đăng tin tuyển dụng cho nhà tuyển dụng.
- Lưu trữ hồ sơ và thông tin cá nhân của người dùng.
- Công cụ tạo CV thu hút, nổi bật.
- Trợ lý AI thông minh giúp bạn lựa chọn nội dung.

## Cài đặt
### Hướng dẫn cài đặt và chạy project Laravel sau khi clone từ GitHub
0. <b>Lưu Lý:</b> tôi đã deploy sẵn trang web nên để tiết kiệm thời gian bạn có thể bỏ qua bước cài đặt. Và đến phần [Xem Website](#Xem-Website)
1. Cài Xampp
2. Cài Composer
3. Cài một IDE như PhpStorm hoặc VSCode

### Di chuyển vào thư mục project và chạy các lệnh
    composer install
    composer dumpautoload -o
Cấu hình tập tin .env
Sao chép từ tập tin mẫu .env.example sang .env

    cp .env.example .env
    
Tạo key cho ứng dụng

    php artisan key:generate
    
Chỉnh sửa các thông số cấu hình trong tập tin .env cho phù hợp môi trường (APP_, DB_, Mật khẩu DB) ví dụ [Link tới file .env mẫu](File_env_cua_toi)

Xóa và tạo lại cache

    php artisan config:clear
    php artisan config:cache
    
Tạo symbolic link giữa storage và public

    php artisan storage:link

Chạy Miragte tạo DB

    php artisan migrate

Chạy server development

    php artisan serve
    
Như vậy là đã sẵn sàng để chạy project Laravel sau khi clone từ GitHub.

## Dữ Liệu Mẫu Và Các Phần Khác

### Bạn có thể tự tạo tài khoản đăng bài với dữ liệu của bạn nếu không có thể dùng dữ liệu dưới đây.

Để import dữ liệu mẫu, bạn có thể sử dụng file SQL sau: [Link tới file SQL](laravel.sql)

Tài khoản:
- 0306221090@caothang.edu.vn (Minh Tú)|tuhm4910
- 0306221013@caothang.edu.vn (Tiến Đạt)|tiendat0306


