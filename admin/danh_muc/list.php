<div class="content">
  <div class="container">
    <div class="container">
      <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">
          Danh sách loại hàng
        </h4>
      </div>
      <div class="box box-primary">
        <div class="box-body">
          <form action="?btn_delete_all" method="post" class="table-responsive">
            <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="">
              Xóa mục đã chọn
            </button>
            <table width="100%" class="table table-hover table-bordered text-center">
              <thead class="thead-dark">
                <tr>
                  <th><input type="checkbox" id="select-all" /></th>
                  <th>Mã loại</th>
                  <th>Tên loại</th>
                  <th>
                    <a href="index.php?act=them_dm" class="btn btn-success text-white">Thêm mới <i class="fas fa-plus-circle"></i></a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($ds_danh_muc as $dsdm) {
                  extract($dsdm);
                  $sua_dm = "index.php?act=sua_dm&ma_loai=" . $ma_loai;
                  $xoa_dm = "index.php?act=xoa_dm&ma_loai=" . $ma_loai;
                ?>
                  <tr>
                    <td>
                      <input type="checkbox" name="" value="" />
                    </td>
                    <td><?= $ma_loai ?></td>
                    <td><?= $ten_loai  ?></td>
                    <td class="text-end">
                      <a href="<?= $sua_dm ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                      <a href="<?= $xoa_dm ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn có chắc muốn xóa chứ ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                }
                ?>
                <!-- <tr>
                  <td>
                    <input type="checkbox" name="" value="" />
                  </td>
                  <td></td>
                  <td></td>
                  <td class="text-end">
                    <a href="" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                    <a href="" class="btn btn-outline-danger btn-rounded" onclick=""><i class="fas fa-trash"></i></a>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>