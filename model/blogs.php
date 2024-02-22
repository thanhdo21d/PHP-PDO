<?php
require_once "pdo.php";

// Thêm loại hàng
function them_blogs($ten_loai)
{
  $sql = "INSERT INTO blogs(ten_loai) VALUES('$ten_loai')";
  pdo_execute($sql);
}

// Xóa loại hàng theo mã loại
function xoa_blogs($id_blogs)
{
  $sql = "DELETE FROM blogs WHERE id_blogs = $id_blogs";
  pdo_execute($sql);
}

// Truy vấn tất cả dữ liệu của bảng loại hàng
function lay_tat_ca__blogs($order = "DESC") // Tham số order nhận giá trị mặc định DESC sắp xếp theo giảm dần
{
  $sql = "SELECT * FROM blogs ORDER BY ten_loai $order";
  $ds_danh_blogs = pdo_query($sql);
  return $ds_danh_blogs;
}

// Truy vấn một loại hàng theo mã loại
function lay__blogs_theo_ma($id_blogs )
{
  $sql = "SELECT * FROM blogs WHERE id_blogs  = $id_blogs ";
  $blogs = pdo_query_one($sql);
  return $blogs;
}

// Lấy ra tên loại hàng theo mã loại
function lay_ten_blogs($ma_loai)
{
  // Nếu mã loại truyền vào lớn hơn 0
  if ($ma_loai > 0) {
    $sql = "SELECT * FROM blogs WHERE ma_loai = $ma_loai";
    $blogs = pdo_query_one($sql);
    // Biến các cột(thuộc tính) trong bảng loại hàng thành các biến
    extract($blogs);
    return $ten_loai; // Trả về biến(ten_loai) tên loại hàng
  } else {
    // Nếu $ma_loại nhỏ hơn 0 trả về chuỗi rỗng
    return "";
  }
}

// Cập nhật loại hàng theo mã loại
function cap_nhat_blogs($id_blogs, $ten_loai)
{
  $sql = "UPDATE blogs SET ten_loai = '$ten_loai' WHERE id_blogs = $id_blogs";
  pdo_execute($sql);
}
