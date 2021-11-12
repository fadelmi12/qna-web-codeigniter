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
                                            <th>Tanggal/Jam</th>
                                            <th class="text-center">Action</th>
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

                                                <td>
                                                    <?php echo $ktg['waktu_question'] ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <div class="dropdown-divider"></div>
                                                            <a onclick="verif_quest(<?= $ktg['id_pertanyaan'] ?>, <?php echo $ktg['id_user'] ?>)" data='<?php echo $ktg['id_user'] ?>' class="dropdown-item has-icon"><i class="fas fa-check"></i>
                                                                Verfikasi pertanyaan </a>
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
        function verif_quest(id_prt, id_user) {
            // var id_user = event.target.getAttribute('data');

            swal({
                title: "Anda Yakin?",
                text: "Izinkan Pertanyaan Tampil?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    setTimeout(
                        $.ajax({
                            url: "<?php echo base_url('AdminPage/verif_quest/') ?>",
                            type: "POST",
                            data: {
                                id_pertanyaan: id_prt,
                                id_user: id_user
                            },
                            dataType: "JSON",
                            success: function(data) {
                                // console.log(data);


                            }
                        }) &&
                        window.location.reload(), 2000);

                } else {
                    swal("Verifikasi Gagal");
                }
            });

        }
    </script>