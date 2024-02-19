<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>X-Shop</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="././public/css/reset.css" />
  <link rel="stylesheet" href="././public/css/style.css">
</head>

<body>
  <div class="wrapper">
    <!-- Header -->
    <header class="header">
      <div class="header-container">
        <!-- header-brand -->
        <div class="header-brand">
          <h2 class="header-caption">
            X-SHOP.COM - SINCE 2012 - LUÔN CAM KẾT HÀNG CHÍNH HÃNG
          </h2>

          <!-- header-user -->
          <div class="header-user">
            <?php
            if (isset($_SESSION['tai_khoan'])) {
              extract($_SESSION['tai_khoan']);
              $hinh_anh = "./public/image/" . $hinh;
            ?>
              <?php
              if (is_file($hinh_anh)) {
                echo "<img src='$hinh_anh' class='header-user-image'>";
              } else {
                echo "<i class='fa fa-user header-icon'>";
              }
              ?>
              <!-- header-dropdown -->
              <div class="header-dropdown-content">
                <a href="#" class="header-dropdown-link">Hello <?= $ma_kh ?></a>
                <?php
                if ($vai_tro == 1) {
                ?>
                  <a href="./admin/index.php" class="header-dropdown-link">Quản lý website</a>
                  <a href="index.php?act=doi_mk" class="header-dropdown-link">Đổi mật khẩu</a>
                  <a href="index.php?act=dang_xuat" class="header-dropdown-link">Đăng xuất</a>
                <?php
                } else {
                ?>
                  <a href="index.php?act=quan_ly" class="header-dropdown-link">Cập nhật tài khoản</a>
                  <a href="index.php?act=doi_mk" class="header-dropdown-link">Đổi mật khẩu</a>
                  <a href="index.php?act=dang_xuat" class="header-dropdown-link">Đăng xuất</a>
                  <a href="index.php?act=gio_hang" class="header-dropdown-link">Giỏ hàng</a>
                  <a href="index.php?act=thanh_toan" class="header-dropdown-link">Thanh toán</a>
                  <a href="index.php?act=history_buy" class="header-dropdown-link">Lịch sử mua hàng</a>
                <?php
                }
                ?>
              </div>
              </i>
            <?php
            } else {
            ?>
              <i class="fa fa-user header-icon">
                <div class="header-dropdown-content">
                  <a href="index.php?act=dang_ky" class="header-dropdown-link">Đăng ký</a>
                  <a href="index.php?act=dang_nhap" class="header-dropdown-link">Đăng nhập</a>
                  <a href="index.php?act=gio_hang" class="header-dropdown-link">Giỏ hàng</a>
                  <a href="index.php?act=thanh_toan" class="header-dropdown-link">Thanh toán</a>
                  <a href="#" class="header-dropdown-link">Tra cứu đơn hàng</a>
                </div>
              <?php
            }
              ?>
              </i>
              <span class="header-text">Tài khoản</span>
              <i class="fa-solid fa-chevron-down header-icon"></i>
          </div>
        </div>

        <!-- header-controller -->
        <div class="header-control">
          <!-- header-logo -->
          <a href="index.php" class="header-image">
            <img src="././public/image/xshop.png" alt="" class="header-img" />
          </a>

          <!-- header-search-bar -->
          <form action="index.php?act=san_pham" class="header-search" method="post">
            <input type="text" class="header-input" name="keyword" placeholder="Tìm kiếm ..." />
            <div class="header-search-icon">
              <button type="submit" name="btn_search" class="header-search-button">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>

          <!-- header-login-cart -->
          <div class="header-act">
            <div class="header-act-icon">
              <?php
              if (isset($_SESSION['tai_khoan'])) {
                echo "<a href='./index.php?act=quan_ly'>
                  <i class='fa fa-user header-user-icon'></i>
                </a>";
              } else {
                echo "<a href='./index.php?act=dang_nhap'>
                <i class='fa fa-user header-user-icon'></i>
              </a>";
              }
              ?>
              <!-- <a href="././public/admin/login.html">
                <i class="fa fa-user header-user-icon"></i>
              </a> -->
            </div>
            <div class="header-act-icon header-cart">
              <?php
              if (isset($_SESSION['gio_hang']) && ($_SESSION['gio_hang'] > 0)) {
                echo "<a href='index.php?act=gio_hang' class='header-cart-link'>
                  <i class='fa-solid fa-cart-shopping header-cart-icon'> </i>
                </a>
                <span class='header-cart-notify'>" . count($_SESSION['gio_hang']) . " </span>";
              } else {
                echo "<a href='index.php?act=gio_hang' class='header-cart-link'>
                <i class='fa-solid fa-cart-shopping header-cart-icon'> </i>
                </a>";
              }
              ?>
            </div>
          </div>
        </div>
        <!-- header-navigation -->
        <nav class="header-nav">
          <ul class="header-menu">
            <li class="header-item">
              <a href="./index.php" class="header-link">Trang chủ</a>
            </li>
            <li class="header-item">
              <a href="index.php?act=gioi_thieu" class="header-link">Giới thiệu</a>
            </li>
            <li class="header-item">
              <a href="./index.php?act=san_pham" class="header-link">Sản phẩm</a>
            </li>
            <li class="header-item">
              <a href="#" class="header-link">Blog</a>
            </li>
            <li class="header-item">
              <a href="./index.php?act=lien_he" class="header-link">Liên hệ</a>
            </li>
            <li class="header-item">
              <a href="#" class="header-link">Sale off</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- End-header -->