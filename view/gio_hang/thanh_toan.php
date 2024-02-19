<main class="main">
  <div class="main-update-acc">
    <h1 class="user-update-title">Thông tin nhận hàng</h1>
    <?php
    if (isset($_SESSION['tai_khoan'])) {
      $ma_kh = $_SESSION['tai_khoan']['ma_kh'];
      $ho = $_SESSION['tai_khoan']['ho'];
      $ten = $_SESSION['tai_khoan']['ten'];
      $email = $_SESSION['tai_khoan']['email'];
    } else {
      header("Location: index.php?act=dang_nhap");
    }
    ?>
    <?php
if (isset($_POST['btn_cart_submit'])) {
    // Lấy dữ liệu từ form
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $phuong_thuc = $_POST['phuong_thuc'];
    $ghi_chu = $_POST['ghi_chu'];

    // Thêm đơn hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO don_hang (ma_kh, ho_ten, email, sdt, dia_chi, phuong_thuc, ghi_chu, trang_thai) 
            VALUES (:ma_kh, :ho_ten, :email, :sdt, :dia_chi, :phuong_thuc, :ghi_chu, 'pending')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ma_kh', $ma_kh);
    $stmt->bindParam(':ho_ten', $ho_ten);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':sdt', $sdt);
    $stmt->bindParam(':dia_chi', $dia_chi);
    $stmt->bindParam(':phuong_thuc', $phuong_thuc);
    $stmt->bindParam(':ghi_chu', $ghi_chu);

    if ($stmt->execute()) {
        $thong_bao = "Đơn hàng của bạn đã được đặt thành công!";
    } else {
        $thong_bao = "Đã xảy ra lỗi khi đặt hàng.";
    }
}
?>

    <form action="" class="form-user" method="post" enctype="multipart/form-data">
      <div class="form-user-group">
        <label for="" class="form-user-label">Họ và tên</label>
        <input type="text" name="ho_ten" class="form-user-input" value="<?= $ho ?> <?= $ten ?>" />
      </div>

      <div class="form-user-group">
        <label for="" class="form-user-label">Địa chỉ email</label>
        <input type="email" name="email" class="form-user-input" value="<?= $email ?>" />
      </div>

      <div class="form-user-group">
        <label for="" class="form-user-label">Số điện thoại</label>
        <input type="text" name="sdt" class="form-user-input" />
      </div>

      <div class="form-user-group">
        <label for="" class="form-user-label">Địa chỉ nhận hàng</label>
        <input type="text" name="dia_chi" class="form-user-input" />
      </div>

      <div class="form-user-group">
        <label for="" class="form-user-label">Phương thức thanh toán</label>
        <select name="phuong_thuc" id="">
          <option value="">Tiền mặt</option>
          <option value="">Chuyển khoản ngân hàng</option>
          <option value="">Ví điện tử</option>
        </select>
      </div>

      <div class="form-user-group">
        <label for="" class="form-user-label">Ghi chú</label>
        <textarea name="ghi_chu" id="" cols="30" rows="10" placeholder="Ghi chú"></textarea>
      </div>

      <div class="form-user-group">
        <button class="form-user-btn" name="btn_cart_submit" type="submit">Xác nhận</button>
      </div>
    </form>

    <?php
    if (isset($thong_bao) && ($thong_bao != "")) {
      echo "<h3 class='alert-text'>$thong_bao</h3>";
    }
    ?>
  </div>
</main>