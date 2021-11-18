<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="col">
                                <h4>Daftar Nama Bank</h4>
                            </div>
                            <div class="col" align="right">
                                <button class="btn btn-sm btn-success" type="button" onclick="modal_tambah()"><i class="fas fa-plus"></i> Tambah Nama Bank</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th  class="text-center">Nama Bank</th>
                                            <th  class="text-center">Kode Bank</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($nama_bank as $bank) : ?>
                                            <tr>
                                                <td align="center">
                                                    <?php echo $no; ?>
                                                </td>
                                                <td>
                                                    <?php echo $bank['nama_bank'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $bank['kode_bank'] ?>
                                                </td>
                                                <td align="center">
                                                    <button type="button" data='<?php echo $bank['id_bank'] ?>' onclick="modal_edit()" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i> Edit</button>
                                                </td>
                                                <td align="center">
                                                    <button type="button" data='<?php echo $bank['id_bank'] ?>' onclick="modal_hapus()" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
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
    function modal_tambah()
    {
        $('#tambah_bank').appendTo('body').modal('show');
        //alert("ok");
    }

    function modal_edit()
    {
        var id_bank = event.target.getAttribute('data');
        $('#edit_bank'+id_bank).appendTo('body').modal('show');
        //alert(id_bank);
    }

    function modal_hapus()
    {
        var id_bank = event.target.getAttribute('data');
        $('#delete_bank'+id_bank).appendTo('body').modal('show');
        //alert(id_bank);
    }
</script>

    <!-- modal tambah -->
    <div class="modal fade" tabindex="-1" id="tambah_bank">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light justify-content-center">
                    <h4 class="modal-title"><strong>Tambah Bank</strong></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('Penarikan_saldo/tambah_bank')?>" enctype="multipart/form-data">
                        <h6>Nama Bank</h6>
                        <input type="input" name="nama_bank" class="form-control" required><br>
                        <h6>Kode Bank</h6>
                        <input type="input" name="kode_bank" class="form-control" required><br><br>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning mr-2 col-3" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ml-2 col-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php foreach ($nama_bank as $bank) : ?>
    <!-- modal edit -->
    <div class="modal fade" tabindex="-1" id="edit_bank<?php echo $bank['id_bank'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light justify-content-center">
                    <h4 class="modal-title"><strong>Edit Bank</strong></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('Penarikan_saldo/edit_bank')?>" enctype="multipart/form-data">
                        <h6>Nama Bank</h6>
                        <input type="input" name="id_bank" class="form-control" value="<?php echo $bank['id_bank'] ?> " hidden>
                        <input type="input" name="nama_bank" class="form-control" value="<?php echo $bank['nama_bank'] ?> " required><br>
                        <h6>Kode Bank</h6>
                        <input type="input" name="kode_bank" class="form-control" value="<?php echo $bank['kode_bank'] ?> " required><br><br>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning mr-2 col-3" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ml-2 col-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal hapus -->
    <div class="modal fade" tabindex="-1" id="delete_bank<?php echo $bank['id_bank'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light justify-content-center">
                    <h4 class="modal-title"><strong>Hapus Bank</strong></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('Penarikan_saldo/delete_bank')?>" enctype="multipart/form-data">
                        <h6>Apakah Anda yakin ingin menghapus bank ini dari daftar ?</h6>
                        <input type="input" name="id_bank" class="form-control" value="<?php echo $bank['id_bank'] ?> " hidden><br>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning mr-2 col-3" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ml-2 col-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php endforeach; ?>