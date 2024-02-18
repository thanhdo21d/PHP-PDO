<div class="main-pro-cart">
  <div class="pro-cart">
    <h2 class="pro-cart-title">Giỏ hàng</h2>
    <form action="" class="form-pro-cart" method="post">
      <table class="form-pro-table">
        <thead class="form-pro-thead">
          <tr>
            <th></th>
            <th class="form-pro-title">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="form-pro-tbody">
          <?php
          $tong_tien = 0;
          $i = 0;
          foreach ($_SESSION['gio_hang'] as $hang) {
            $hinh_anh = $img_path . $hang[2];
            $thanh_tien = $hang[3] * $hang[4];
            $tong_tien += $thanh_tien;
            $xoa_sp = "index.php?act=xoa_gio_hang&ma_gio_hang=" . $i;
          ?>
            <tr>
              <td class="form-pro-image">
                <img src="<?= $hinh_anh ?>" alt="" class="pro-cart-image" />
              </td>
              <td class="form-pro-name">
                <a href="#" class="form-pro-link">
                  <span class="pro-cart-name"><?= $hang[1] ?></span>
                  <!-- <span class="pro-cart-color">Trắng</span> -->
                </a>
              </td>
              <td class="form-pro-quantity">
                <input type="number" min="1" name="so_luong" disabled step="1" value="<?= $hang[4] ?>" class="pro-cart-input" />
              </td>
              <td class="form-pro-price"><?= number_format($thanh_tien, "0", ",") ?>đ</td>
              <td class="form-pro-remove">
                <a href="<?= $xoa_sp ?>" class="pro-cart-remove">Xóa</a>
              </td>
            </tr>
          <?php
            $i += 1;
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
            <textarea name="" id="" cols="30" rows="10" class="form-cart-textarea"></textarea>
          </div>
          <div class="form-cart-comeback">
            <a href="index.php?act=san_pham" class="form-cart-backlink">
              <img src="./public/image/back-icon.webp" alt="" />
              Tiếp tục mua hàng
            </a>
          </div>
        </div>

        <div class="form-control-right">
          <button type="submit" class="form-cart-update" name="btn_cart_update">
            <a href="#">Cập nhật
              <i class="fa-solid fa-chevron-right form-cart-icon"></i>
            </a>
          </button>
          <button class="form-cart-pay" type="button">
            <a href="index.php?act=thanh_toan">Thanh toán
              <i class="fa-solid fa-chevron-right form-cart-icon"></i>
            </a>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>