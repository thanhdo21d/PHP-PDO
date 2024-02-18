<div class="container">
  <div class="page-title">
    <h4 class="mt-5 font-weight-bold text-center">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h4>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <input type="button" class="btn btn-danger mb-1" value="Xóa các mục đã chọn">
      <table width="100%" class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr>
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($ds_thong_ke_hh as $dstkhh) {
            extract($dstkhh);
          ?>
            <tr>
              <td><?= $ten_loai ?></td>
              <td><?= $so_luong ?></td>
              <td><?= number_format($gia_cao_nhat, "0", ",") ?>đ</td>
              <td><?= number_format($gia_thap_nhat, "0", ",") ?>đ</td>
              <td><?= number_format($gia_trung_binh, "0", ",") ?>đ</td>
            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>
      <!-- <a href="index.php?act=bieu_do" class="btn btn-info text-white">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a> -->
    </div>
  </div>
</div>