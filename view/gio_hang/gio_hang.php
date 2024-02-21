<?php 
// var_dump($_SESSION['gio_hang']);
// var_dump($_SESSION['tai_khoan']);

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_cart_update'])) {
//   foreach ($_SESSION['gio_hang'] as $i => &$hang) {
//       $so_luong_moi = $_POST['so_luong_' . $i];
//       if (is_numeric($so_luong_moi) && $so_luong_moi > 0) {
//           $thanh_tien_cu = $hang[3] * $hang[4]; 
//           $hang[4] = $so_luong_moi;
//           $thanh_tien_moi = $hang[3] * $so_luong_moi;
//           $tong_tien += $thanh_tien_moi - $thanh_tien_cu;
//           // Cập nhật tổng tiền
//       }
//   }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_cart_pay'])) {
  // Lấy thông tin khách hàng từ form
  $ho_ten = isset($_POST['ho_ten']) ? $_POST['ho_ten'] : '';
  $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : '';
  $ghi_chu = isset($_POST['ghi_chu']) ? $_POST['ghi_chu'] : '';

  // Tính tổng tiền từ session
  $tong_tien = 0;
  $sql=mysqli_query($conn,"SELECT * FROM  gio_hang   WHERE user='{$_SESSION['tai_khoan']['ma_kh']}'");
  while($r=fetch_assoc($sql)){
    $p=fetch_array($conn,"SELECT * FROM hang_hoa WHERE ma_hang_hoa='{$r['product']}' LIMIT 1");
    $tong_tien+=$p['don_gia'];
  }
  

  // Thêm đơn hàng vào bảng don_hang
  $sql_insert_don_hang = "INSERT INTO don_hang (ho_ten,user, dia_chi, ghi_chu, tong_tien) VALUES ('$ho_ten','{$_SESSION['tai_khoan']['ma_kh']}' , '$dia_chi', '$ghi_chu', '$tong_tien')";
  @mysqli_query($conn, $sql_insert_don_hang);

  if (true) {
      // Lấy ID của đơn hàng vừa thêm
      $id_don_hang=fetch_array($conn,"SELECT id FROM don_hang WHERE user='{$_SESSION['tai_khoan']['ma_kh']}'  order by id desc LIMIT 1")['id'];
      // Thêm chi tiết đơn hàng vào bảng chi_tiet_don_hang
      // foreach ($_SESSION['gio_hang'] as $hang) {
      //     $ma_san_pham = $hang[0];
      //     $so_luong = $hang[4];
      //     $gia_ban = $hang[3];
          
      //     $sql_insert_chi_tiet_don_hang = "INSERT INTO chi_tiet_don_hang (id_don_hang, ma_san_pham, so_luong, gia_ban) VALUES ('$id_don_hang', '$ma_san_pham', '$so_luong', '$gia_ban')";
      //     mysqli_query($conn, $sql_insert_chi_tiet_don_hang);
      // }
      $sql=mysqli_query($conn,"SELECT * FROM  gio_hang   WHERE user='{$_SESSION['tai_khoan']['ma_kh']}'");
      while($r=fetch_assoc($sql)){
        $p=fetch_array($conn,"SELECT * FROM hang_hoa WHERE ma_hang_hoa='{$r['product']}' LIMIT 1");
        $ma_san_pham=$p['ma_hang_hoa'];
        $so_luong=$r['number'];
        $gia_ban=$p['don_gia'];

        $sql_insert_chi_tiet_don_hang = "INSERT INTO chi_tiet_don_hang (id_don_hang, ma_san_pham, so_luong, gia_ban) VALUES ('$id_don_hang','$ma_san_pham', '$so_luong', '$gia_ban')";
        mysqli_query($conn, $sql_insert_chi_tiet_don_hang);
      }

      // Xóa session gio_hang sau khi đã thanh toán
      unset($_SESSION['gio_hang']);
      @mysqli_query($conn,"DELETE from gio_hang WHERE user='{$_SESSION['tai_khoan']['ma_kh']}'");

      // Gửi người dùng đến trang cảm ơn hoặc trang xác nhận đơn hàng
      echo "<script>alert('Đặt hàng thành công');window.location.href='/index.php?act=history_buy'</script>";
      // header('Location: cam-on.php');
      exit();
  } else {
      // Xử lý khi có lỗi thêm đơn hàng
      echo "Có lỗi khi thêm đơn hàng vào CSDL.";
  }
}
?>

