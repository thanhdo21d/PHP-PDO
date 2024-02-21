<div class="container">
  <div class="page-title">
    <h4 class="mt-5 font-weight-bold text-center">THỐNG KÊ TRẠNG THÁI ĐƠN HÀNG</h4>
  </div>
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


            <th>TÁC VỤ</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if(isset($_POST['accept'])){
            @mysqli_query($conn,"UPDATE don_hang set trang_thai=2 WHERE id='{$_POST['id']}'");
          }
          if(isset($_POST['cancel'])){
            @mysqli_query($conn,"UPDATE don_hang set trang_thai=0 WHERE id='{$_POST['id']}'");
          }
          $sql=mysqli_query($conn,"SELECT * FROM don_hang ORDER BY id desc");
          while($r=fetch_assoc($sql)){
            $id=$r['id'];
            $ho_ten=$r['ho_ten'];
            $dia_chi=$r['dia_chi'];
            $ghi_chu=$r['ghi_chu'];
            $trang_thai=$r['trang_thai'];



            
          ?>
         <tr>

            <td><?=$id?></td>
            <!-- <td>admin</td> -->
            <td><?=$ho_ten?></td>
            <td><?=$dia_chi?></td>
            <td><?=$ghi_chu?></td>
            <td><?=$r['tong_tien']?></td>

            <td>
              <?=$trang_thai==1?"Chờ xác nhận":($trang_thai==0?"Đã Huỷ":"Đang giao hàng")?>
            </td>
            <td> 
              <form class="d-flex gap-3 justify-content-center items-center" method="post" action="">
                <input type="text" value="<?=$id?>" name="id" style="display:none">
                <Button class="bg-success" type="submit" name="accept">ACCEPT</Button>  
                <Button class="bg-danger" type="submit" name="cancel">CANCEL</Button>
              </form>
            </td>


            <!-- <td> <div class="d-flex gap-3 justify-content-center items-center">
              <button class="bg-danger" type="submit" name="huy_don_hang">CANCEL</button>
            </td> -->
         </tr>
         <?php }?>

        </tbody>
      </table>
    </div>
  </div>
</div>