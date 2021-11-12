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
                                            <th>Jenis Pesan</th>
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
                                                    <?php if ($ktg['id_pertanyaan'] != null) {
                                                        echo "Pertanyaan";
                                                    } else {
                                                        echo "Artikel";
                                                    } ?>
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
                                                            <?php if ($ktg['id_pertanyaan'] != null) : ?>
                                                                <a href="<?= base_url('AdminPage/detail_question/' . $ktg['id_pertanyaan']) ?>" class="dropdown-item has-icon" onclick="ubah_status_baca(<?php echo $ktg['id_message'] ?>)"><i class="far fa-edit"></i> View message & Edit</a>
                                                            <?php else : ?>
                                                                <a onclick="tampilembed(<?php echo $ktg['id_artikel'] ?>)" href="#" class="dropdown-item has-icon"><i class="fas fa-search"></i> View & Detail</a>
                                                                <a href="<?= base_url('AdminPage/ubah_status_baca_single/' . $ktg['id_message']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Terbaca </a>

                                                                <div class="dropdown-divider"></div>
                                                            <?php endif; ?>
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
        function ubah_status_baca(id_message) {
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
    <script type="text/javascript">
        function tampilembed(id) {
            $('#tampil_embed' + id).appendTo("body").modal('show');
        }
    </script>

    <!-- modal tampil artikel -->
    <?php foreach ($pesan as $list) : ?>
        <div class="modal fade bd-example-modal-xl" style="" tabindex="-1" id="tampil_embed<?php echo $list['id_artikel'] ?>" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
                        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>ARTIKEL</strong></h4>
                        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:95%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-21by9">
                            <embed src="<?php echo base_url() . '/assets/pdf/' . $list['file_pdf'] ?>" frameborder="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>