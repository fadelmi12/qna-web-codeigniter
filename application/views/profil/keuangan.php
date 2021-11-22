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
                                    <?php if ($datadiri->id_bank == null) : ?>
                                        <span class="px-2 py-1">
                                            Belum Terhubung
                                        </span>
                                    <?php else :
                                        echo $datadiri->nama_bank;
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
                    Riwayat Keuangan
                </h4>
                <hr class="m-0">
                <?php if (($logmoney) != null) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function edit_rekening() {
        $('#edit_rekening').appendTo('body').modal('show');
    };
</script>

<div class="modal fade" id="edit_rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form class="d-block" action="<?php echo base_url('Profile/edit_rekening') ?>" method="POST" enctype="multipart/form-data">
                    <h4>Data Rekening</h4>
                    <hr>
                    <div class="row ms-3 mb-3">
                        <div class="col-3">
                            <h5 class="mt-1">Nama Bank</h5>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="nama_bank" id="" required>
                                <option value="" disabled selected hidden>pilih bank</option>
                                <?php
                                $id_bank = $datadiri->id_bank;
                                $nama_bank = $this->db->query("SELECT * FROM t_bank")->result_array();
                                foreach ($nama_bank as $bank) : ?>
                                    <option value="<?php echo $bank['id_bank'] ?>" <?php if ($bank['id_bank'] == $id_bank) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $bank['nama_bank'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row ms-3 mb-3">
                        <div class="col-3">
                            <h5 class="mt-1">No. Rekening</h5>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="number" name="no_rek" value="<?php echo $datadiri->no_rek ?>" required placeholder="masukkan no rekening">
                        </div>
                    </div>
                    <div class="row ms-3 mb-3">
                        <div class="col-3">
                            <h5 class="mt-1">Nama Rekening</h5>
                        </div>
                        <div class="col-8">
                            <input class="form-control" type="text" name="nama_rek" value="<?php echo $datadiri->nama_rek ?>" required placeholder="masukkan nama rekening">
                        </div>
                    </div>

                    <div class="mt-5 me-5" style="text-align: right;">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                </form>

            </div>
        </div>
    </div>
</div>