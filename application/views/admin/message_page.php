<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List pesan yang sudah terbaca</h4>
                            <!-- <a href="<?= base_url('AdminPage/all_read') ?>" class="btn btn-primary ml-auto"><i class="fas fa-check"></i> Mark All as Read</a> -->
                            <?php $psn_blm = $this->db->query("SELECT * FROM t_message WHERE status_baca='0'")->result_array();?>
                            <a href="<?= base_url('AdminPage/pesan_blm_terbaca') ?>" class="btn btn-primary ml-auto">Tampil pesan belum terbaca <span class="badge" style="background:white; color: black;"><strong><?php echo count($psn_blm)?></strong></span></a>
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
                                            <th>Pesan</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pesan as $ktg) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $ktg['nama_user'] ?></td>

                                                <td>
                                                    <?php echo $ktg['pertanyaan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $ktg['pesan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $ktg['tgl_pesan'] ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="<?= base_url('AdminPage/detail_question/' . $ktg['id_pertanyaan']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> View & Edit</a>
                                                            <div class="dropdown-divider"></div>
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