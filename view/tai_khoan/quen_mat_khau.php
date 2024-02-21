<main class="main">
  <div class="main-update-acc">
    <h1 class="user-update-title">Lấy mật khẩu</h1>
    <?php
    $show=false;
     if (isset($_POST['btn_submit'])) {
      
      $c=fetch_array($conn,"SELECT * FROM khach_hang WHERE ma_kh='{$ma_kh}'");
      if($c){
        $show=true;

      }
      else{
        echo "<script>alert('Mã khách hàng không tồn tại');</script>";
      }
     }
    ?>
    <div class="form-user-group" style="display:<?=$show?"block":"none"?>">
        <label for="" class="form-user-label">Mật khẩu cũ của bạn là </label><br>
        <input type="text" value="<?=$c['mat_khau']?>" class="form-user-input" readonly />
      </div>
    <form action="index.php?act=quen_mk" class="form-user" method="post" enctype="multipart/form-data" style="display:<?=($show)?"none":"block"?>">
      <div class="form-user-group">
        <label for="" class="form-user-label">Tên đăng nhập</label>
        <input type="text" name="ma_kh" class="form-user-input" required />
      </div>

      <!-- <div class="form-user-group">
        <label for="" class="form-user-label">Email</label>
        <input type="email" name="email" class="form-user-input" required />
      </div> -->

      <div class="form-user-group">
        <button class="form-user-btn" name="btn_submit" type="submit">
          Lấy lại mật khẩu
        </button>
      </div>
    </form>

    <?php
    if (isset($thong_bao) && ($thong_bao != "")) {
      echo "<h3 class='alert-text'>$thong_bao</h3>";
    }
    ?>
  </div>
</main>
