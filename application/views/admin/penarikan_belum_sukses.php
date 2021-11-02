<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col">
                                <h4>Data Penarikan Saldo Belum Terkirim <span class="bg-primary col-2"><?php echo count($penarikan_batal)?></span></h4>
                            </div>
                            <div class="col" align="right">
                                <button class="btn btn-success" onclick="window.location.href='<?php echo base_url('Penarikan_saldo/index/') ?>'"><i class="fas fa-times"></i> Sukses Terkirim</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                #
                                            </th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Nama Bank</th>
                                            <th scope="col">No. Rekening</th>
                                            <th scope="col">Jumlah Koin</th>
                                            <th scope="col">Jumlah Uang</th>
                                            <th scope="col">Status Terkirim</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($penarikan_batal as $tarik) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no ?>
                                                </td>
                                                <td>
                                                    <?php echo $tarik['nama_lengkap'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $tarik['nama_bank'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $tarik['no_rek'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $tarik['jumlah_coin'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $tarik['jumlah_uang'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $data = $tarik['status_terkirim'];
                                                        if ($data == '1') {
                                                            echo('Terkirim');
                                                        }else{
                                                            echo('Belum Terkirim');
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="<?php echo base_url('Penarikan_saldo/ubah_status_terkirim/'. $tarik['id_penarikan']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Barhasil Terkirim</a>
                                                            <!-- <a href="<?php echo base_url() ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Belum Terkirim</a> -->
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