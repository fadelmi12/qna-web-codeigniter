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
                                    <h4 class="text-left">Sub Kategori</h4>
                                    <div class="card-header-action">
                                        <?php $total = $this->db->query("SELECT * FROM t_artikel WHERE status_tampil = '0'")->num_rows() ?>

                                        <a href="<?php echo base_url('Daftar_artikel/verifikasi_artikel') ?>" class="btn btn-success me-2"><i class="fas fa-check"></i> Artikel Belum Terverifikasi<span class="badge" style="background:white; color:#67be7e;"><?php echo $total ?> </span></a>
                                        
                                        <button type="button" data='<?php echo $id_kategori_tag ?>' onclick="tambah_sub_kategori_artikel()" class="btn btn-primary">Tambah Sub Kategori</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <?php foreach ($sub_tag as $s_tag) : ?>
                                            
                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="card">
                                                    <div class="card-statistic-4">
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="row ">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-0">
                                                                    <div class="card-content">
                                                                        <h2 class="mb-1 font-18"><?php echo $s_tag['namaTag'] ?></h2>
                                                                        <?php 
                                                                            $idTag = $s_tag['idTag'];
                                                                            $data = $this->db->query("SELECT * FROM t_artikeltag where idTag = '$idTag' ")->num_rows();
                                                                        ?>
                                                                        <p class="mb-0">Total Artikel :<span class="col-green"> <?php echo $data?></span></p>
                                                                    
                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-6 col-md-11 col-sm-12 col-12 pl-0">
                                                                    <div class="d-flex flex-row-reverse bd-highlight">

                                                                        <a href="<?= base_url('Daftar_artikel/list_artikel_sesuai_sub/' . $s_tag['idTag']) ?>" class="btn btn-primary mt-2 mb-2 m-1">Detail</a>
                                                                        <button type="button" data='<?php echo $s_tag['idTag']?>' onclick="editsubkategoriartikel()" class="btn btn-info mt-2 mb-2 m-1">Edit</button>
                                                                        <button type="button" data2='<?php echo $s_tag['idTag']?>' onclick="hapussubkategoriartikel()" class="btn btn-danger mt-2 mb-2 m-1">Delete</button>


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

    //tambah sub kategori artikel
    function tambah_sub_kategori_artikel()
    {
        var idkategoritag = event.target.getAttribute('data');
        $('#tambah_sub_kategori_artikel'+idkategoritag).appendTo("body").modal('show');
    }

    //edit sub kategori
    function editsubkategoriartikel()
    {
        var idTag = event.target.getAttribute('data');
        $('#edit_sub_kategori_artikel'+idTag).appendTo("body").modal('show');
    }

    // hapus sub kategori
    function hapussubkategoriartikel()
    {
        var idTag = event.target.getAttribute('data2');
        $('#hapus_sub_kategori_artikel'+idTag).appendTo("body").modal('show');
    }

</script>

<!-- modal tambah sub Kategori artikel -->
<div class="modal fade" id="tambah_sub_kategori_artikel<?php echo $id_kategori_tag ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Kategori Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Daftar_artikel/tambah_sub_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input hidden="hidden" type="text" name="id_kategori_tag" class="form-control text-center" value="<?php echo $id_kategori_tag ?>">
                        <input type="text" name="namaTag" class="form-control text-center" required="">
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

<?php foreach ($sub_tag as $s_tag) : ?>
<!-- modal edit sub Kategori artikel -->
<div class="modal fade" id="edit_sub_kategori_artikel<?php echo $s_tag['idTag']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Sub Kategori Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Daftar_artikel/edit_sub_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input hidden="hidden" type="text" name="idTag" value="<?php echo $s_tag['idTag'] ?>" class="form-control">
                        <input type="text" name="namaTag" value="<?php echo $s_tag['namaTag'] ?>" class="form-control text-center">
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

<!-- modal hapus Kategori artikel -->
<div class="modal fade" id="hapus_sub_kategori_artikel<?php echo $s_tag['idTag']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Sub Kategori Artikel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Daftar_artikel/hapus_sub_kategori_artikel')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input hidden="hidden" type="text" name="idTag" value="<?php echo $s_tag['idTag'] ?>" class="form-control">
                        <h6 >Apakah Anda yakin ingin menghapus sub kategori ini ?</h6 >
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