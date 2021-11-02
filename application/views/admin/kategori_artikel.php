            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total Pertanyaan</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($Qcount) ?></h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total User</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($user) ?></h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/3.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total Artikel</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($Arcount) ?></h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/4.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="text-left">Kategori</h4>
                                    <div class="card-header-action">
                                        <?php $total = $this->db->query("SELECT * FROM t_artikel WHERE status_tampil = '0'")->num_rows() ?>

                                        <a href="<?php echo base_url('Daftar_artikel/verifikasi_artikel') ?>" class="btn btn-success me-2"><i class="fas fa-check"></i> Artikel Belum Terverifikasi<span class="badge" style="background:white; color:#67be7e;"><?php echo $total ?> </span></a>
                                        <button type="button" onclick="tambah_kategori_artikel()" class="btn btn-primary">Tambah Kategori</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <?php foreach ($kategori_tag as $tag) : ?>
                                            
                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="card">
                                                    <div class="card-statistic-4">
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="row ">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-0">
                                                                    <div class="card-content">
                                                                        <h2 class="mb-1 font-18"><?php echo $tag['nama_kategori'] ?></h2>
                                                                        <?php 
                                                                            $id_kategori_tag = $tag['id_kategori_tag'];
                                                                            $data = $this->db->query("SELECT * FROM t_tag where id_kategori_tag = '$id_kategori_tag' ")->num_rows();
                                                                        ?>
                                                                        <p class="mb-0">Total Sub Kategori :<span class="col-green"> <?php echo $data;?></span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-11 col-sm-12 col-12 pl-0">
                                                                    <div class="d-flex flex-row-reverse bd-highlight">

                                                                        <a href="<?= base_url('Daftar_artikel/sub_artikel_tag/' . $tag['id_kategori_tag']) ?>" class="btn btn-primary mt-2 mb-2 m-1">Detail</a>
                                                                        <button type="button" data='<?php echo $tag['id_kategori_tag']?>' onclick="editkategoriartikel()" class="btn btn-info mt-2 mb-2 m-1">Edit</button>
                                                                        <!-- <a href="#" class="btn btn-danger mt-2 mb-2 m-1">Delete</a> -->
                                                                        <button type="button" data2='<?php echo $tag['id_kategori_tag']?>' onclick="hapuskategoriartikel()" class="btn btn-danger mt-2 mb-2 m-1">Delete</button>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<script type="text/javascript">

    //tambah kategori artikel
    function tambah_kategori_artikel()
    {
        $('#tambah_kategori_artikel').appendTo("body").modal('show');
    }

    //edit kategori
    function editkategoriartikel()
    {
        var id_kategori = event.target.getAttribute('data');
        $('#edit_kategori_tag'+id_kategori).appendTo("body").modal('show');
    }

    // hapus kategori
    function hapuskategoriartikel()
    {
        var id_kategori = event.target.getAttribute('data2');
        $('#hapus_kategori_tag'+id_kategori).appendTo("body").modal('show');
    }

</script>

<!-- modal tambah Kategori artikel -->
<div class="modal fade" id="tambah_kategori_artikel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('Daftar_artikel/tambah_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nama_kategori" class="form-control text-center" required="">
                </div>
                <div align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
                    
<!-- modal edit Kategori artikel -->
<?php foreach ($kategori_tag as $tag) : ?>
<div class="modal fade" id="edit_kategori_tag<?php echo $tag['id_kategori_tag']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('Daftar_artikel/edit_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input hidden="hidden" type="text" name="id_kategori_tag" value="<?php echo $tag['id_kategori_tag'] ?>" class="form-control">
                    <input type="text" name="nama_kategori" value="<?php echo $tag['nama_kategori'] ?>" class="form-control text-center">
                </div>
                <div align="right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal hapus Kategori artikel -->
<?php foreach ($kategori_tag as $tag) : ?>
<div class="modal fade" id="hapus_kategori_tag<?php echo $tag['id_kategori_tag']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('Daftar_artikel/hapus_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input hidden type="text" name="id_kategori_tag" value="<?php echo $tag['id_kategori_tag'] ?>" class="form-control">
                    <h6 >Apakah Anda yakin ingin menghapus kategori ini ?</h6 >
                </div>
                <div align="right">
                    <button type="button" class="btn btn-secondary col-2" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary col-2">Iya</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>