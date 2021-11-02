<div class="daftar">
    <ul>
        <?php foreach ($question as $qty) :
            date_default_timezone_set('Asia/Jakarta');
            $awal  = date_create($qty['waktu_question']);
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
            }

        ?>
            <li class="p-3">
                <!-- tampilan desktop -->
                <div class="d-none d-md-flex">
                    <?php if ($qty['foto_user'] == "") : ?>

                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $qty['id_user'] ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                        </div>
                    <?php else : ?>
                        <div class="image-artikel" style="background-image: url('<?php echo base_url('assets/img/profil' . $qty['foto_user']) ?>')">
                        </div>
                    <?php endif; ?>
                    <div class="d-block w-100">
                        <div class="d-flex justify-content-between ">
                            <div class="user mb-2">
                                <div class="nama">
                                    <h5>
                                        <?= $qty['nama_user'] ?></h5>
                                </div>
                                <div class="upload mt-1">
                                    <h6>
                                        <span class="d-none d-sm-inline-block"><?= $qty['nama_kategori'] ?>,</span> <a href=""><?php echo $time ?> yang lalu</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="harga">
                                <h6>
                                    <span style="margin-right:.3rem;"></span><?php echo number_format($qty['harga']) ?> Coin
                                </h6>
                            </div>
                        </div>
                        <div class="pertanyaan">
                            <a href="<?php echo base_url('pertanyaan/detail/' . $qty['id_pertanyaan']) ?>">
                                <h5>
                                    <?= $qty['pertanyaan'] ?>
                                </h5>
                            </a>
                        </div>
                        <style type="text/css">
                            .btn-jempol {
                                color: black;
                            }

                            .sudahjempol {
                                color: blue;
                            }
                        </style>
                        <div class="d-flex justify-content-between align-items-center position-relative">
                            <?php
                            $i = 0;
                            foreach ($like as $key) :
                                if ($key['id_pertanyaan'] == $qty['id_pertanyaan']) $i++;
                            endforeach; ?>
                            <div class="like">
                                <form id="input" enctype="multipart/form-data">
                                    <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                    <button onclick="like()" id="btnjempol<?php echo $qty['id_pertanyaan'] ?>" data="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up btn-jempol p-0 m-0" style="cursor:pointer;border:none; background: transparent; "></button>
                                </form>
                            </div>
                            <?php
                            foreach ($like as $key) :
                                if ($key['id_pertanyaan'] == $qty['id_pertanyaan'] && $key['id_user'] ==  $this->session->userdata('id_user')) { ?>
                                    <div class="like" style="position: absolute;">
                                        <form id="input" enctype="multipart/form-data">
                                            <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                            <button onclick="unlike()" id="btnunlike<?php echo $qty['id_pertanyaan'] ?>" data2="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up btn-jempol sudahjempol p-0 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
                                        </form>
                                    </div>
                            <?php }
                            endforeach; ?>

                            <?php if ($i != 0) : ?>
                                <h6 id="ttl_like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left:45px"><?php echo $i; ?></h6>
                            <?php endif; ?>

                            <h6 id="like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left:45px; display: none;"><strong id="like<?php echo $qty['id_pertanyaan'] ?>"></strong></h6>

                            <div id="like"></div>

                            <a href="<?php echo base_url('Pertanyaan/detail/' . $qty['id_pertanyaan']) ?>">

                                <div class="jawab d-flex">
                                    <i class="fas fa-pencil-alt my-auto"></i>
                                    <h6>
                                        Jawab
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Tampilan Mobile -->
                <div class="d-block d-md-none">
                    <div class="d-flex w-100">
                        <?php if ($qty['foto_user'] == "") : ?>
                            <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $qty['id_user'] ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                        <?php else : ?>
                            <div class="image-artikel" style="background-image: url('<?php echo base_url('assets/img/profil/' . $qty['foto_user']) ?>')"></div>
                        <?php endif; ?>

                        <div class="d-flex justify-content-between w-100 ">
                            <div class="user mb-2">
                                <div class="nama">
                                    <h5>
                                        <?= $qty['nama_user'] ?></h5>
                                </div>
                                <div class="upload mt-1">
                                    <h6>
                                        <span class="d-none d-sm-inline-block"><?= $qty['nama_kategori'] ?> ,</span> <a href=""><?php echo $time ?> yang lalu</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="harga">
                                <h6>
                                    <span style="margin-right:.3rem;"></span><?php echo number_format($qty['harga']) ?> Coin
                                </h6>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('pertanyaan/detail/' . $qty['id_pertanyaan']); ?>">
                        <div class="pertanyaan">
                            <h5>
                                <?= $qty['pertanyaan'] ?>
                            </h5>
                        </div>
                    </a>

                    <div class="d-flex justify-content-between align-items-center position-relative">
                        <!-- <div class="like ">
                                                <i class="far fa-thumbs-up"></i>
                                            </div> -->
                        <?php
                        $i = 0;
                        foreach ($like as $key) :
                            if ($key['id_pertanyaan'] == $qty['id_pertanyaan']) $i++;
                        endforeach; ?>
                        <div class="like">
                            <form id="input" enctype="multipart/form-data">
                                <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                <button onclick="like()" id="btnjempol_mobile<?php echo $qty['id_pertanyaan'] ?>" data="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up btn-jempol p-0 m-0" style="cursor:pointer;border:none; background: transparent; "></button>
                            </form>
                        </div>
                        <?php
                        foreach ($like as $key) :
                            if ($key['id_pertanyaan'] == $qty['id_pertanyaan'] && $key['id_user'] ==  $this->session->userdata('id_user')) { ?>
                                <div class="like" style="position: absolute;">
                                    <form id="input" enctype="multipart/form-data">
                                        <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                        <button onclick="unlike()" id="btnunlike_mobile<?php echo $qty['id_pertanyaan'] ?>" data2="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up btn-jempol sudahjempol p-0 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
                                    </form>
                                </div>
                        <?php }
                        endforeach; ?>

                        <?php if ($i != 0) : ?>
                            <h6 id="ttl_like_mobile<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left:45px"><?php echo $i; ?></h6>
                        <?php endif; ?>

                        <h6 id="like_mobile<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left:45px; display: none;"><strong id="like<?php echo $qty['id_pertanyaan'] ?>"></strong></h6>

                        <a href="<?php echo base_url('pertanyaan/detail/' . $qty['id_pertanyaan']); ?>">

                            <div class="jawab d-flex">
                                <i class="fas fa-pencil-alt my-auto"></i>
                                <h6>
                                    Jawab
                                </h6>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>


    </ul>
</div>