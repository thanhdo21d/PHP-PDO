

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LỊCH SỬ MUA HÀNG CỦA BẠN</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy3X8hYhHb8BoE4vSEBy6ZZKc4xLZ5P0N" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="page-title">
    <h4 class="mt-5 font-weight-bold text-center">LỊCH SỬ MUA HÀNG CỦA BẠN</h4>
  </div>
  <?php if(isset($_SESSION['tai_khoan'])){?>
  <div class="box box-primary">
    <div class="box-body">
      <table width="100%" class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr>
            <th>MÃ ĐƠN</th>
            <!-- <th>TÊN KHÁCH HÀNG</th> -->
            <th>TÊN NGƯỜI NHẬN</th>
            <th>ĐỊA CHỈ</th>
            <th>GHI CHÚ</th>
            <th>TỔNG TIỀN</th>
            <th>TRẠNG THÁI</th>


            <!-- <th>TÁC VỤ</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          $sql=mysqli_query($conn,"SELECT * FROM don_hang WHERE user='{$_SESSION['tai_khoan']['ma_kh']}'");
          while($r=fetch_assoc($sql)){
            $id=$r['id'];
            $ho_ten=$r['ho_ten'];
            $dia_chi=$r['dia_chi'];
            $ghi_chu=$r['ghi_chu'];

            $trang_thai=$r['trang_thai'];
            
          ?>
         <tr>

            <td><?=$id?> <input type="text" value="<?=$id?>" style="display:none"></td>
            <!-- <td>admin</td> -->
            <td><?=$ho_ten?></td>
            <td><?=$dia_chi?></td>
            <td><?=$ghi_chu?></td>
            <td><?=$r['tong_tien']?></td>

            <td>
              <?=$trang_thai==1?"Chờ xác nhận":($trang_thai==0?"Đã Huỷ":"Đang giao hàng")?>

            </td>


            <!-- <td> <div class="d-flex gap-3 justify-content-center items-center">
              <button class="bg-danger" type="submit" name="huy_don_hang">CANCEL</button>
            </td> -->
         </tr>
         <?php }?>
        </tbody>
      </table>
      <!-- <a href="index.php?act=bieu_do" class="btn btn-info text-white">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a> -->
    </div>
  </div>
  <?php }else{
    echo "<script>alert('Hãy đăng nhập để xem');window.location.href='/index.php?act=dang_nhap'</script>";

  }?>
</div>
</body>
</html>
