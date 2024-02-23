<?php
require_once "pdo.php";

function them_tin_tuc($tieu_de, $noi_dung, $hinh,  $id_blogs)
{
  $sql = "INSERT INTO tintuc(tieu_de, noi_dung, hinh, id_blogs ) VALUES('$tieu_de', '$noi_dung', '$hinh',  '$id_blogs')";
  pdo_execute($sql);
}
function lay_tintuc_theo_trang($order = "DESC") 
{
  $sql = "SELECT * FROM tintuc ORDER BY tieu_de $order";
  $ds_danh_blogs = pdo_query($sql);
  return $ds_danh_blogs;
}
function xoa_tin_tuc($id)
{
  $sql = "DELETE FROM tintuc WHERE id = $id";
  pdo_execute($sql);
}
function lay_tin_tuc_theo_ma($id)
{
  $sql = "SELECT * FROM tintuc WHERE id = $id";
  $san_pham = pdo_query_one($sql);
  return $san_pham;
}
function cap_nhat_tin_tuc($id, $tieu_de, $hinh,  $noi_dung, $id_blogs){
  if ($hinh != "") {
    $sql = "UPDATE tintuc SET tieu_de = '$tieu_de',  hinh = '$hinh',  noi_dung = '$noi_dung',  id_blogs = '$id_blogs' WHERE id = $id";
  } else {
    $sql = "UPDATE tintuc SET tieu_de = '$tieu_de',   noi_dung = '$noi_dung',  id_blogs = '$id_blogs' WHERE id = $id";
  }
  pdo_execute($sql);
}
