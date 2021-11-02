<div class="settingSidebar">
  <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
  </a>
  <div class="settingSidebar-body ps-container ps-theme-default">
    <div class=" fade show active">
      <div class="setting-panel-header">Setting Panel
      </div>
      <div class="p-15 border-bottom">
        <h6 class="font-medium m-b-10">Select Layout</h6>
        <div class="selectgroup layout-color w-50">
          <label class="selectgroup-item">
            <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
            <span class="selectgroup-button">Light</span>
          </label>
          <label class="selectgroup-item">
            <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
            <span class="selectgroup-button">Dark</span>
          </label>
        </div>
      </div>
      <div class="p-15 border-bottom">
        <h6 class="font-medium m-b-10">Sidebar Color</h6>
        <div class="selectgroup selectgroup-pills sidebar-color">
          <label class="selectgroup-item">
            <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
          </label>
          <label class="selectgroup-item">
            <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
          </label>
        </div>
      </div>
      <div class="p-15 border-bottom">
        <h6 class="font-medium m-b-10">Color Theme</h6>
        <div class="theme-setting-options">
          <ul class="choose-theme list-unstyled mb-0">
            <li title="white" class="active">
              <div class="white"></div>
            </li>
            <li title="cyan">
              <div class="cyan"></div>
            </li>
            <li title="black">
              <div class="black"></div>
            </li>
            <li title="purple">
              <div class="purple"></div>
            </li>
            <li title="orange">
              <div class="orange"></div>
            </li>
            <li title="green">
              <div class="green"></div>
            </li>
            <li title="red">
              <div class="red"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="p-15 border-bottom">
        <div class="theme-setting-options">
          <label class="m-b-0">
            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
            <span class="custom-switch-indicator"></span>
            <span class="control-label p-l-10">Mini Sidebar</span>
          </label>
        </div>
      </div>
      <div class="p-15 border-bottom">
        <div class="theme-setting-options">
          <label class="m-b-0">
            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
            <span class="custom-switch-indicator"></span>
            <span class="control-label p-l-10">Sticky Header</span>
          </label>
        </div>
      </div>
      <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
          <i class="fas fa-undo"></i> Restore Default
        </a>
      </div>
    </div>
  </div>
</div>
</div>

<footer class="main-footer">
  <div class="footer-left">
    <a href="templateshub.net">Templateshub</a></a>
  </div>
  <div class="footer-right">
  </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url('assets/admin/js/app.min.js') ?>"></script>
<!-- JS Libraies -->
<script src="<?= base_url('assets/admin/bundles/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/bundles/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url('assets/admin/js/page/datatables.js') ?>"></script>
<script src="<?= base_url('assets/admin/bundles/prism/prism.js') ?>"></script>


<script src="<?= base_url('assets/admin/bundles/sweetalert/sweetalert.min.js') ?>"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url('assets/admin/js/page/sweetalert.js') ?>"></script>
<!-- Template JS File -->
<script src="<?= base_url('assets/admin/js/scripts.js') ?>"></script>
<!-- Custom JS File -->
<script src="<?= base_url('assets/admin/js/custom.js') ?>"></script>
</body>
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'AdminPage/TambahKategori'; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" id="asu" name="kategori" class="form-control" placeholder="Masukan Kategori ">
          </div>
          <div class="form-group">
            <label>Gambar</label><br>
            <input type="file" name="gambar_icon" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php foreach ($kategori as $ktg) : ?>
  <div class="modal fade" id="edit_kategori<?= $ktg['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() . 'AdminPage/EditKategori'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">

              <input type="hidden" name="id_kategori" class="form-control" placeholder="Masukan Kategori " value="<?= $ktg['id_kategori'] ?>">
              <input type="text" name="kategori" class="form-control" placeholder="Masukan Kategori " value="<?= $ktg['nama_kategori'] ?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($kategori as $ktg) : ?>
  <div class="modal fade" id="delete_kategori<?= $ktg['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <div class="d-flex justify-content-center">
            <p style="font-size:20px; margin-bottom:20px" align="center">Jika Menghapus Kategori maka pertnyaan yang terkait kategori akan terhapus, Apakah anda yakin?</p><br>
          </div>
          <div align="center">

            <!-- <input type="text" name="id_kategori" class="form-control" placeholder="Masukan Kategori " value="<?= $ktg['id_kategori'] ?>">
                <input type="text" name="kategori" class="form-control" placeholder="Masukan Kategori " value="<?= $ktg['nama_kategori'] ?>"> -->
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Tutup</button>
            <button type="button" onclick="location.href='<?= 'AdminPage/hapus_kategori/' . $ktg['id_kategori'] ?>';" class="btn btn-danger">Delete</button>
          </div>
        </div>


        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="location.href='<?= 'hapus_kategori/' . $prt['id_kategori'] ?>';" class="btn btn-danger">Tambah</button> -->
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>