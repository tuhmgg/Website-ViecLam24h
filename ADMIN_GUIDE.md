# Hướng Dẫn Sử Dụng Chức Năng Duyệt Tin Tuyển Dụng

## Tổng Quan

Hệ thống duyệt tin tuyển dụng cho phép admin kiểm soát và quản lý các tin tuyển dụng trước khi chúng được hiển thị công khai trên website.

## Các Trạng Thái Tin Tuyển Dụng

1. **Chờ duyệt (pending)**: Tin tuyển dụng mới được đăng, chưa được admin xem xét
2. **Đã duyệt (approved)**: Tin tuyển dụng đã được admin duyệt và hiển thị công khai
3. **Bị từ chối (rejected)**: Tin tuyển dụng bị admin từ chối, không hiển thị công khai

## Cách Thiết Lập Admin

### 1. Tạo tài khoản admin
Cập nhật trường `user_type` trong bảng `users` thành `'admin'` cho tài khoản muốn cấp quyền admin:

```sql
UPDATE users SET user_type = 'admin' WHERE email = 'admin@example.com';
```

### 2. Truy cập Admin Dashboard
- Đăng nhập với tài khoản admin
- Vào menu "Quản Trị" trên thanh navigation
- Chọn "Dashboard Admin"

## Các Chức Năng Admin

### 1. Dashboard Admin (`/admin/dashboard`)
- Hiển thị thống kê tổng quan:
  - Tổng số tin tuyển dụng
  - Số tin chờ duyệt
  - Số tin đã duyệt
  - Số tin bị từ chối
  - Tổng số người dùng

### 2. Tin chờ duyệt (`/admin/pending-jobs`)
- Xem danh sách tin tuyển dụng chờ duyệt
- Duyệt hoặc từ chối tin
- Xem chi tiết tin tuyển dụng

### 3. Tất cả tin tuyển dụng (`/admin/all-jobs`)
- Xem tất cả tin tuyển dụng với bộ lọc theo trạng thái
- Tìm kiếm theo tiêu đề
- Duyệt/từ chối/đặt lại trạng thái tin

### 4. Quản lý người dùng (`/admin/users`)
- Xem danh sách tất cả người dùng
- Thông tin về loại tài khoản và trạng thái xác thực

### 5. Xem chi tiết tin (`/admin/job/{id}`)
- Xem đầy đủ thông tin tin tuyển dụng
- Thông tin người đăng
- Thực hiện các thao tác duyệt/từ chối

## Các Thao Tác Chính

### Duyệt tin tuyển dụng
1. Vào trang "Tin chờ duyệt" hoặc "Tất cả tin tuyển dụng"
2. Nhấn nút "Duyệt" (✓) bên cạnh tin cần duyệt
3. Xác nhận hành động

### Từ chối tin tuyển dụng
1. Vào trang "Tin chờ duyệt" hoặc "Tất cả tin tuyển dụng"
2. Nhấn nút "Từ chối" (✗) bên cạnh tin cần từ chối
3. Xác nhận hành động

### Đặt lại trạng thái
1. Vào trang "Tất cả tin tuyển dụng"
2. Nhấn nút "Đặt lại" (↶) bên cạnh tin cần đặt lại
3. Tin sẽ được đặt về trạng thái "Chờ duyệt"

## Bảo Mật

- Chỉ người dùng có `user_type = 'admin'` mới có thể truy cập các trang admin
- Middleware `AdminMiddleware` kiểm tra quyền truy cập
- Tất cả routes admin đều được bảo vệ

## Lưu Ý Quan Trọng

1. **Tin chưa duyệt**: Không hiển thị trên trang chủ và không thể truy cập công khai
2. **Tin đã duyệt**: Hiển thị bình thường trên website
3. **Tin bị từ chối**: Không hiển thị công khai nhưng vẫn lưu trong database
4. **Thống kê**: Chỉ đếm tin đã duyệt trên trang chủ

## Troubleshooting

### Lỗi 403 "Bạn không có quyền truy cập trang này"
- Kiểm tra `user_type` trong database có phải là `'admin'` không
- Đăng xuất và đăng nhập lại

### Không thấy menu "Quản Trị"
- Đảm bảo tài khoản có `user_type = 'admin'`
- Refresh trang

### Tin không hiển thị trên trang chủ
- Kiểm tra trạng thái tin có phải là `'approved'` không
- Duyệt tin nếu đang ở trạng thái `'pending'` 