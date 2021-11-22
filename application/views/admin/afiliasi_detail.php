<?php echo $this->session->flashdata('pesan'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Afiliasi <?php echo $profile ?></h4>
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
                                            <th scope="col">Penambahan Coin</th>
                                            <th scope="col">Waktu Afiliasi</th>
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
                                                    <?php echo number_format($user['koin'], '0', ',', '.') ?> Coin
                                                </td>
                                                <td>
                                                    <?php echo $user['tgl_afiliasi'] ?>
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