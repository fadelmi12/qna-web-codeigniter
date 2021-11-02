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
                    Daftar Pertanyaan
                </h3>
                <hr class="m-0">
                <div class="mt-3 pertanyaan-profile">
                    <ul>
                        <?php if ($Question == null) : ?>
                            <li class="p-3">
                                <div class="d-block w-100">
                                    <div class=" text-center">
                                        <h5 class="m-0">
                                            Kamu belum pernah bertanya lho :)<br>
                                            yuk <a href="javascript:check_user();" title="buat pertanyaan">tanyakan</a> apa yang belum kamu ketahui...
                                        </h5>
                                    </div>
                                </div>
                            </li>
                        <?php else : ?>
                            <?php foreach ($Question as $qs) :
                                date_default_timezone_set('Asia/Jakarta');
                                $awal  = date_create($qs['waktu_question']);
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
                                <li class="p-3">
                                    <div class="d-flex">
                                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/102?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                        </div>
                                        <div class="d-block w-100">
                                            <div class="d-flex justify-content-between ">
                                                <div class="user mb-2">
                                                    <div class="nama">
                                                        <h5>
                                                            <?php echo $qs['nama_user'] ?>
                                                        </h5>
                                                    </div>
                                                    <div class="upload mt-1">
                                                        <h6>
                                                            <span class="d-none d-sm-inline-block"> <?php echo $qs['nama_kategori'] ?></span> <a href=""><?php echo $time ?>yang lalu</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="harga">
                                                    <h6>
                                                        <span style="margin-right:.3rem;"></span><?php echo number_format($qs['harga'], '0', ',', '.') ?> Coin
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="pertanyaan">
                                                <a href="<?php echo base_url('Pertanyaan/detail/' . $qs['id_pertanyaan']) ?>">
                                                    <h5>
                                                        <?php echo $qs['pertanyaan'] ?>
                                                    </h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>