<p align="center"><a href="#" target="_blank"><img src="https://github.com/tuhmgg/Website-ViecLam24h/blob/master/public/image/logo-vieclam24h.png" width="250" height="200" alt="Logo"></a></p>



# Đề Tài Tốt Nghiệp: Website Việc Làm 24h 

## Tổng Quan Dự Án: 
Website Việc Làm 24h là một website tìm kiếm việc làm nhanh chóng và hiệu quả, chuyên cung cấp thông tin tuyển dụng đa ngành nghề trong phạm vi nội địa. Website được thiết kế tập trung, minh bạch và đổi mới nhằm mang đến trải nghiệm dễ sử dụng, dễ tiếp cận cho tất cả đối tượng người dùng, bao gồm sinh viên mới ra trường, người có kinh nghiệm làm việc, lao động phổ thông và cả các freelancer tự do.

### [Link Website] (https://github.com/tuhmgg/Website-ViecLam24h)

## 🎯 Mô tả
Website được xây dựng với mục tiêu cung cấp một nền tảng cho người tìm việc và nhà tuyển dụng. Có các tính năng chính sau:
- Đăng ký và đăng nhập cho ứng viên và nhà tuyển dụng.
- Tìm kiếm việc làm dựa trên mức lương, địa chỉ.
- Đăng tin tuyển dụng cho nhà tuyển dụng.
- Lưu trữ hồ sơ và thông tin cá nhân của người dùng.
- Công cụ tạo CV thu hút, nổi bật.
- Trợ lý AI thông minh giúp bạn lựa chọn nội dung.

## 💻 Công Nghệ Sử Dụng actions
- **Backend**
  - Laravel Framework
  - PHP > 8.2+
  - MySQL Database

- **Frontend**
  - HTML5, CSS3, JavaScript
  - Bootstrap
  - jQuery
  - AJAX
  - Thiết kế responsive

- **Bảo Mật**
  - Xác thực người dùng Mailpit
  - Mã hóa dữ liệu
  - Bảo vệ XSS
  - Bảo vệ CSRF
  
 **Mở rộng thêm trong tương lai**
  - Xác thực thanh toán gói Premium (Nhà tuyển dụng)

## 🎨 Cài đặt
1. **Cài Xampp**
   
3. **Cài Composer**

4. **Cài một IDE như PhpStorm hoặc VSCode**

5. **Cài đặt phụ thuộc**
   ```bash
    composer install
    composer dumpautoload -o
   ```
6. **Sao chép tệp .env**
   ```bash
    cp .env.example .env
    ```
9. **Tạo key cho ứng dụng**
    ```bash
    php artisan key:generate
    ```
9. **Xóa và tạo lại cache**
    ```bash
    php artisan config:clear
    php artisan config:cache
    ```
10. **Tạo symbolic link giữa storage và public**
    ```bash
    php artisan storage:link
    ```
11. **Chạy Miragte tạo DB**
    ```bash
    php artisan migrate

12. **Chạy server development**
    ```bash
    php artisan serve
    ```

## 🚀 Dữ Liệu Mẫu Và Các Phần Khác
Để import dữ liệu mẫu, bạn có thể sử dụng file SQL sau: [Link tới file SQL](laravel.sql)



