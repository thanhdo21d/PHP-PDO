<div class="container">
  <div class="page-title">

    <h4 class="mt-5 font-weight-bold text-center">Chi tiết bình luận</h4>
  </div>
  <div class="box box-primary">
    <div class="box-body">
      <form action="?btn_delete_all" method="post" class="table-responsive">

        <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="">
          Xóa mục đã chọn</button>
        <i class="ml-5">Hàng hóa:
          <b>
            <?= $ds_chi_tiet_bl[0]['ten_hang_hoa'] ?>
          </b>
        </i>
        <table width="100%" class="table table-hover table-bordered text-center">
          <thead class="thead-dark">
            <tr>
              <th><input type="checkbox" id="select-all"></th>
              <th>Đánh giá</th>
              <th>Nội dung</th>
              <th>Ngày BL</th>
              <th>Người BL</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($ds_chi_tiet_bl as $dsctbl) {
              extract($dsctbl);
              $xoabl = "index.php?act=xoa_binh_luan&ma_bl=" . $ma_bl . "&ma_hang_hoa=" . $ma_hang_hoa;
            ?>
              <tr>
                <td><input type="checkbox" name="" value=""></td>
                <td><?= $danh_gia ?> sao</td>
                <td><?= $noi_dung ?></td>
                <td><?= $ngay_bl ?></td>
                <td><?= $ma_kh ?></td>
                <td class="text-end">
                  <a href="<?= $xoabl ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn có chắc là muốn xóa chứ ?')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>

          </tbody>

        </table>
        <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
        <div class="mt-3" width="100%">
          <ul class="pagination justify-content-center">
          </ul>
        </div>
        <a class="btn btn-dark" href="index.php?act=binh_luan">Quay lại</a>
      </form>
    </div>
  </div>
</div>