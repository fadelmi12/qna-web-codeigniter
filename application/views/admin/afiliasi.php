<?php echo $this->session->flashdata('pesan'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Afiliasi</h4>
                            <div class="col" align="right">
                                <?php $status = $this->db->query("SELECT * FROM t_setup WHERE nama_fitur = 'afiliasi'")->row()->status_fitur;
                                ?>
                                <button class="<?php if ($status == 1) {
                                                    echo 'btn btn-danger';
                                                } else {
                                                    echo 'btn btn-success';
                                                } ?>" onclick="if (<?php echo $status ?> == 1){saklar(0)}else{saklar(1)}"><i class="fas fa-<?php if ($status == 1) {
                                                                                                                                                echo 'times';
                                                                                                                                            } else {
                                                                                                                                                echo 'check';
                                                                                                                                            } ?>"></i><?php if ($status == 1) {
                                                                                                                                                            echo ' Matikan Affiliasi';
                                                                                                                                                        } else {
                                                                                                                                                            echo ' Nyalakan Affiliasi';
                                                                                                                                                        } ?></button>

                            </div>
                            <script>
                                function saklar(status) {
                                    var nama = "afiliasi";
                                    swal({
                                        title: "Anda Yakin?",
                                        text: "Merubah Status Affiliasi?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    }).then((willChange) => {
                                        if (willChange) {
                                            $(location).attr('href', '<?= base_url("AdminPage/change_status/") ?>' + status + '/' + nama);

                                        } else {
                                            swal("Data Tidak Berubah");
                                        }
                                    });


                                }
                            </script>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                #
                                            </th>
                                            <th scope="col">ID User</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Jumlah Coin</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($afiliasi as $user) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $user['id_user'] ?></td>
                                                <td><?php echo $user['nama_user'] ?></td>

                                                <td>
                                                    <?php echo number_format($user['wallet'], '0', ',', '.') ?> Coin
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url() ?>Adminpage/daftar_afiliasi/<?php echo $user['id_user'] ?>" class="btn btn-primary">Lihat Daftar User Afiliasi</a>
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
</div>