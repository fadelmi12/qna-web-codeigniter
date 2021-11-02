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
            <div class="col-lg-7">
                <h3 class="fw-bold">
                    Riwayat Jawab
                </h3>
                <hr class="m-0">
                <div class="mt-3 riwayat-jawab">
                    <ul style="list-style: none;" class="m-0 p-0">
                        <?php foreach ($riwayat_jawab as $rwt) :
                            date_default_timezone_set('Asia/Jakarta');
                            $awal  = date_create($rwt['waktu_jawab']);
                            $akhir = date_create();
                            $diff  = date_diff($awal, $akhir);

                            if ($diff->y != null) {
                                $time = $diff->y . ' tahun ';
                            } elseif ($diff->m != null) {
                                $time = $diff->m . ' bulan ';
                            } elseif ($diff->d != null) {
                                $time = $diff->d . ' hari ';
                            } elseif ($diff->h != null) {
                                $time = $diff->h . ' jam ';
                            } elseif ($diff->i != null) {
                                $time = $diff->i . ' menit ';
                            } else {
                                $time = $diff->s . ' detik ';
                            } ?>
                            <li class="mt-3">
                                <div class="history p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <?php if ($datadiri->foto_user == null) : ?>
                                            <div class="image" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo $datadiri->id_user ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                                        <?php else : ?>
                                            <div class="image" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $datadiri->foto_user ?>)"></div>
                                        <?php endif; ?>
                                        <!-- <div class="image" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $rwt['foto_user'] ?>)"></div> -->
                                        <h6 class="m-0">
                                            <a href="" class="fw-bold"><?php echo $rwt['nama_kategori'] ?></a>, <?php echo $time ?> yang lalu
                                        </h6>
                                    </div>

                                    <h6 class="m-0">
                                        Anda menjawab di pertanyaan :
                                    </h6>
                                    <h6 class="fw-bold qst">
                                        <?php echo $rwt['pertanyaan'] ?> </h6>
                                    <h6 class="m-0">
                                        Jawaban Anda :
                                    </h6>
                                    <h6 class="fw-bold ans mb-0">
                                        <?php echo $rwt['jawaban'] ?> </h6>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>