<div class="main-pro-cart">
  <div class="pro-cart">
    <h2 class="pro-cart-title">Giỏ hàng</h2>
    <form action="" class="form-pro-cart" method="post">
      <table class="form-pro-table">
        <thead class="form-pro-thead">
          <tr>
            <th></th>
            <th></th>
            <th class="form-pro-title">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="form-pro-tbody">
          <?php
          $i = 0;
          $tong_tien=0;

          // foreach ($_SESSION['gio_hang'] as $hang) {
          //   $hinh_anh = $img_path . $hang[2];
          //   $thanh_tien = $hang[3] * $hang[4];
          //   $tong_tien += $thanh_tien;
          //   $xoa_sp = "index.php?act=xoa_gio_hang&ma_gio_hang=" . $i;
          if(isset($_SESSION['tai_khoan'])){
          $sql=mysqli_query($conn,"SELECT * FROM gio_hang WHERE user='{$_SESSION['tai_khoan']['ma_kh']}' ");
          while($r=fetch_assoc($sql)){
            $p=fetch_array($conn,"SELECT * FROM hang_hoa WHERE ma_hang_hoa='{$r['product']}' LIMIT 1");
            $hinh_anh=$img_path.$p['hinh'];
            $thanh_tien=intval($r['number'])*$p['don_gia'];
            $xoa_sp = "index.php?act=xoa_gio_hang&id=" . $r['id'];
            $tong_tien+=$thanh_tien;


            

          ?>
            <tr>
              <td>
              </td>
              <td class="form-pro-image">
                <img src="<?= $hinh_anh ?>" alt="" class="pro-cart-image" />
              </td>
              <td class="form-pro-name">
                <a href="#" class="form-pro-link">
                  <span class="pro-cart-name"><?= $p['ten_hang_hoa'] ?></span>
                  <!-- <span class="pro-cart-color">Trắng</span> -->
                </a>
              </td>
              <td class="form-pro-quantity">
                <!-- <input type="number" min="1" name="so_luong" disabled step="1" value="<?= $hang[4] ?>" class="pro-cart-input" /> -->
                <input type="number" min="1" name="so_luong_<?= $i ?>" step="1" value="<?= $r['number'] ?>" class="pro-cart-input" />

              </td>
              <td class="form-pro-price"><?= number_format($thanh_tien, "0", ",") ?>đ</td>
              <td class="form-pro-remove">
                <a href="<?= $xoa_sp ?>" class="pro-cart-remove">Xóa</a>
              </td>
            </tr>
          <?php
            $i += 1;
          }
        }
        else{
          echo "<script>alert('Hãy đăng nhập để xem');window.location.href='/index.php?act=dang_nhap'</script>";
        }
          echo "<tr class='form-pro-total'>
          <td class='form-pro-image'></td>
          <td></td>
          <td></td>
          <td class='pro-cart-price'>" . number_format($tong_tien, "0", ",") . "đ</td>
          <td></td>
          </tr>";
          ?>
          <!-- <tr>
            <td class="form-pro-image">
              <img src="./public/image/product-01.webp" alt="" class="pro-cart-image" />
            </td>
            <td class="form-pro-name">
              <a href="#" class="form-pro-link">
                <span class="pro-cart-name">Giày đá bóng Kamito QH19 AS TF - White/Gold</span>
                <span class="pro-cart-color">Trắng</span>
              </a>
            </td>
            <td class="form-pro-quantity">
              <input type="number" min="1" step="1" value="1" class="pro-cart-input" />
            </td>
            <td class="form-pro-price">555,000đ</td>
            <td class="form-pro-remove">
              <a href="#" class="pro-cart-remove">Xóa</a>
            </td>
          </tr> -->
        </tbody>
      </table>

      <div class="form-cart-control">
        <div class="form-cart-control-left">
          <div class="form-cart-note">
            <label for="" class="form-cart-label">Ghi chú</label>
            <textarea name="ghi_chu" id="" cols="30" rows="10" class="form-cart-textarea"></textarea>
          </div>
          <div class="form-cart-note">
            <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" required>
            <input type="text" name="ho_ten" placeholder="tên người nhận" required>

          </div>
          <div class="form-cart-comeback">
            <a href="index.php?act=san_pham" class="form-cart-backlink">
              <img src="./public/image/back-icon.webp" alt="" />
              Tiếp tục mua hàng
            </a>
          </div>
        </div>
        
        <div class="form-control-right" style="display:flex; gap:10px;">
          <!-- <form method="post"> -->
          <button type="submit" class="form-cart-update" name="btn_cart_update">
            <a>Cập nhật
              <i class="fa-solid fa-chevron-right form-cart-icon"></i>
            </a>
          </button>
          <!-- </form> -->
          <!-- <form method="post"> -->
          <button class="form-cart-pay" type="submit" name="btn_cart_pay">
            <a >Thanh toán
              <i class="fa-solid fa-chevron-right form-cart-icon"></i>
            </a>
          </button>
          <!-- </form> -->
        </div>
      </div>
    </form>
  </div>
</div>