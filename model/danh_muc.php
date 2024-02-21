<?php
require_once "pdo.php";

// Thêm loại hàng
function them_danh_muc($ten_loai)
{
  $sql = "INSERT INTO loai_hang(ten_loai) VALUES('$ten_loai')";
  pdo_execute($sql);
}

// Xóa loại hàng theo mã loại
function xoa_danh_muc($ma_loai)
{
  $sql = "DELETE FROM loai_hang WHERE ma_loai = $ma_loai";
  pdo_execute($sql);
}

// Truy vấn tất cả dữ liệu của bảng loại hàng
function lay_tat_ca_danh_muc($order = "DESC") // Tham số order nhận giá trị mặc định DESC sắp xếp theo giảm dần
{
  $sql = "SELECT * FROM loai_hang ORDER BY ma_loai $order";
  $ds_danh_muc = pdo_query($sql);
  return $ds_danh_muc;
}

// Truy vấn một loại hàng theo mã loại
function lay_danh_muc_theo_ma($ma_loai)
{
  $sql = "SELECT * FROM loai_hang WHERE ma_loai = $ma_loai";
  $danh_muc = pdo_query_one($sql);
  return $danh_muc;
}

// Lấy ra tên loại hàng theo mã loại
function lay_ten_danh_muc($ma_loai)
{
  // Nếu mã loại truyền vào lớn hơn 0
  if ($ma_loai > 0) {
    $sql = "SELECT * FROM loai_hang WHERE ma_loai = $ma_loai";
    $danh_muc = pdo_query_one($sql);
    // Biến các cột(thuộc tính) trong bảng loại hàng thành các biến
    extract($danh_muc);
    return $ten_loai; // Trả về biến(ten_loai) tên loại hàng
  } else {
    // Nếu $ma_loại nhỏ hơn 0 trả về chuỗi rỗng
    return "";
  }
}

// Cập nhật loại hàng theo mã loại
function cap_nhat_danh_muc($ma_loai, $ten_loai)
{
  $sql = "UPDATE loai_hang SET ten_loai = '$ten_loai' WHERE ma_loai = $ma_loai";
  pdo_execute($sql);
}
