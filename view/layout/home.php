 <!-- Header-slide -->
 <div class="header-slide">
   <div class="header-slide-item fade">
     <img src="././public/image/slide.jpg" />
   </div>

   <div class="header-slide-item fade">
     <img src="././public/image/slide2.jpg" />
   </div>

   <div class="header-slide-item fade">
     <img src="././public/image/slide3.png" />
   </div>

   <div class="header-slide-item fade">
     <img src="././public/image/slide4.png" />
   </div>

   <!-- Next and previous buttons -->
   <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-chevron-left header-icon-prev"></i>
   </a>
   <a class="next" onclick="plusSlides(1)">
     <i class="fa-solid fa-chevron-right header-icon-next"></i>
   </a>
 </div>
 <!-- End header-slide -->

 <!-- Main-content -->
 <main class="main">
   <div class="main-container">
     <!-- hot-products -->
     <section class="hot-pro">
       <h1 class="hot-pro-title">SẢN PHẨM HOT</h1>

       <div class="hot-pro-list">
         <?php
          foreach ($danh_sach_sp_hot as $dssph) {
            extract($dssph);
            $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
            $hinh_anh = $img_path . $hinh;
          ?>
           <div class="hot-pro-item">
             <a href="<?= $link_sp ?>" class="hot-pro-image">
               <img src="<?= $hinh_anh ?>" alt="" class="hot-pro-img" />
             </a>
             <div class="hot-pro-content">
               <h2 class="hot-pro-title--small">
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
           <!-- <div class="hot-pro-item">
             <a href="#" class="hot-pro-image">
               <img src="././public/image/product-02.webp" alt="" class="hot-pro-img" />
             </a>
             <div class="hot-pro-content">
               <h2 class="hot-pro-title--small">
                 <a href="#">
                   Nike Mercurial Superfly 8 Elite FG Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>
               <span class="hot-pro-sale">7,895,000đ</span>
               <span class="hot-pro-price">4,950,000</span>
             </div>
           </div>
           <div class="hot-pro-item">
             <a href="#" class="hot-pro-image">
               <img src="././public/image/product-03.webp" alt="" class="hot-pro-img" />
             </a>
             <div class="hot-pro-content">
               <h2 class="hot-pro-title--small">
                 <a href="#">
                   Nike Mercurial Superfly 8 Elite FG Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>
               <span class="hot-pro-sale">7,895,000đ</span>
               <span class="hot-pro-price">4,950,000</span>
             </div>
           </div>
           <div class="hot-pro-item">
             <a href="#" class="hot-pro-image">
               <img src="././public/image/product-04.webp" alt="" class="hot-pro-img" />
             </a>
             <div class="hot-pro-content">
               <h2 class="hot-pro-title--small">
                 <a href="#">
                   Nike Mercurial Superfly 8 Elite FG Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>
               <span class="hot-pro-sale">7,895,000đ</span>
               <span class="hot-pro-price">4,950,000</span>
             </div>
           </div>
           <div class="hot-pro-item">
             <a href="#" class="hot-pro-image">
               <img src="././public/image/product-05.webp" alt="" class="hot-pro-img" />
             </a>
             <div class="hot-pro-content">
               <h2 class="hot-pro-title--small">
                 <a href="#">
                   Nike Mercurial Superfly 8 Elite FG Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>
               <span class="hot-pro-sale">7,895,000đ</span>
               <span class="hot-pro-price">4,950,000</span>
             </div>
           </div> -->
         <?php
          }
          ?>
       </div>
     </section>
     <!-- end-hot-products -->

     <!-- feature-products -->
     <section class="feature-pro">
       <h1 class="feature-pro-title">Sản phẩm nổi bật</h1>

       <div class="feature-pro-list">
         <?php
          foreach ($danh_sach_sp_noi_bat as $dsspnb) {
            extract($dsspnb);
            $link_sp = "index.php?act=chi_tiet_sp&ma_hang_hoa=" . $ma_hang_hoa;
            $hinh_anh = $img_path . $hinh;
          ?>
           <div class="feature-pro-item">
             <a href="<?= $link_sp ?>" class="feature-pro-image"><img src="<?= $hinh_anh ?>" alt="" class="feature-pro-img" /></a>

             <div class="feature-pro-content">
               <h2 class="feature-pro-title--secondary">
                 <a href="<?= $link_sp ?>">
                   <?= $ten_hang_hoa ?>
                 </a>
               </h2>

               <?php
                if ($giam_gia != 0) {
                  // Hàm number_format sẽ định dạng lại số theo hàng nghìn, hàm trả về số được định dạng
                  // number_format(float $number(số cần định dạng), $decimal(số chữ thập phân muốn lấy, mặc định là 0), $dec_point(kí tự phân cách với phần thập phân, mặc định "."), $thousand_sep(kí tự phân cách giữa các nhóm hàng nghìn, mặc định ","))
                  echo "<span class='hot-pro-sale'>" . number_format($don_gia, 0, ',') . "đ</span>";
                  echo "<span class='hot-pro-price'>" . number_format($giam_gia, 0, ',') . "đ</span>";
                } else {
                  echo "<span class='hot-pro-price'>" . number_format($don_gia, 0, ',') . "đ</span>";
                }
                ?>
             </div>
           </div>
           <!-- <div class="feature-pro-item">
             <a href="#" class="feature-pro-image"><img src="././public/image/product-02.webp" alt="" class="feature-pro-img" /></a>

             <div class="feature-pro-content">
               <h2 class="feature-pro-title--secondary">
                 <a href="#">
                   Nike Mercurial Vapor 14 Elite AG-PRO Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>

               <span class="feature-pro-sale">3,600,000₫</span>
               <span class="feature-pro-price">2,790,000₫</span>
             </div>
           </div>
           <div class="feature-pro-item">
             <a href="#" class="feature-pro-image"><img src="././public/image/product-03.webp" alt="" class="feature-pro-img" /></a>

             <div class="feature-pro-content">
               <h2 class="feature-pro-title--secondary">
                 <a href="#">
                   Nike Mercurial Vapor 14 Elite AG-PRO Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>

               <span class="feature-pro-sale">3,600,000₫</span>
               <span class="feature-pro-price">2,790,000₫</span>
             </div>
           </div>
           <div class="feature-pro-item">
             <a href="#" class="feature-pro-image"><img src="././public/image/product-04.webp" alt="" class="feature-pro-img" /></a>

             <div class="feature-pro-content">
               <h2 class="feature-pro-title--secondary">
                 <a href="#">
                   Nike Mercurial Vapor 14 Elite AG-PRO Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>

               <span class="feature-pro-sale">3,600,000₫</span>
               <span class="feature-pro-price">2,790,000₫</span>
             </div>
           </div>
           <div class="feature-pro-item">
             <a href="#" class="feature-pro-image"><img src="././public/image/product-05.webp" alt="" class="feature-pro-img" /></a>

             <div class="feature-pro-content">
               <h2 class="feature-pro-title--secondary">
                 <a href="#">
                   Nike Mercurial Vapor 14 Elite AG-PRO Blueprint - Chlorine
                   Blue/Laser Orange/Marina
                 </a>
               </h2>

               <span class="feature-pro-sale">3,600,000₫</span>
               <span class="feature-pro-price">2,790,000₫</span>
             </div>
           </div> -->
         <?php
          }
          ?>
       </div>
     </section>
     <!-- end-feature-products -->

     <?php
      include "danh_muc_trang_chu.php";
      ?>

     <?php
      include "thuong_hieu.php";
      ?>


     <?php
      include "tin_tuc.php";
      ?>
   </div>
 </main>
 <!-- End-main-content -->

 <!-- Shop information -->
 <section class="shop-info">
   <div class="shop-info-container">
     <div class="shop-info-list">
       <div class="shop-info-item support">
         <h1 class="shop-info-title">HỖ TRỢ</h1>
         <div class="support-content">
           <h4 class="support-title">
             GỌI TƯ VẤN - ĐẶT HÀNG ONLINE (08:30 - 21: 00 MỖI NGÀY)
           </h4>
           <p class="support-info">
             <span class="support-hotline">0789.970.907</span>
             <span class="support-date">Tất cả các ngày trong tuần (Trừ tết Âm Lịch)</span>
           </p>

           <h4 class="support-title">GÓP Ý & KHIẾU NẠI (08:30 - 20:30)</h4>
           <p class="support-info">
             <span class="support-hotline">0902.970.907</span>
             <span class="support-date">Tất cả các ngày trong tuần (Trừ tết Âm Lịch)</span>
           </p>

           <h4 class="support-social">
             THEO DÕI CHÚNG TÔI TRÊN CÁC NỀN TẢNG
           </h4>
           <div class="support-social-list">
             <div class="support-social-item">
               <a href="#" class="support-social-link">
                 <i class="fa-brands fa-facebook support-social-icon"></i>
               </a>
             </div>
             <div class="support-social-item">
               <a href="#" class="support-social-link">
                 <i class="fa-brands fa-instagram support-social-icon"></i>
               </a>
             </div>
             <div class="support-social-item">
               <a href="#" class="support-social-link">
                 <i class="fa-brands fa-youtube support-social-icon"></i>
               </a>
             </div>
             <div class="support-social-item">
               <a href="#" class="support-social-link">
                 <i class="fa-brands fa-twitter support-social-icon"></i>
               </a>
             </div>
             <div class="support-social-item">
               <a href="#" class="support-social-link">
                 <i class="fa-brands fa-pinterest support-social-icon"></i>
               </a>
             </div>
           </div>
         </div>
       </div>

       <div class="shop-info-item system">
         <h1 class="shop-info-title">HỆ THỐNG CỬA HÀNG</h1>

         <div class="system-caption">
           <h1 class="system-text">Cửa hàng</h1>
           <p class="system-work">MỞ CỬA TỪ: 9h-21h 7 NGÀY TRONG TUẦN</p>
         </div>
         <div class="system-image">
           <img src="././public/image/system.webp" alt="" class="system-img" />
         </div>
       </div>

       <div class="shop-info-item gallery">
         <h1 class="shop-info-title">HÌNH ẢNH KHÁCH HÀNG</h1>

         <div class="gallery-hover">
           <a href="#" class="gallery-image">
             <img src="././public/image/shop-gallery.webp" alt="" class="gallery-img" />
           </a>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End-shop-information -->