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