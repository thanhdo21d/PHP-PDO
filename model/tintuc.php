<?php
require_once "pdo.php";

// Thêm hàng hóa
function them_tin_tuc($tieu_de, $noi_dung, $hinh,  $id_blogs)
{
  $sql = "INSERT INTO tintuc(tieu_de, noi_dung, hinh, id_blogs ) VALUES('$tieu_de', '$noi_dung', '$hinh',  '$id_blogs')";
  pdo_execute($sql);
}

function lay_tintuc_theo_trang($order = "DESC") // Tham số order nhận giá trị mặc định DESC sắp xếp theo giảm dần
{
  $sql = "SELECT * FROM tintuc ORDER BY tieu_de $order";
  $ds_danh_blogs = pdo_query($sql);
  return $ds_danh_blogs;
}

// function cap_nhat_so_luot_xem($ma_hang_hoa)
// {
//   $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hang_hoa = $ma_hang_hoa";
//   pdo_execute($sql);
// }

// // Xóa hàng hóa theo mã hàng hóa
function xoa_tin_tuc($id)
{
  $sql = "DELETE FROM tintuc WHERE id = $id";
  pdo_execute($sql);
}

// // Truy vấn tất cả hàng hóa
// function lay_tat_ca_san_pham()
// {
//   $sql = "SELECT * FROM hang_hoa ORDER BY ma_hang_hoa DESC";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn tất cả hàng hóa theo sắp xếp theo số lượt xem giới hạn là 5 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
// function lay_san_pham_noi_bat()
// {
//   $sql = "SELECT * FROM hang_hoa WHERE 1 ORDER BY so_luot_xem DESC LIMIT 0,5";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn tất cả hàng hóa có thuộc tính đặc biệt là 1 sắp xếp theo mã hàng hóa giảm dần giới hạn là 5 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
// function lay_san_pham_dac_biet()
// {
//   $sql = "SELECT * FROM hang_hoa WHERE dac_biet = 1 ORDER BY ma_hang_hoa DESC LIMIT 0,5";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn tất cả hàng hóa sắp xếp theo mã hàng hóa giảm dần
// function lay_san_pham_moi()
// {
//   $sql = "SELECT * FROM hang_hoa WHERE 1 ORDER BY ma_hang_hoa DESC";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn một hàng hóa theo mã hàng hóa
function lay_tin_tuc_theo_ma($id)
{
  $sql = "SELECT * FROM tintuc WHERE id = $id";
  $san_pham = pdo_query_one($sql);
  return $san_pham;
}

// // Truy vấn tất cả hàng hóa theo mã loại(có cùng mã loại) và phải khác mã hàng hóa sắp xếp theo mã hàng hóa giảm giá giới hạn là 3 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
// function lay_san_pham_lien_quan($ma_hang_hoa, $ma_loai)
// {
//   $sql = "SELECT * FROM hang_hoa WHERE ma_loai = $ma_loai AND ma_hang_hoa <> $ma_hang_hoa ORDER BY ma_hang_hoa DESC LIMIT 0,3";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn tất cả hàng hóa theo loại hàng
// function lay_san_pham_theo_dm($ma_loai)
// {
//   $sql = "SELECT * FROM hang_hoa WHERE 1";
//   // Nếu tham số mã loại truyền vào lớn hơn 0
//   if ($ma_loai > 0) {
//     // Nối chuỗi biến $sql
//     // Truy vấn hàng hóa theo mã loại 
//     $sql .= " AND ma_loai = $ma_loai";
//   }
//   // Default nối chuỗi sắp xếp theo mã hàng hóa giảm dần
//   $sql .= " ORDER BY ma_hang_hoa DESC";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Truy vấn hàng hóa theo từ khóa
// function lay_san_pham_theo_kw($kw)
// {
//   // Truy vấn hàng hóa theo tên hàng hóa so sánh với từ khóa
//   // Sử dụng câu lệnh LIKE để so sánh tham số $kw truyền vào với tên hàng hóa
//   $sql = "SELECT * FROM hang_hoa WHERE ten_hang_hoa LIKE '%" . $kw . "%'";
//   $ds_san_pham = pdo_query($sql);
//   return $ds_san_pham;
// }

