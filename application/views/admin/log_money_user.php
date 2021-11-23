<?php echo $this->session->flashdata('pesan'); ?>
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
                                            <th scope="col" class="text-center">
                                                #
                                            </th>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 0;
                                        foreach ($logmoney as $lg) : $no++; ?>

                                            <tr>
                                                <th scope="row"><?= $no; ?></th>
                                                <td><?= $lg['nama_lengkap'] ?></td>
                                                <td><?php if ($lg['status_log'] == 0) {
                                                        echo '<span class="badge bg-danger">Pengurangan Coin</span>';
                                                    } else {
                                                        echo '<span class="badge bg-success">Penambahan Coin</span>';
                                                    } ?></td>
                                                <td><?= $lg['jumlah'] ?></td>
                                                <td><?= $lg['ket_log'] ?></td>
                                                <td><?= $lg['tgl_log'] ?></td>
                                            </tr>
                                        <?php
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