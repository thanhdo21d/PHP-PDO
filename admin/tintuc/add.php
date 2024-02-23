<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header text-center bg-dark text-white text-uppercase">
            Thêm mới tin
          </div>
          <div class="card-body">
            <form action="index.php?act=them_tin_tuc" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-sm-4">
                  <label for="" class="form-label">blogs</label>
                  <select name="id_blogs" class="form-control" id="">
                    <?php
                    foreach ($ds_danh_blogs as $dsdm) {
                      extract($dsdm);
                    ?>
                      <option value="<?= $id_blogs ?>"><?= $ten_loai ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-sm-4">
                  <label for="" class="form-label">tiêu đề</label>
                  <input type="text" name="tieu_de" id="" class="form-control" required value="" />
                </div>
                <div class="form-group col-sm-4">
                  <label for="" class="form-label">Mã loại</label>
                  <input type="text" name="id" id="" readonly class="form-control" value="auto number" />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-4">
                  <div class="row align-items-center">
                    <div class="col-sm-8">
                      <label for="" class="form-label">Ảnh sản phẩm</label>
                      <input type="file" name="hinh" id="" class="form-control" />
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="" class="form-label">nội dung</label>
                  <textarea id="txtarea" spellcheck="false" name="noi_dung" class="form-control form-control-lg mb-3" id="textareaExample" rows="3"></textarea>
                </div>
              </div>
              <div class="mb-3 text-center">
                <input type="reset" value="Nhập lại" class="btn btn-danger mr-3" />
                <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3" />
                <a href="index.php?act=danh_sach_sp_trang"><input type="button" class="btn btn-success" value="Danh sách" /></a>
              </div>
            </form>
            <?php
            if (isset($thong_bao) && ($thong_bao != "")) {
              echo "<h3 class='alert-text'>$thong_bao</h3>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
