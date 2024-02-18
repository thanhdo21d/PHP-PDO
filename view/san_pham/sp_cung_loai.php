<section class="relate-pro">
  <div class="relate-pro-tab">
    <h2 class="relate-pro-title">SẢN PHẨM LIÊN QUAN</h2>
    <div class="relate-pro-filter">
      <a href="#" class="relate-pro-act">
        <i class="fa-solid fa-chevron-left relate-pro-prev"></i>
      </a>
      <a href="#" class="relate-pro-act">
        <i class="fa-solid fa-chevron-right relate-pro-next"></i>
      </a>
    </div>
  </div>

  <div class="relate-pro-list">
    <?php
    foreach ($sp_lien_quan as $splq) {
      extract($splq);
      $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
      $hinh_anh = $img_path . $hinh;
    ?>
      <div class="relate-pro-item">
        <a href="<?= $link_sp ?>" class="relate-pro-image">
          <img src="<?= $hinh_anh ?>" alt="" class="relate-pro-img" />
        </a>

        <div class="relate-pro-desc">
          <h2 class="relate-pro-title-secondary">
            <a href="<?= $link_sp ?>">
              <?= $ten_hang_hoa ?>
            </a>
          </h2>

          <?php
          if ($giam_gia != 0) {
            echo "<span class='relate-pro-sale'>" . $giam_gia . "</span>";
          }
          ?>
          <span class="relate-pro-price"><?= $don_gia ?>đ</span>
        </div>
      </div>
      <!-- <div class="relate-pro-item">
        <a href="#" class="relate-pro-image">
          <img src="././public/image/product-01.webp" alt="" class="relate-pro-img" />
        </a>

        <div class="relate-pro-desc">
          <h2 class="relate-pro-title-secondary">
            <a href="#">
              Mizuno Morelia Sala Made in Japan TF Passion Red - High Risk
              Red/White Limited Edition
            </a>
          </h2>

          <span class="relate-pro-price">4,300,000₫</span>
        </div>
      </div>
      <div class="relate-pro-item">
        <a href="#" class="relate-pro-image">
          <img src="././public/image/product-01.webp" alt="" class="relate-pro-img" />
        </a>

        <div class="relate-pro-desc">
          <h2 class="relate-pro-title-secondary">
            <a href="#">
              Mizuno Morelia Sala Made in Japan TF Passion Red - High Risk
              Red/White Limited Edition
            </a>
          </h2>

          <span class="relate-pro-price">4,300,000₫</span>
        </div>
      </div> -->
    <?php
    }
    ?>
  </div>
</section>