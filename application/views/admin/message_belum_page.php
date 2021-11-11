<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List pesan yang belum terbaca</h4>
                            <div class="row ml-auto">
                                <a href="<?= base_url('AdminPage/all_read') ?>" class="btn btn-primary"><i class="fas fa-check"></i> Mark All as Read</a>
                                <a href="<?= base_url('AdminPage/MessageBox') ?>" class="btn btn-success ml-2">Tampil pesan sudah terbaca</a>
                            </div>
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
                                                            <a href="<?= base_url('AdminPage/detail_question/' . $ktg['id_pertanyaan']) ?>" class="dropdown-item has-icon" onclick="ubah_status_baca(<?php echo $ktg['id_message']?>)"><i class="far fa-edit"></i> View message & Edit</a>
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
        function ubah_status_baca(id_message){
            $.ajax({
                    url: "<?php echo base_url('AdminPage/ubah_status_baca/') ?>",
                    type: "POST",
                    data: {
                        id_pesan: id_message
                    },
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data);
                    }
                });
        }
    </script>