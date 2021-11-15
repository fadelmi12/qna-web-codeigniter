<div class="profile mb-5 " id="#profile">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center profile-atas">
                    <?php if ($datadiri->foto_user == null) : ?>
                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo $datadiri->id_user ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                    <?php else : ?>
                        <div class="image-artikel" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $datadiri->foto_user ?>)"></div>
                    <?php endif; ?> <div class="d-block">
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
            <div class="col-lg-7 text-black">
                <h3 class="fw-bold">
                    Dashboard
                </h3>
                <hr class="m-0">
                <div class="row mt-3">
                    <div class="col-6 col-md-3 mb-3 mb-md-0">
                        <div class="box p-2 text-center">
                            <h6 class="m-0">
                                Pertanyaan
                            </h6>
                            <h6>
                                Diajukan
                            </h6>
                            <h4 class="fw-bold">
                                <?php echo count($Qcount) ?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="box p-2 text-center">
                            <h6 class="m-0">
                                Pertanyaan
                            </h6>
                            <h6>
                                Dijawab
                            </h6>
                            <h4 class="fw-bold">
                                <?php echo count($riwayat_jawab) ?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="box p-2 text-center">
                            <h6 class="m-0">
                                Artikel
                            </h6>
                            <h6>
                                Diupload
                            </h6>
                            <h4 class="fw-bold">
                                <?php echo count($Arcount) ?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-6 col-md-3  text-center">
                        <div class="box p-2">
                            <h6 class="m-0">
                                Total
                            </h6>
                            <h6>
                                Penarikan
                            </h6>
                            <h4 class="fw-bold">
                                <?php echo count($penarikan) ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <h4 class="mt-3 fw-bold">
                    Profile
                </h4>
                <hr class="m-0">
                <div class="profile-box p-2 p-lg-3 mt-3">
                    <table class="table table-borderless m-0">
                        <tbody>
                            <tr class="p-0">
                                <td class="w-25">Nama Lengkap</td>
                                <td>: <?php echo $datadiri->nama_lengkap ?></td>
                            </tr>
                            <tr class="p-0">
                                <td class="w-25">Username</td>
                                <td>: <?php echo $datadiri->nama_user ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Email</td>
                                <td>: <?php echo $datadiri->email ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">No Whatsapp</td>
                                <td>: <?php echo $datadiri->no_hp ?></td>
                            </tr>

                            <?php
                            function tgl_indo($tanggal)
                            {
                                $bulan = array(
                                    1 =>   'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                );
                                $pecahkan = explode('-', $tanggal);
                                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                            }
                            ?>

                            <tr>
                                <td class="w-25">Tanggal Lahir</td>
                                <td>: <?php
                                        $tgl = $datadiri->tgl_lahir;
                                        if ($tgl != "0000-00-00") {
                                            echo tgl_indo($datadiri->tgl_lahir);
                                        } else {
                                            echo "Tanggal Lahir belum diisi";
                                        }
                                        ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Alamat</td>
                                <td>: <?php echo $datadiri->alamat . " " . $datadiri->nama_kota . " " . $datadiri->nama_provinsi ?></td>
                            </tr>
                            <!-- <tr>
                                <td class="w-25">Kabupaten / Kota</td>
                                <td>: <?php echo $datadiri->nama_kota ?></td>
                            </tr>
                            <tr>
                                <td class="w-25">Provinsi</td>
                                <td>: <?php echo $datadiri->nama_provinsi ?></td>
                            </tr> -->
                            <tr>
                                <td class="w-25">Jenis Kelamin</td>
                                <td>:
                                    <?php if ($datadiri->gender == "laki") :
                                        echo "Laki-Laki";
                                    else :
                                        echo "Perempuan";
                                    endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex w-100 justify-content-center">
                        <a href="<?php echo base_url() ?>Profile/edit">
                            <div class="btn btn-secondary mt-3 ms-2">
                                Edit Profile
                            </div>
                        </a>
                        <!-- <div class="btn btn-primary mt-3 ms-2">
                            Verifikasi Akun
                        </div> -->
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>