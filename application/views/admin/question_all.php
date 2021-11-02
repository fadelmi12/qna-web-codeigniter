<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>User</th>
                                            <th>Pertanyaan</th>
                                            <th>Status Tampil</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($question as $ktg) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $ktg['nama_user'] ?></td>

                                                <td>
                                                    <?php echo $ktg['pertanyaan'] ?>
                                                </td>
                                                <td><?php if ($ktg['status_hidden'] == 0) {
                                                        echo 'Tampil';
                                                    } else {
                                                        echo 'disembunyikan';
                                                    } ?></td>
                                                <td>
                                                    <?php echo $ktg['waktu_question'] ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">

                                                            <a href="<?= base_url('AdminPage/detail_question/' . $ktg['id_pertanyaan']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> View & Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a onclick="delete_quest(<?= $ktg['id_pertanyaan'] ?>)" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function delete_quest(id_prt) {


            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover Question!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url('AdminPage/hapus_question/') ?>",
                        type: "POST",
                        data: {
                            id_pertanyaan: id_prt
                        },
                        dataType: "JSON",
                        success: function(data) {
                            // console.log(data);


                        }
                    });
                    window.location.reload();

                } else {
                    swal("Delete Gagal");
                }
            });

        }
    </script>