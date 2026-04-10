# Course Management System (CMS) - Laravel

## Giới thiệu
Hệ thống quản lý khóa học (Course Management System) là một ứng dụng web mini được xây dựng bằng Laravel để quản lý các khóa học trực tuyến, bài giảng và học viên.

## Chức năng chính
- **Dashboard**: Thống kê tổng quan về số lượng khóa học, học viên và doanh thu.
- **Quản lý Khóa học (Course CRUD)**:
  - Thêm, sửa, xóa (Soft Delete) khóa học.
  - Tự động tạo Slug.
  - Tải lên hình ảnh đại diện.
  - Tìm kiếm và lọc theo trạng thái.
- **Quản lý Bài học (Lesson)**:
  - Quản lý danh sách bài học theo từng khóa học.
  - Sắp xếp bài học theo thứ tự.
- **Quản lý Đăng ký (Enrollment)**:
  - Đăng ký học viên vào khóa học.
  - Quản lý danh sách học viên theo từng khóa.

## Yêu cầu hệ thống
- PHP >= 8.2
- Composer
- MySQL/MariaDB (XAMPP)

## Hướng dẫn cài đặt và chạy
1. **Clone hoặc tải mã nguồn về máy.**
2. **Cài đặt dependencies**:
   ```bash
   composer install
   ```
3. **Cấu hình môi trường**:
   - Sao chép file `.env.example` thành `.env`.
   - Cấu hình cơ sở dữ liệu trong `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=course_system
     DB_USERNAME=root
     DB_PASSWORD=
     ```
4. **Tạo Database**: Tạo một database tên là `course_system` trong phpMyAdmin.
5. **Chạy Migrations**:
   ```bash
   php artisan migrate
   ```
6. **Tạo link storage**:
   ```bash
   php artisan storage:link
   ```
7. **Chạy ứng dụng**:
   ```bash
   php artisan serve
   ```
8. **Truy cập**: Mở trình duyệt và vào `http://127.0.0.1:8000`.

## Công nghệ sử dụng
- **Framework**: Laravel 11.x
- **Database**: MySQL
- **Frontend**: Blade Template, Vanilla CSS, FontAwesome.
- **Tính năng nâng cao**: Eloquent Relationships, Form Requests, Soft Deletes, Query Optimization (withCount).
