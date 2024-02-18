<div class="main-product">
  <!-- Aside -->
  <aside class="aside">
    <!-- Product category -->
    <div class="pro-category">
      <div class="pro-category-title">DANH MỤC SẢN PHẨM</div>
      <ul class="pro-category-list">
        <?php
        foreach ($danh_sach_dm as $dsdm) {
          extract($dsdm);
          $link_dm = "index.php?act=sp_theo_danh_muc&ma_loai=" . $ma_loai;
        ?>
          <li class="pro-category-item">
            <a href="<?= $link_dm ?>"> <?= $ten_loai ?> </a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <!-- End product category -->

    <!-- Product hot  -->
    <div class="pro-hot">
      <div class="pro-hot-title">Sản phẩm nổi bật</div>
      <div class="pro-hot-list">
        <?php
        foreach ($danh_sach_sp_noi_bat as $dsspnb) {
          extract($dsspnb);
          $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
          $hinh_anh = $img_path . $hinh;
        ?>
          <div class="pro-hot-item">
            <a href="<?= $link_sp ?>" class="pro-hot-image">
              <img src="<?= $hinh_anh ?>" alt="" class="pro-hot-img" />
            </a>
            <div class="pro-hot-detail">
              <h3 class="pro-hot-title-secondary">
                <a href="<?= $link_sp ?>">
                  <?= $ten_hang_hoa ?>
                </a>
              </h3>
              <div class="pro-hot-price">
                <?php
                if ($giam_gia != 0) {
                  echo "<span class='hot-pro-sale'>" . $don_gia . "đ</span>";
                  echo "<span class='hot-pro-price'>" . $giam_gia . "đ</span>";
                } else {
                  echo "<span class='hot-pro-price'>" . $don_gia . "đ</span>";
                }
                ?>
              </div>
            </div>
          </div>
          <!-- <div class="pro-hot-item">
            <a href="#" class="pro-hot-image">
              <img src="././public/image/product-01.webp" alt="" class="pro-hot-img" />
            </a>
            <div class="pro-hot-detail">
              <h3 class="pro-hot-title-secondary">
                <a href="#">
                  MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                  RED/WHITE
                </a>
              </h3>
              <div class="pro-hot-price">
                <span class="pro-hot-sale"></span>
                <span class="pro-hot-cost">3,590,000₫</span>
              </div>
            </div>
          </div>

          <div class="pro-hot-item">
            <a href="#" class="pro-hot-image">
              <img src="././public/image/product-01.webp" alt="" class="pro-hot-img" />
            </a>
            <div class="pro-hot-detail">
              <h3 class="pro-hot-title-secondary">
                <a href="#">
                  MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                  RED/WHITE
                </a>
              </h3>
              <div class="pro-hot-price">
                <span class="pro-hot-sale"></span>
                <span class="pro-hot-cost">3,590,000₫</span>
              </div>
            </div>
          </div>

          <div class="pro-hot-item">
            <a href="#" class="pro-hot-image">
              <img src="././public/image/product-01.webp" alt="" class="pro-hot-img" />
            </a>
            <div class="pro-hot-detail">
              <h3 class="pro-hot-title-secondary">
                <a href="#">
                  MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                  RED/WHITE
                </a>
              </h3>
              <div class="pro-hot-price">
                <span class="pro-hot-sale"></span>
                <span class="pro-hot-cost">3,590,000₫</span>
              </div>
            </div>
          </div>

          <div class="pro-hot-item">
            <a href="#" class="pro-hot-image">
              <img src="././public/image/product-01.webp" alt="" class="pro-hot-img" />
            </a>
            <div class="pro-hot-detail">
              <h3 class="pro-hot-title-secondary">
                <a href="#">
                  MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                  RED/WHITE
                </a>
              </h3>
              <div class="pro-hot-price">
                <span class="pro-hot-sale"></span>
                <span class="pro-hot-cost">3,590,000₫</span>
              </div>
            </div>
          </div> -->
        <?php
        }
        ?>
      </div>
    </div>
    <!-- End product hot -->

    <!-- Product sale image -->
    <div class="pro-sale">
      <a href="#" class="pro-sale-image">
        <img src="././public/image/product-sale-off.jpg" alt="" class="pro-sale-img" />
      </a>
    </div>
    <!-- End product sale image -->
  </aside>
  <!-- End-aside -->

  <!-- Article -->
  <article class="article">
    <div class="product">
      <img src="././public/image/product-banner.webp" alt="" class="product-banner" />
      <?php
      if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
        echo "<h1 class='product-cate-title'>" . $ten_danh_muc . "</h1>";
      } else {
        echo "<h1 class='product-cate-title'>Sản phẩm</h1>";
      }
      ?>

      <div class="product-tab">
        <div class="product-filter">
          <h3 class="product-filter-text">Sắp xếp theo:</h3>
          <select name="" id="" class="product-filter-select">
            <option value="">Mới nhất</option>
            <option value="">Giá: Tăng dần</option>
            <option value="">Giá giảm dần</option>
            <option value="">Cũ nhất</option>
            <option value="">Bán chạy nhất</option>

            <div class="product-filter-icon">
              <i class="fa-solid fa-chevron-down"></i>
            </div>
          </select>
        </div>
      </div>

      <div class="product-list">
        <?php
        if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
          foreach ($ds_sp_cung_loai as $dsspcl) {
            extract($dsspcl);
            $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
            $hinh_anh = $img_path . $hinh;
        ?>
            <div class="product-item">
              <a href="<?= $link_sp ?>" class="product-image">
                <img src="<?= $hinh_anh ?>" alt="" class="product-img" />
              </a>

              <div class="product-content">
                <h2 class="product-title">
                  <a href="<?= $link_sp ?>">
                    <?= $ten_hang_hoa ?>
                  </a>
                </h2>
                <?php
                if ($giam_gia != 0) {
                  echo "<span class='hot-pro-sale'>" . number_format($don_gia, 0, ',') . "đ</span>";
                  echo "<span class='hot-pro-price'>" . number_format($giam_gia, 0, ',') . "đ</span>";
                } else {
                  echo "<span class='hot-pro-price'>" . number_format($don_gia, 0, ',') . "đ</span>";
                }
                ?>
              </div>
            </div>
          <?php
          }
        } else {
          foreach ($danh_sach_sp_moi as $dsspm) {
            extract($dsspm);
            $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
            $hinh_anh = $img_path . $hinh;
          ?>
            <div class="product-item">
              <a href="<?= $link_sp ?>" class="product-image">
                <img src="<?= $hinh_anh ?>" alt="" class="product-img" />
              </a>

              <div class="product-content">
                <h2 class="product-title">
                  <a href="<?= $link_sp ?>">
                    <?= $ten_hang_hoa ?>
                  </a>
                </h2>
                <?php
                if ($giam_gia != 0) {
                  echo "<span class='hot-pro-sale'>" . number_format($don_gia, 0, ',') . "đ</span>";
                  echo "<span class='hot-pro-price'>" . number_format($giam_gia, 0, ',') . "đ</span>";
                } else {
                  echo "<span class='hot-pro-price'>" . number_format($don_gia, 0, ',') . "đ</span>";
                }
                ?>
              </div>
            </div>

        <?php
          }
        }
        ?>
        <!-- <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div>
        <div class="product-item">
          <a href="#" class="product-image">
            <img src="././public/image/products-01.webp" alt="" class="product-img" />
          </a>

          <div class="product-content">
            <h2 class="product-title">
              <a href="#">
                MIZUNO MORELIA SALA ELITE TF PASSION RED - HIGH RISK
                RED/WHITE
              </a>
            </h2>
            <span class="product-price">3,590,000₫</span>
          </div>
        </div> -->
      </div>

      <div class="product-other">
        <div class="product-numbers">
          <?php
          for ($i = 1; $i <= $_SESSION['total_page']; $i++) {
          ?>
            <a href="index.php?act=san_pham&page=<?= $i ?>" class="product-page <?= $_SESSION['page'] == $i ? 'product-page-active' : '' ?>"><?= $i ?></a>
          <?php
          }
          ?>
          <!-- <a href="" class="product-page">2</a>
          <a href="" class="product-page">3</a>
          <a href="" class="product-page">...</a>
          <a href="" class="product-page">14</a>
          <a href="" class="product-page"><i class="fa-solid fa-angles-right"></i></a> -->
        </div>
      </div>
    </div>
  </article>
  <!-- End-article -->
</div>