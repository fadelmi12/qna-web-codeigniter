<!-- Main Content -->
<?php echo $this->session->flashdata('pesan')?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mr-2">Daftar FaQ</h4>
                            <button type="button" class="btn btn-sm btn-primary ml-2" onclick="tambah_faq()"><i class="fas fa-plus"></i> Tambah FaQ</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                No
                                            </th>
                                            <th scope="col" class="text-center">Question</th>
                                            <th scope="col" class="text-center">Answer</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($semua_faq as $faq) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no;?>
                                                </td>
                                                <td>
                                                    <?php echo $faq['question'];?>
                                                </td>
                                                <td>
                                                    <?php echo $faq['answer']?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="#" onclick="edit_faq()" data='<?php echo $faq['id_faq'] ?>' class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" onclick="hapus_faq()" data='<?php echo $faq['id_faq'] ?>'class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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
    </section>

<script type="text/javascript">
    function tambah_faq()
    {
        $('#tambah').appendTo("body").modal('show');
    }

    function edit_faq()
    {
        var id_faq = event.target.getAttribute('data');
        $('#EditFaq'+id_faq).appendTo("body").modal('show');
    }

    function hapus_faq()
    {
        var id_faq = event.target.getAttribute('data');
        $('#HapusFaq'+id_faq).appendTo("body").modal('show');
    }
</script>

<!-- modal Tambah FaQ -->
<div class="modal fade" style="" tabindex="-1" id="tambah" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content: center;" align="center">
        <h4 class="modal-title text-white text-center" id="exampleModalLabel"><strong>Tambah FaQ</strong></h4>
      </div>
        <div class="modal-body" >
            <form method="post" action="<?php echo base_url('Faq/tambah_faq') ?>" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <h5><strong>Question</strong></h5>
                    <textarea type="text" name="question" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <h5><strong>Answer</strong></h5>
                    <textarea type="text" name="answer" class="form-control" required></textarea>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <button type="submit" class="btn col-4 btn-success">Simpan</button>
                    </div>
                    <div class="col">
                        <button type="button" data-dismiss="modal" class="btn col-4 btn-warning">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>


<?php foreach ($semua_faq as $faq) : ?>

<!-- modal edit FaQ -->
<div class="modal fade" style="" tabindex="-1" id="EditFaq<?php echo $faq['id_faq'] ?>" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content: center;" align="center">
        <h4 class="modal-title text-white text-center" id="exampleModalLabel"><strong>Edit FaQ</strong></h4>
      </div>
        <div class="modal-body" >
            <form method="post" action="<?php echo base_url('Faq/edit_faq') ?>" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <input hidden type="text" name="id_faq" value="<?php echo $faq['id_faq'] ?>">
                    <h5><strong>Question</strong></h5>
                    <textarea type="text" name="question" class="form-control" required><?php echo $faq['question'] ?></textarea>
                </div>
                <div class="form-group mb-4">
                    <h5><strong>Answer</strong></h5>
                    <textarea type="text" name="answer" class="form-control" required><?php echo $faq['answer'] ?></textarea>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <button type="submit" class="btn col-4 btn-success">Simpan</button>
                    </div>
                    <div class="col">
                        <button type="button" data-dismiss="modal" class="btn col-4 btn-warning">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- modal hapus FaQ -->
<div class="modal fade" style="" tabindex="-1" id="HapusFaq<?php echo $faq['id_faq'] ?>" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center" style="background:skyblue; justify-content: center;" align="center">
        <h4 class="modal-title text-white text-center" id="exampleModalLabel"><strong>Hapus FaQ</strong></h4>
      </div>
        <div class="modal-body" >
            <div class="mb-4">
                <h5>Apakah Anda yakin ingin menghapus FaQ ini ?</h5>
            </div>
            <div class="row">
                <div class="col mr-5" align="right">
                    <button type="button" class="btn btn-success col-5" onclick="window.location.href='<?php echo base_url('Faq/hapus_faq/'.$faq['id_faq']) ?>'">Iya</button>
                </div>
                <div class="col ml-5" align="left">
                    <button type="button" data-dismiss="modal" class="btn btn-warning col-5">Tidak</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<?php endforeach; ?>