// // Cập nhật hàng hóa theo mã hàng hóa
function cap_nhat_tin_tuc($id, $tieu_de, $hinh,  $noi_dung, $id_blogs)
{
  // Nếu tham số hình khác rỗng(ở đây là người dùng có đăng tải hình ảnh lên)
  if ($hinh != "") {
    // Sẽ update tất cả bao gồm cả hình ảnh 
    $sql = "UPDATE tintuc SET tieu_de = '$tieu_de',  hinh = '$hinh',  noi_dung = '$noi_dung',  id_blogs = '$id_blogs' WHERE id = $id";
  } else {
    // Nếu tham số hình là rỗng(người dùng giữ nguyên) thì sẽ cập nhật tất cả trừ hình ảnh
    $sql = "UPDATE tintuc SET tieu_de = '$tieu_de',   noi_dung = '$noi_dung',  id_blogs = '$id_blogs' WHERE id = $id";
  }
  pdo_execute($sql);
}

// // Truy vấn hàng hóa theo trang page
// // Truyền vào 2 tham số order: sắp xếp theo cái gì đó, limit: giới hạn dữ liệu xuất hiện(hiển thị)
// function lay_tintuc_theo_trang($tieu_de, $limit)
// {
//   if (!isset($_GET['page'])) {
//     $_SESSION['page'] = 1;
//   }
//   if (!isset($_SESSION['total_page'])) {
//     $_SESSION['total_page'] = 1;
//   }
//   // Sử pdo_query_value để lấy giá trị của câu lệnh sql count trả về(ở đây là lấy số lượng hàng hóa trong bảng hang_hoa)
//   // Khởi tạo một biến $_SESSION['total_pro'](chứa số lượng sản phẩm)
//   $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM tintuc");
//   // Nếu tồn tại biến page ở trên url 
//   if (isset($_GET['page'])) {
//     // Khởi tạo $_SESSION['page'] chứa biến page
//     $_SESSION['page'] = $_GET['page'];
//   }
//   // Tạo biến begin để câu lệnh LIMIT lấy bắt đầu từ vị trí index = ?
//   $begin = ($_SESSION['page'] - 1) * $limit;
//   // ceil() làm tròn lên số nguyên gần nhất
//   // Lấy $_SESSION['total_pro'] chia cho tham số $limit truyền vào và làm tròn lên số nguyên gần nhất gán vào biến $_SESSION['total_page']
//   $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
//   // Truy vấn tất cả sản phẩm từ bảng hàng hóa sắp xếp theo tham số tieu_de truyền vào lấy tất cả sản phẩm từ vị trí $begin, và giới hạn $limit
//   $sql = "SELECT * FROM tintuc ORDER BY $order DESC LIMIT $begin, $limit";
//   return pdo_query($sql);
// }

// /*
//   Ví dụ: Nếu người dùng chọn vào phím 1(trang đầu tiên)

//   $_SESSION['total_pro'] = số lượng sản phẩm trong bảng hàng hóa (ở đây là 26 * có thể tăng ...) = 26

//   Nếu tồn tại biến page trên url thì lưu vào $_SESSION['page'] (trường hợp người dùng không nhấn vào trang số nào thường là khi mới vào trang sản phẩm thì mặc định $_SESSION['PAGE'] = 1)

//   Tính vị trí index đầu tiên bắt đầu lấy từ câu lệnh LIMIT và lưu vào biến $begin bằng :
//     Lấy số trang - 1 * với tham số giới hạn truyền vào(ví dụ là 16)
//          (1 - 1) * 16 = 0
         
//   Tính số trang để hiển thị số sản phẩm theo tham số $limit truyền vào và lưu vào biến $_SESSION['total_page'] bằng
//     Tổng số sản phẩm / giới hạn $limit truyền vào(16)
//         26 / 16 = 1.625 --> 2 Sử dụng ceil(làm tròn lên số nguyên gần nhất)

//   Viết câu lệnh sql truy vấn tất cả sản phẩm trong bảng hang_hoa sắp xếp theo tham số $order có thể truyền vào các thuộc tính trong bảng(ma_hang_hoa, ten_hang_hoa. don_gia, ...) và dùng câu lệnh LIMIT để lấy sản phẩm bắt đầu từ vị trí $begin(0) ở đây là do sắp xếp giảm dần nên sẽ lấy tử vị trí cuối cùng trở đi là $begin(26) và chỉ lấy giới hạn tổng số $limit(16) sản phẩm
  
//   Các trường hợp còn lại tương tự khi ấn vào trang số khác như 2, 3, 4, 5, ...
// */
