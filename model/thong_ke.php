<?php
require_once "pdo.php";

// Thông kế bình luận
function thong_ke_binh_luan()
{
  // Truy vấn mã khách hàng, tên hàng hóa, số lượng bình luận, ngày bình luận cũ nhất, ngày bình luận mới nhất từ 2 bảng bình luận, hàng hóa gộp lại theo điều kiện mã hàng hóa của bảng bình luận = mã hàng hóa của bảng hàng hóa 
  // Sử dụng GROUP BY để gộp nhóm các dữ liệu, thuộc tính(mã hàng hóa, tên hàng hóa) giống nhau thành 1 theo điều kiện HAVING số lượng lớn hơn 0
  $sql = "SELECT hh.ma_hang_hoa, hh.ten_hang_hoa, COUNT(*) so_luong, MIN(bl.ngay_bl) cu_nhat, MAX(bl.ngay_bl) moi_nhat FROM binh_luan bl JOIN hang_hoa hh ON hh.ma_hang_hoa = bl.ma_hang_hoa GROUP BY hh.ma_hang_hoa, hh.ten_hang_hoa HAVING so_luong > 0";
  $ds_binh_luan = pdo_query($sql);
  return $ds_binh_luan;
}

function thong_ke_hang_hoa()
{
  // Truy vấn mã loại, tên loại, số lượng hàng hóa, giá thấp nhất,giá cao nhất từ 2 bảng loại hàng, hàng hóa gộp lại theo điều kiện mã loại của bảng hàng hóa = mã loại của bảng loại hàng
  // Sử dụng GROUP BY để gộp nhóm các dữ liệu, thuộc tính(mã loại, tên loại) giống nhau thành 1 
  $sql = "SELECT lh.ma_loai, lh.ten_loai, COUNT(*) so_luong, MIN(hh.don_gia) gia_thap_nhat, MAX(hh.don_gia) gia_cao_nhat, AVG(hh.don_gia) gia_trung_binh FROM hang_hoa hh JOIN loai_hang lh ON lh.ma_loai = hh.ma_loai GROUP BY lh.ma_loai, lh.ten_loai";
  $ds_hang_hoa = pdo_query($sql);
  return $ds_hang_hoa;
}
