-- Thông tin thư mục dự án mẫu 

\*) Thư mục model: chứa các file php trong đó có:
pdo.php: file chứa các câu hàm thao tác với database, như kết nối db, thực thi câu lệnh sql (thêm, sửa, xóa), truy vấn dữ liệu, ...

- binh_luan.php: file chứa các hàm thao tác với bảng binh_luan trong db như thêm sửa xóa, truy vấn bình luận

- danh_muc.php: file chứa các hàm thao tác với bảng loai_hang trong db như thêm sửa xóa, truy vấn loại hàng, ...

- san_pham.php: file chứa các hàm thao tác với bảng hang_hoa trong db như thêm sửa xóa, truy vấn hàng hóa, ...

- tai_khoan.php: file chứa các hàm thao tác với bảng khach_hang trong db như thêm sửa xóa, truy vấn khách hàng, ...

thong_ke.php: file chứa các hàm thông kê các phần như sản phẩm hay bình luận

\*) Thư mục view: chứa các file hiển thị phía client(khách hàng) bao gồm tất cả các trang như: trang chủ, sản phẩm, chi tiết sản phẩm, đăng ký, đăng nhập, quên mật khẩu, đổi mật khẩu, cập nhật tài khoản và các thành phần trong trang

- layout: chứa các phần xuất hiện ở tất cả các trang (header, footer) và các thành phần của trang chủ (home)
- san_pham: chứa các phần của trang sản phẩm và chi tiết sản phẩm
- tai_khoan: chứa các phần của trang đăng nhập, đăng ký, quên mk, đổi mk, cập nhật tk

\*) Thư mục admin: chứa các file view(hiển thị) phía admin bao gồm các trang như thêm, sửa, xóa, danh sách, thống kê danh mục, sản phẩm, bình luận, tài khoản, ...

- layout: chứa các file xuất hiện chính ở các trang như header hay footer và trang chủ admin
- danh_muc: chứa các file như trang thêm sửa xóa danh mục và danh sách danh mục
- san_pham: chứa các file như trang thêm sửa xóa sản phẩm và danh sách sản phẩm
- binh_luan: chứa các file như trang thêm sửa xóa bình luận và danh sách bình luận
- tai_khoan: chứa các file như trang thêm sửa xóa tài khoản và danh sách tài khoản
- thong_ke: chứa các file như trang danh sách thống kê hàng hóa

\*) File global.php: chứa các biến toàn cục, biến có thể sử dụng cho toàn bộ trang web như:
thư mục upload hình ảnh cho client ($img_path)

\*) File index.php(global): đóng vai trò là controller điều khiển trang phía client tiếp nhận các request và thực hiện các yêu cầu đó
File index.php(admin): đóng vai trò là controller điều khiển trang phía admin tiếp nhận các request và thực hiện các yêu cầu đó


// Tạo bảng danh mục tin tức
CREATE TABLE danhmuctintuc (
    id_danhmuc INT AUTO_INCREMENT PRIMARY KEY,
    ten_danhmuc VARCHAR(255) NOT NULL
);

// Tạo bảng tin tức
CREATE TABLE tintuc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tieu_de VARCHAR(255) NOT NULL,
    noi_dung TEXT NOT NULL,
    hinh_anh VARCHAR(255) NOT NULL,
    id_danh_muc INT,
    FOREIGN KEY (id_danh_muc) REFERENCES danhmuctintuc(id_danhmuc)
);

// Thêm dữ liệu mẫu vào bảng danhmuctintuc
INSERT INTO danhmuctintuc (ten_danhmuc) VALUES
    ('Tin Công Nghệ'),
    ('Tin Khuyến Mại'),
    ('Chính Sách Bán Hàng');
