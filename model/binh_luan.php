<?php
require_once "pdo.php";

// Thêm bình luận
function them_binh_luan($noi_dung, $ma_hang_hoa, $ma_kh, $ngay_bl, $danh_gia)
{
  $sql = "INSERT INTO binh_luan(noi_dung, ma_hang_hoa, ma_kh, ngay_bl, danh_gia) VALUES ('$noi_dung', '$ma_hang_hoa', '$ma_kh', '$ngay_bl', $danh_gia)";
  pdo_execute($sql);
}

// Xóa bình luận theo mã bình luận
function xoa_binh_luan($ma_bl)
{
  $sql = "DELETE FROM binh_luan WHERE ma_bl = $ma_bl";
  pdo_execute($sql);
}

// Truy vấn tất cả bình luận
function lay_tat_ca_binh_luan()
{
  $sql = "SELECT * FROM binh_luan ORDER BY ngay_bl DESC";
  $ds_binh_luan = pdo_query($sql);
  return $ds_binh_luan;
}

// Truy vấn bình luận theo từng hàng hóa
function lay_binh_luan_theo_hh($ma_hang_hoa)
{
  // Truy vấn bình luận, tên hàng hóa, mã khách hàng, hình của khách hàng gộp từ 3 bảng hàng hóa, bình luận và khách hàng theo điều kiện mã hàng hoá của bảng bình luận trùng tham số mã hàng hóa truyền vào
  $sql = "SELECT bl.*, hh.ten_hang_hoa, kh.ma_kh, kh.hinh FROM binh_luan bl JOIN hang_hoa hh ON bl.ma_hang_hoa = hh.ma_hang_hoa JOIN khach_hang kh ON kh.ma_kh = bl.ma_kh WHERE bl.ma_hang_hoa = $ma_hang_hoa ORDER BY ma_bl DESC";
  $ds_binh_luan = pdo_query($sql);
  return $ds_binh_luan;
}
