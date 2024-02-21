<div class="main-detail-pro">
  <!-- Detail-product -->
  <div class="detail-pro">
    <?php
    extract($san_pham);
    $hinh_anh = $img_path . $hinh;
    ?>
    <img src="<?= $hinh_anh ?>" alt="" class="detail-pro-image" />

    <div class="detail-pro-content">
      <h1 class="detail-pro-title">
        <?= $ten_hang_hoa ?>
      </h1>
      <div class="detail-pro-price">
        <?php
        if ($giam_gia != 0) {
          echo "<span class='detail-pro-sale'>" . number_format($don_gia, 0, ',') . "đ</span>";
          echo "<span class='detail-pro-cost'>" . number_format($giam_gia, 0, ',') . "đ</span>";
        } else {
          echo "<span class='detail-pro-cost'>" . number_format($don_gia, 0, ',') . "đ</span>";
        }
        ?>
      </div>
      <p class="detail-pro-supplier">Nhà cung cấp: NIKE</p>
      <p class="detail-pro-commit">
        CAM KẾT SẢN PHẨM CHÍNH HÃNG 100%. ĐƯỢC BỒI HOÀN GẤP 10 LẦN NẾU
        KHÔNG PHẢI CHÍNH HÃNG
      </p>

      <div class="detail-pro-size">
        <p class="detail-pro-title">Chọn size:</p>
        <select name="" id="" class="detail-pro-size-select">
          <option value="" hidden>Chọn size</option>
          <option value="">43</option>
          <option value="">42</option>
          <option value="">41</option>
          <option value="">40</option>
          <option value="">39</option>
          <option value="">38</option>
        </select>
      </div>

      <div class="detail-pro-color">
        <p class="detail-pro-title">Màu:</p>
        <span class="detail-pro-color-box">
          <span class="detail-pro-color-text"><?= $mau ?></span>
          <img src="././public/image/check-icon.webp" alt="" />
        </span>
      </div>
      <div class="detail-pro-operation">
        <form action="index.php?act=them_vao_gio_hang" method="post">
          <input type="hidden" name="ma_hang_hoa" value="<?= $ma_hang_hoa ?>">
          <input type="hidden" name="ten_hang_hoa" value="<?= $ten_hang_hoa ?>">
          <input type="hidden" name="don_gia" value="<?= ($giam_gia) ? $giam_gia : $don_gia ?>">
          <input type="hidden" name="hinh" value="<?= $hinh ?>">
          <input type="hidden" name="so_luong" value="1">

          <button type="submit" name="btn_insert_cart" class="detail-pro-button detail-pro-buy">
            Mua ngay
          </button>
          <button type="submit" name="btn_insert_cart" class="detail-pro-button detail-pro-cart">
            Thêm ngay giỏ hàng
          </button>
        </form>
      </div>

      <div class="detail-pro-offer">
        <div class="detail-pro-offer-item hotline">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-hotline">0789.970.907 </span>
            <span class="detail-pro-offer-text">Hotline đặt hàng (8h30 - 21h) T2 -> CN</span>
          </div>
        </div>
        <div class="detail-pro-offer-item">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-text">Nhận Combo quà tặng khi mua giày</span>
            <a href="#" class="detail-pro-offer-more">Xem chi tiết </a>
          </div>
        </div>
        <div class="detail-pro-offer-item">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-text">Nhận Combo quà tặng khi mua giày</span>
            <a href="#" class="detail-pro-offer-more">Xem chi tiết </a>
          </div>
        </div>
        <div class="detail-pro-offer-item">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-text">Nhận Combo quà tặng khi mua giày</span>
            <a href="#" class="detail-pro-offer-more">Xem chi tiết </a>
          </div>
        </div>
        <div class="detail-pro-offer-item">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-text">Nhận Combo quà tặng khi mua giày</span>
            <a href="#" class="detail-pro-offer-more">Xem chi tiết </a>
          </div>
        </div>
        <div class="detail-pro-offer-item">
          <img src="././public/image/hotline-icon.webp" alt="" class="detail-pro-offer-img" />
          <div class="detail-pro-offer-content">
            <span class="detail-pro-offer-text">Nhận Combo quà tặng khi mua giày</span>
            <a href="#" class="detail-pro-offer-more">Xem chi tiết </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End-detail-product -->

  <!-- Detail product tab -->
  <div class="detail-pro-tab">
    <button class="detail-pro-btn" id="defaultTab" onclick="openTab(event, 'content')">
      Mô tả sản phẩm
    </button>
    <button class="detail-pro-btn" onclick="openTab(event, 'specifications')">
      Thông số kỹ thuật
    </button>
    <!-- TODO -->
    <!-- <button class="detail-pro-btn" onclick="openTab(event, 'guide')">
              Hướng dẫn mua hàng
            </button>
            <button class="detail-pro-btn" onclick="openTab(event, 'policy')">
              Chính sách mua hàng
            </button> -->
  </div>
  <!-- End-detail-product-tab -->

  <!-- Detail product tab content -->
  <div id="content" class="detail-pro-tab-content">
    <p class="detail-pro-description">
      <?= $mo_ta ?>
      <br />
    </p>

    <!-- <img src="././public/image/detail-pro-img-01.webp" alt="" class="detail-pro-desc-img" />
    <img src="././public/image/detail-pro-img-01.webp" alt="" class="detail-pro-desc-img" />
    <img src="././public/image/detail-pro-img-01.webp" alt="" class="detail-pro-desc-img" />
    <img src="././public/image/detail-pro-img-01.webp" alt="" class="detail-pro-desc-img" /> -->
  </div>

  <div id="specifications" class="detail-pro-tab-content">
    <p class="detail-pro-specifi">
      <?= $thong_so ?>
    </p>
  </div>

  <!-- <div id="guide" class="detail-pro-tab-content"></div>

          <div id="policy" class="detail-pro-tab-content"></div> -->

  <?php
  include "binh_luan.php";
  ?>
</div>

<?php
include "sp_cung_loai.php";
?>