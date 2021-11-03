<div class="profile mb-5 text-black" id="#profile">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center profile-atas">
                    <?php if ($datadiri->foto_user == null) : ?>
                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo $datadiri->id_user ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                    <?php else : ?>
                        <div class="image-artikel" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $datadiri->foto_user ?>)"></div>
                    <?php endif; ?>
                    <div class="d-block">
                        <h6 class="fw-bold m-0">
                            <?php echo $datadiri->nama_user ?>
                        </h6>
                        <h6 class="m-0">
                            Saldo : <?php echo number_format($datadiri->wallet, 0, ",", ".") ?> Coin
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-lg-3">
                <?php $this->load->view('profil/sidebar'); ?>
            </div>
            <div class="col-lg-7">
                <h3 class="fw-bold">
                    Keuangan
                </h3>
                <hr class="m-0">
                <div class="box-uang p-2 mt-3">
                    <table class="table table-borderless m-0">
                        <tbody>
                            <tr class="p-0">
                                <td class="left">Saldo Akun</td>
                                <td>: <?php echo number_format($datadiri->wallet, '0', ',', '.') ?> Coin</td>
                            </tr>
                            <tr>
                                <td>No Rekening</td>
                                <td>:
                                    <?php if ($datadiri->no_rek == null) : ?>
                                        <span class="px-2 py-1">
                                            Belum Terhubung
                                        </span>
                                    <?php else :
                                        echo $datadiri->no_rek;
                                    endif;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Bank</td>
                                <td>:
                                    <?php if ($datadiri->nama_bank == null) : ?>
                                        <span class="px-2 py-1">
                                            Belum Terhubung
                                        </span>
                                    <?php else :
                                        if ($datadiri->nama_bank == "bri") :
                                            echo "Bank BRI";
                                        elseif ($datadiri->nama_bank == "bca") :
                                            echo "Bank BCA";
                                        elseif ($datadiri->nama_bank == "bni") :
                                            echo "Bank BNI";
                                        endif;
                                    endif;
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Nama Rekening</td>
                                <td>: <?php if ($datadiri->nama_rek == null) : ?>
                                        <span class="px-2 py-1">
                                            Belum Terhubung
                                        </span>
                                    <?php else :
                                            echo $datadiri->nama_rek;
                                        endif;
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Jumlah Penarikan</td>
                                <td>: 0x</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex w-100 justify-content-center mt-2 mb-2 flex-wrap">
                        <a href="javascript:edit_rekening();">
                            <div class="d-flex align-items-center p-2 btn-ubah me-2 px-3 bg-primary">
                                <span class="iconify me-1" data-icon="ph:gear-six-bold"></span>
                                <span class="mb-0 p-0">
                                    Ubah Rekening
                                </span>
                            </div>
                        </a>
                        <a href="<?php echo base_url() ?>profile/penarikan">
                            <div class="d-flex align-items-center p-2 px-3 btn-ubah bg-success me-2">
                                <span class="iconify me-1" data-icon="entypo:wallet"></span>
                                <span class="mb-0">
                                    Penarikan
                                </span>
                            </div>
                        </a>

                        <a href="<?php echo base_url(); ?>profile/topup" class="">
                            <div class="d-flex align-items-center p-2 px-3 btn-ubah bg-warning mt-2 mt-lg-0">
                                <span class="iconify me-1" data-icon="bx:bxs-coin-stack"></span>
                                <span class="mb-0">
                                    Top Up Saldo
                                </span>
                            </div>
                        </a>
                    </div>

                </div>
                <h4 class="fw-bold mt-3">
                    Riwayat Penarikan
                </h4>
                <hr class="m-0">
                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($logmoney as $lg) : $no++; ?>

                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $lg['nama_lengkap'] ?></td>
                                    <td><?= $lg['status_log'] ?></td>
                                    <td><?= $lg['jumlah'] ?></td>
                                    <td><?= $lg['ket_log'] ?></td>
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
<script type="text/javascript">
    function edit_rekening() {
        $('#edit_rekening').modal('show');
    };
</script>