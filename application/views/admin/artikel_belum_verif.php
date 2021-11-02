<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Artikel Belum Terverifikasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead class="text-center" align="center">
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Judul Artikel</th>
                                            <th>Waktu Upload</th>
                                            <th>Status Tampil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center" class="text-center">
                                        <?php $no = 1;
                                        foreach ($artikel_verif as $list) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $list['nama_user'] ?></td>

                                                <td>
                                                    <?php 
                                                       $judul = $list['judul_artikel'] ;
                                                       $jumlahkarakter = 20;
                                                       $cetak = substr($judul, 0, $jumlahkarakter);
                                                       echo $cetak.(' ....');
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $list['tanggal_upload'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($list['status_tampil'] == 1) {
                                                        echo 'Tampil';
                                                    } else {
                                                        echo 'Disembunyikan';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">

                                                            <a onclick="tampilartikel()" data='<?php echo $list['id_artikel'] ?>' href="#" class="dropdown-item has-icon"><i class="fas fa-search"></i> View & Detail</a>
                                                            <?php 
                                                                $id_artikel = $list['id_artikel'];
                                                                $cek = $this->db->query("SELECT status_tampil FROM t_artikel WHERE id_artikel='$id_artikel'")->result_array(); foreach($cek as $key);
                                                            ?>
                                                            <?php if ($key['status_tampil'] == '0'): ?>
                                                                <a href="<?= base_url('Daftar_artikel/edit_verif_artikel/' . $list['id_artikel']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Tampilkan</a>
                                                            <?php elseif($key['status_tampil'] == '1'): ?>
                                                                <a href="<?= base_url('Daftar_artikel/edit_verif_artikel/' . $list['id_artikel']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Sembunyikan</a>
                                                            <?php endif; ?>
                                                            <a href="<?php echo base_url('Daftar_artikel/hapus_artikel/'.$list['id_artikel']) ?>" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td> 
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
    function tampilartikel()
    {
        var id_artikel = event.target.getAttribute('data');
        $('#tampil_artikel'+id_artikel).appendTo("body").modal('show');
    }
</script>

<!-- modal tampil artikel -->
<?php foreach ($artikel_verif as $list) : ?>
<div class="modal fade bd-example-modal-xl" style="" tabindex="-1" id="tampil_artikel<?php echo $list['id_artikel']?>" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>ARTIKEL</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:95%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
       <div class="modal-body" >
        <div class="embed-responsive embed-responsive-21by9">
                <embed src="<?php echo base_url().'/assets/pdf/'.$list['file_pdf'] ?>"
                frameborder="0">
            </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>