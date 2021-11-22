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