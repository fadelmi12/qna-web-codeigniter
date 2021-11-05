<?php $sess = $this->session->userdata('id_user') ?>
<div class="question-detail mb-5" id="question-detail" style="background-color: rgb(253, 253, 253);">
    <div class="py-3 py-lg-4">

    </div>

    <div class="detail-pertanyaan mt-3">
        <div class="container">
            <div class="row justify-content-center px-md-5">
                <div class="col-md-8">
                    <div class="question-box p-3 mb-4">
                        <h4 class="text-center text-sm-start fw-bold">
                            Pertanyaan
                        </h4>
                        <hr class="my-2 mb-3">
                        <?php foreach ($question as $ques) :
                            date_default_timezone_set('Asia/Jakarta');
                            $awal  = date_create($ques['waktu_question']);
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
                        <?php $jumlahjawab = 0;
                        foreach ($jawaban as $jawab) :
                            $jumlahjawab++;                                    
                        endforeach; ?>
                            <div class="d-none d-md-flex">
                                <?php if ($ques['foto_user'] == "") : ?>
                                    <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $ques["id_user"] ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                    </div>
                                <?php else : ?>
                                    <div class="image-artikel" style="background-image: url('<?php base_url('assets/img/' . $ques['foto_user']) ?>')">
                                    </div>
                                <?php endif; ?>
                                <div class="d-block w-100">
                                    <div class="d-flex justify-content-between ">
                                        <div class="user mb-2">
                                            <div class="nama">
                                                <h5><?= $ques['nama_user'] ?></h5>
                                            </div>
                                            <div class="upload mt-1">
                                                <h6>
                                                    <span class="d-none d-sm-inline-block"><?php echo $ques['nama_kategori'] ?>,</span> <a href=""><?php echo $time ?>yang lalu</a>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="harga">
                                            <h6>
                                                <span style="margin-right:.3rem;"></span><?php echo number_format($ques['harga']) ?> Coin
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="pertanyaan">
                                        <h5>
                                            <?php echo $ques['pertanyaan'] ?>
                                        </h5>
                                    </div>
                                    <?php if ($ques['gambar_tanya'] !== '') : ?>
                                        <img src="<?php echo base_url() . 'assets/img/gambar_tanya/' . $ques['gambar_tanya']; ?>" style="width:50%">
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between align-items-center position-relative mt-3">
                                        <?php if ($ques['status_jawab'] != 0) : ?>
                                            <div class="jawab d-flex">
                                                <i class="iconify my-auto me-2" data-icon="fa-solid:check"></i>
                                                <h6>
                                                    TERJAWAB
                                                </h6>
                                            </div>
                                        <?php elseif ($ques['id_user'] !== $sess) : ?>
                                            <a onclick="JawabShow()">
                                                <div class="jawab d-flex">
                                                    <i class="fas fa-pencil-alt my-auto"></i>
                                                    <h6>
                                                        Jawab
                                                    </h6>
                                                </div>
                                            </a>
                                        <?php elseif($jumlahjawab = 0) : ?>
                                            <a onclick="editShow()">
                                                <div class="jawab d-flex">
                                                    <i class="fas fa-pencil-alt my-auto"></i>
                                                    <h6>
                                                        Edit
                                                    </h6>
                                                </div>
                                            </a>
                                        <?php else : ?>
                                            <div class="d-flex"></div>
                                        <?php endif; ?>
                                        <script>
                                            function JawabShow() {
                                                var id_user = '<?= $sess ?>';
                                                if (id_user != '') {
                                                    $('#tambahjawaban').modal('show');
                                                } else {
                                                    $('#Konfirmasi_Like_Login').modal('show');
                                                };

                                            }

                                            function editShow() {
                                                $('#edittanya').modal('show');

                                            }
                                        </script>
                                        <div class="form-group d-flex">
                                            <div class="like me-2">
                                                <button onclick="tampil_modal_share()" type="button" class="fas fa-share-square p-0 m-0" style="border: none; background: transparent;"></button>
                                            </div>

                                            <style type="text/css">
                                                .belumbookmark {
                                                    color: black;
                                                }

                                                .sudahbookmark {
                                                    color: #0073ff;
                                                }
                                            </style>
                                            <?php if ($ques['id_user'] !== $sess) : ?>
                                                <div class="like me-2">
                                                    <div hidden="">
                                                        <input type="text" id="likedtl" name="id_pertanyaan" value="<?php echo $ques['id_pertanyaan'] ?>">
                                                        <input id="id_user" type="text" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                                    </div>
                                                    <?php $jumlahbook = 0;
                                                    foreach ($bookmark as $book) :
                                                        if ($sess == $book['id_user'] && $book['id_pertanyaan'] == $ques['id_pertanyaan']) {
                                                            $jumlahbook++;
                                                            $status = $book['status_bookmark'];
                                                        }
                                                    endforeach; ?>
                                                    <?php if ($jumlahbook == 0) : ?>
                                                        <button id="btnbookmark<?php echo $ques['id_pertanyaan'] ?>" onclick="bookmark()" data="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1" style="border: none; background: transparent;"></button>
                                                    <?php elseif ($status == '0') : ?>
                                                        <button id="btnbookmark<?php echo $ques['id_pertanyaan'] ?>" onclick="bookmark()" data="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1" style="border: none; background: transparent;"></button>
                                                    <?php elseif ($status == '1') : ?>
                                                        <button id="btnunbookmark<?php echo $ques['id_pertanyaan'] ?>" onclick="unbookmark()" data2="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1 sudahbookmark" style="border: none; background: transparent;"></button>
                                                    <?php endif; ?>


                                                </div>
                                                <?php
                                                $jumlah_report = 0;
                                                foreach ($report as $rpt) {
                                                    if ($rpt['id_pertanyaan'] == $ques['id_pertanyaan'] && $rpt['id_user'] == $this->session->userdata('id_user')) {
                                                        $jumlah_report++;
                                                    }
                                                } ?>

                                                <?php if ($jumlah_report == 0) : ?>

                                                    <a onclick="report_pertanyaan()">
                                                        <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                                        <div class="like">

                                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>

                                                        </div>
                                                    </a>
                                                <?php endif ?>

                                            <?php else : ?>
                                                <?php $j = 0;
                                                foreach ($jawaban as $jw) {
                                                    $j++;
                                                } ?>
                                                <?php if ($j == 0) : ?>
                                                    <a onclick="hapus_pertanyaan()">
                                                        <div class="like">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Tampilan Mobile -->
                            <div class="d-block d-md-none">
                                <div class="d-flex w-100">
                                    <?php if ($ques['foto_user'] == "") : ?>
                                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $ques['id_user'] ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                                    <?php else : ?>
                                        <div class="image-artikel" style="background-image: url('<?php echo base_url('assets/img/profil/' . $ques['id_user']) ?>')"></div>
                                    <?php endif; ?>
                                    <div class="d-flex justify-content-between w-100 ">
                                        <div class="user mb-2">
                                            <div class="nama">
                                                <h5><?php echo $ques['nama_user'] ?></h5>
                                            </div>
                                            <div class="upload mt-1">
                                                <h6>
                                                    <span class="d-none d-sm-inline-block"><?php echo $ques['nama_kategori'] ?> ,</span> <a href=""><?php echo $time ?> yang lalu</a>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="harga">
                                            <h6>
                                                <span style="margin-right:.3rem;">Rp</span><?php echo number_format($ques['harga']) ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="pertanyaan">
                                        <h5>
                                            <?php echo $ques['pertanyaan'] ?>
                                        </h5>
                                    </div>
                                </a>
                                <?php if ($ques['gambar_tanya'] !== '') : ?>
                                    <img src="<?php echo base_url() . 'assets/img/gambar_tanya/' . $ques['gambar_tanya']; ?>" style="width:50%">
                                <?php endif; ?>
                                <div class="d-flex justify-content-between align-items-center position-relative mt-3">
                                    <?php if ($ques['status_jawab'] == 1) : ?>
                                        <div class="jawab d-flex justify-content-center">
                                            <i class="iconify my-auto me-2" data-icon="fa-solid:check"></i>
                                            <h6>
                                                TERJAWAB
                                            </h6>
                                        </div>

                                    <?php elseif ($ques['id_user'] !== $sess) : ?>


                                        <a onclick="JawabShow()">
                                            <div class="jawab d-flex justify-content-center">
                                                <i class="fas fa-pencil-alt my-auto"></i>
                                                <h6>
                                                    JAWAB
                                                </h6>
                                            </div>
                                        </a>


                                    <?php elseif($jumlahjawab = 0) : ?>
                                        <a onclick="editShow()">
                                            <div class="jawab d-flex justify-content-center">
                                                <i class="fas fa-pencil-alt my-auto"></i>
                                                <h6>
                                                    EDIT
                                                </h6>
                                            </div>
                                        </a>
                                    <?php else : ?>
                                    <div class="d-flex"></div>
                                    <?php endif; ?>
                                    <script>
                                        function JawabShow() {
                                            var id_user = '<?= $sess ?>';
                                            if (id_user != '') {
                                                $('#tambahjawaban').modal('show');
                                            } else {
                                                $('#Konfirmasi_Like_Login').modal('show');
                                            };

                                        }

                                        function editShow() {
                                            $('#edittanya').modal('show');

                                        }
                                    </script>

                                    <div class="d-flex justify-content-end align-items-center position-relative mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <button onclick="tampil_modal_share()" type="button" class="fas fa-share-square p-0 m-0" style="border: none; background: transparent;"></button>
                                            </div>
                                            <?php if ($ques['id_user'] !== $sess) : ?>
                                                <a onclick="report_pertanyaan()">
                                                    <!-- <form id="input" enctype="multipart/form-data"> -->
                                                    <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                                    <div class="me-3">

                                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>

                                                    </div>
                                                    <!-- </form> -->
                                                </a>
                                                <div class="">
                                                    <div hidden="">
                                                        <input type="text" id="likedtl" name="id_pertanyaan" value="<?php echo $ques['id_pertanyaan'] ?>">
                                                        <input id="id_user" type="text" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                                    </div>
                                                    <?php $jumlahbook = 0;
                                                    foreach ($bookmark as $book) :
                                                        if ($sess == $book['id_user'] && $book['id_pertanyaan'] == $ques['id_pertanyaan']) {
                                                            $jumlahbook++;
                                                            $status = $book['status_bookmark'];
                                                        }
                                                    endforeach; ?>
                                                    <?php if ($jumlahbook == 0) : ?>
                                                        <button id="btnbookmark_mobile<?php echo $ques['id_pertanyaan'] ?>" onclick="bookmark()" data="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1" style="border: none; background: transparent;"></button>
                                                    <?php elseif ($status == '0') : ?>
                                                        <button id="btnbookmark_mobile<?php echo $ques['id_pertanyaan'] ?>" onclick="bookmark()" data="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1" style="border: none; background: transparent;"></button>
                                                    <?php elseif ($status == '1') : ?>
                                                        <button id="btnunbookmark_mobile<?php echo $ques['id_pertanyaan'] ?>" onclick="unbookmark()" data2="<?php echo $ques['id_pertanyaan'] ?>" type="button" class="fas fa-bookmark p-1 sudahbookmark" style="border: none; background: transparent;"></button>
                                                    <?php endif; ?>


                                                </div>

                                            <?php else : ?>
                                                <?php $j = 0;
                                                foreach ($jawaban as $jw) {
                                                    $j++;
                                                } ?>
                                                <?php if ($j == 0) : ?>
                                                    <a onclick="hapus_pertanyaan()">
                                                        <div class="">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <script>
                        function hapus_pertanyaan() {
                            $('#hapustanya').modal('show');

                        }

                        function report_pertanyaan() {
                            var id_user = document.getElementById("id_user").value;
                            if (id_user != '') {
                                $('#reporttanya').modal('show');
                            } else {
                                $('#Konfirmasi_Like_Login').modal('show');
                            }



                        }
                    </script>

                    <div class="answer-box p-3 mb-5">
                        <?php
                        $jum = 0;
                        foreach ($jawaban as $jwb) {
                            $jum++;
                        } ?>
                        <div class="text-center text-sm-start">
                            <h4 class="fw-bold">
                                Jawaban (<?php echo $jum; ?>)
                            </h4>
                            <hr class="my-2 mb-3">
                        </div>

                        <ul style="list-style: none" class="p-0">
                            <?php foreach ($jawaban as $jwb) :
                                date_default_timezone_set('Asia/Jakarta');
                                $awal  = date_create($jwb['waktu_jawab']);
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

                                <li class="mb-3">
                                    <div class="d-none d-md-flex">
                                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/102b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                        </div>
                                        <div class="d-block w-100">
                                            <div class="d-flex justify-content-between ">
                                                <div class="user mb-2">
                                                    <div class="nama">
                                                        <h5><?php echo $jwb['nama_user'] ?></h5>
                                                    </div>
                                                    <div class="upload mt-1">
                                                        <h6>
                                                            <a href=""><?php echo $time ?> yang lalu</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pertanyaan">
                                                <h5>
                                                    <?php echo $jwb['jawaban'] ?>
                                                </h5>
                                            </div>
                                            <?php if ($jwb['gambar_jawab'] !== '') : ?>
                                                <img src="<?php echo base_url() . 'assets/img/gambar_jawab/' . $jwb['gambar_jawab']; ?>" style="width:50%">
                                            <?php endif; ?>
                                            <style type="text/css">
                                                .belumbookmark {
                                                    color: black;
                                                }

                                                .sudahjempol {
                                                    color: #cf2961;
                                                }
                                            </style>
                                            <div class="d-flex justify-content-between align-items-center position-relative mt-2">

                                                <?php
                                                $i = 0;
                                                foreach ($love as $key) :
                                                    if ($key['id_jawaban'] == $jwb['id_jawaban']) $i++;
                                                endforeach; ?>
                                                <div class="like p-2">
                                                    <!-- <form id="input" enctype="multipart/form-data"> -->
                                                    <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                                    <button onclick="like()" id="btnjempol<?php echo $jwb['id_jawaban'] ?>" data="<?php echo $jwb['id_jawaban'] ?>" type="button" class="fas fa-heart btn-jempol p-1 m-0" style="cursor:pointer;border:none; background: transparent; "></button>
                                                    <!-- </form> -->
                                                </div>
                                                <?php
                                                foreach ($love as $key) :
                                                    if ($key['id_jawaban'] == $jwb['id_jawaban'] && $key['id_user'] ==  $this->session->userdata('id_user')) { ?>
                                                        <div class="like p-2" style="position: absolute;">
                                                            <!-- <form id="input" enctype="multipart/form-data"> -->
                                                            <input type="hidden" id="id_user" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                                            <button onclick="unlike()" id="btnunlike<?php echo $jwb['id_jawaban'] ?>" data2="<?php echo $jwb['id_jawaban'] ?>" type="button" class="fas fa-heart btn-jempol sudahjempol p-1 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
                                                            <!-- </form> -->
                                                        </div>
                                                <?php }
                                                endforeach; ?>

                                                <?php if ($i != 0) : ?>
                                                    <h6 id="ttl_like<?php echo $jwb['id_jawaban'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left: 50px;"><?php echo $i; ?></h6>
                                                <?php endif; ?>

                                                <h6 id="like<?php echo $jwb['id_jawaban'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left: 50px; display: none;"><strong id="like<?php echo $jwb['id_jawaban'] ?>"></strong></h6>

                                                <div id="like"></div>
                                                <!-- <i class="fa fa-heart"></i> -->
                                                <!-- </div> -->
                                                <?php if ($jwb['jawaban_benar'] == 0 && $sess == $ques['id_user']) : ?>
                                                    <?php if ($ques['status_jawab'] == 0) : ?>
                                                        <a onclick="verifShow(<?php echo $jwb['id_jawaban'] ?>)">
                                                            <div class="jawab d-flex align-items-center">
                                                                <i class="fas fa-check"></i>
                                                                <h6>
                                                                    Verifikasi Jawaban
                                                                </h6>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php elseif ($jwb['jawaban_benar'] == 1) : ?>
                                                    <div class="jawab d-flex align-items-center">
                                                        <i class="fas fa-check"></i>
                                                        <h6>
                                                            Jawaban Benar
                                                        </h6>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tampilan Mobile Bagian Jawaban -->
                                    <div class="d-block d-md-none">
                                        <div class="d-flex w-100">
                                            <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/102b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                                            <div class="d-flex justify-content-between w-100 ">
                                                <div class="user mb-2">
                                                    <div class="nama">
                                                        <h5><?php echo $jwb['nama_user'] ?></h5>
                                                    </div>
                                                    <div class="upload mt-1">
                                                        <h6>
                                                            <span class="d-none d-sm-inline-block">Matematika ,</span> <a href=""><?php echo $time ?> yang lalu</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="pertanyaan">
                                                <h5>
                                                    <?php echo $jwb['jawaban'] ?>
                                                </h5>
                                            </div>
                                        </a>
                                        <?php if ($jwb['gambar_jawab'] !== '') : ?>
                                            <img src="<?php echo base_url() . 'assets/img/gambar_jawab/' . $jwb['gambar_jawab']; ?>" style="width:50%">
                                        <?php endif; ?>
                                        <div class="d-flex justify-content-between align-items-center position-relative">
                                            <!-- <div class="like d-flex align-items-center"> -->
                                            <?php
                                            $i = 0;
                                            foreach ($love as $key) :
                                                if ($key['id_jawaban'] == $jwb['id_jawaban']) $i++;
                                            endforeach; ?>
                                            <div class="like p-2">
                                                <!-- <form id="input" enctype="multipart/form-data"> -->
                                                <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                                <button onclick="like()" id="btnjempol_mobile<?php echo $jwb['id_jawaban'] ?>" data="<?php echo $jwb['id_jawaban'] ?>" type="button" class="fas fa-heart btn-jempol p-1 m-0" style="cursor:pointer;border:none; background: transparent; "></button>
                                                <!-- </form> -->
                                            </div>
                                            <?php
                                            foreach ($love as $key) :
                                                if ($key['id_jawaban'] == $jwb['id_jawaban'] && $key['id_user'] ==  $this->session->userdata('id_user')) { ?>
                                                    <div class="like p-2" style="position: absolute;">
                                                        <!-- <form id="input" enctype="multipart/form-data"> -->
                                                        <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                                        <button onclick="unlike()" id="btnunlike_mobile<?php echo $jwb['id_jawaban'] ?>" data2="<?php echo $jwb['id_jawaban'] ?>" type="button" class="fas fa-heart btn-jempol sudahjempol p-1 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
                                                        <!-- </form> -->
                                                    </div>
                                            <?php }
                                            endforeach; ?>
                                            <?php if ($i != 0) : ?>
                                                <h6 id="ttl_like_mobile<?php echo $jwb['id_jawaban'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left: 47px;"><?php echo $i; ?></h6>
                                            <?php endif; ?>

                                            <h6 id="like_mobile<?php echo $jwb['id_jawaban'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position:absolute;left:47px; display: none;"><strong id="like<?php echo $jwb['id_jawaban'] ?>"></strong></h6>

                                            <div id="like"></div>
                                            <!-- <i class="far fa-heart"></i> -->
                                            <!-- </div> -->

                                            <!-- LOVE JAWABAN -->
                                            <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script> -->
                                            <script type="text/javascript">
                                                function like() {
                                                    var id_user = document.getElementById("id_user").value;
                                                    if (id_user != '') {
                                                        var like = event.target.getAttribute('data');
                                                        var element = document.getElementById("btnjempol" + like);
                                                        element.classList.toggle("sudahjempol");
                                                        var element2 = document.getElementById("btnjempol_mobile" + like);
                                                        element2.classList.toggle("sudahjempol");
                                                        $.ajax({
                                                            url: "<?php echo base_url('LikeBookmark/love/') ?>",
                                                            type: "POST",
                                                            data: {
                                                                id_jawaban: like
                                                            },
                                                            dataType: "JSON",
                                                            success: function(data) {
                                                                //console.log(data);
                                                                if (data > [null]) {
                                                                    $('#ttl_like' + like).hide();
                                                                    $('#like' + like).show();
                                                                    $('#ttl_like_mobile' + like).hide();
                                                                    $('#like_mobile' + like).show();
                                                                    var result = data;
                                                                    i = 1;
                                                                    a = 1;
                                                                    for (jml in result) {
                                                                        document.getElementById("like" + like).innerHTML = i++;
                                                                        document.getElementById("like_mobile" + like).innerHTML = a++;
                                                                    }
                                                                } else if (data = [null]) {
                                                                    $('#ttl_like' + like).hide();
                                                                    $('#like' + like).show();
                                                                    $('#ttl_like_mobile' + like).hide();
                                                                    $('#like_mobile' + like).show();
                                                                    var result = data;
                                                                    i = 1;
                                                                    for (jml in result) {
                                                                        document.getElementById("like" + like).innerHTML = null;
                                                                        document.getElementById("like_mobile" + like).innerHTML = null;
                                                                    }
                                                                }
                                                            }
                                                        });

                                                    } else {
                                                        $('#Konfirmasi_Like_Login').modal('show');
                                                    };
                                                };

                                                function unlike() {
                                                    var id_user = document.getElementById("id_user").value;
                                                    var cok = event.target.getAttribute('data2');
                                                    if (id_user != '') {
                                                        if (cok) {
                                                            var like2 = event.target.getAttribute('data2');
                                                            var element = document.getElementById("btnunlike" + like2);
                                                            element.classList.toggle("sudahjempol");
                                                            var element2 = document.getElementById("btnunlike_mobile" + like2);
                                                            element2.classList.toggle("sudahjempol");
                                                            $.ajax({
                                                                url: "<?php echo base_url('LikeBookmark/love/') ?>",
                                                                type: "POST",
                                                                data: {
                                                                    id_jawaban: like2
                                                                },
                                                                dataType: "JSON",
                                                                success: function(data) {
                                                                    //console.log(data);
                                                                    if (data > [null]) {
                                                                        $('#ttl_like' + like2).hide();
                                                                        $('#like' + like2).show();
                                                                        $('#ttl_like_mobile' + like2).hide();
                                                                        $('#like_mobile' + like2).show();
                                                                        var result = data;
                                                                        i = 1;
                                                                        a = 1;
                                                                        for (jml in result) {
                                                                            document.getElementById("like" + like2).innerHTML = i++;
                                                                            document.getElementById("like_mobile" + like2).innerHTML = a++;
                                                                        }
                                                                    } else if (data = [null]) {
                                                                        $('#ttl_like' + like2).hide();
                                                                        $('#like' + like2).show();
                                                                        $('#ttl_like_mobile' + like2).hide();
                                                                        $('#like_mobile' + like2).show();
                                                                        var result = data;
                                                                        i = 1;
                                                                        for (jml in result) {
                                                                            document.getElementById("like" + like2).innerHTML = null;
                                                                            document.getElementById("like_mobile" + like2).innerHTML = null;
                                                                        }
                                                                    }
                                                                }
                                                            });
                                                        }

                                                    } else {
                                                        $('#Konfirmasi_Like_Login').modal('show');
                                                    };
                                                };
                                            </script>
                                            <?php if ($jwb['jawaban_benar'] == 0 && $sess == $ques['id_user']) : ?>
                                                <?php if ($ques['status_jawab'] == 0) : ?>
                                                    <a onclick="verifShow(<?php echo $jwb['id_jawaban'] ?>)">
                                                        <div class="jawab d-flex align-items-center">
                                                            <i class="fas fa-check"></i>
                                                            <h6>
                                                                Verifikasi Jawaban
                                                            </h6>
                                                        </div>
                                                    </a>
                                                <?php endif; ?>
                                            <?php elseif ($jwb['jawaban_benar'] == 1) : ?>
                                                <div class="jawab d-flex align-items-center">
                                                    <i class="fas fa-check"></i>
                                                    <h6>
                                                        Jawaban Benar
                                                    </h6>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr class="mb-0">

                                </li>
                                <script>
                                    function verifShow(id_jawaban) {
                                        $('#verifikasi_jawaban' + id_jawaban).modal('show');
                                    }
                                </script>
                                <!-- MODAL Konfirmasi Verifikasi -->
                                <div class="modal fade" id="verifikasi_jawaban<?php echo $jwb['id_jawaban'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                                        <div class="modal-content">
                                            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                                                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container text-center justify-content-center">
                                                    <h5>Apakah anda yakin ingin memverifikasi jawaban ini ! </h5>
                                                </div>
                                                <div class="container text-center mt-3">
                                                    <form action="<?php echo base_url('Pertanyaan/cek_jawab') ?>" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_jawaban" value="<?php echo $jwb['id_jawaban'] ?>">
                                                        <input type="hidden" name="id_pertanyaan" value="<?php echo $jwb['id_pertanyaan'] ?>">
                                                        <input type="hidden" name="id_user" value="<?php echo $jwb['id_user'] ?>">
                                                        <button class="btn btn-primary mr-4" type="submit">Ya</button>
                                                        <a class="btn btn-danger ml-3" onclick="close_modal(<?php echo $jwb['id_jawaban'] ?>)">Tidak</a>
                                                    </form>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                function close_modal(idj) {
                                                    $('#verifikasi_jawaban' + idj).modal('hide');
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 d-none d-lg-block">
                    <div class="pertanyaan-lain p-3 pb-2">
                        <h4 class="fw-bold m-0">
                            Pertanyaan Lainya
                        </h4>
                        <hr class="my-2 mb-3">

                        <div class="inner">
                            <ul>
                                <?php foreach ($lainya as $lain) : ?>
                                    <?php
                                    if ($lain['id_pertanyaan'] == $ques['id_pertanyaan']) {
                                        continue;
                                    }; ?>
                                    <a style="color:black;" href="<?php echo base_url('Pertanyaan/detail/' . $lain['id_pertanyaan']) ?>">

                                        <li class="mb-2">
                                            <div class="kategori-nama row align-items-center">
                                                <div class="col-1">
                                                    <span class="iconify" data-icon="ant-design:question-circle-outlined"></span>
                                                </div>
                                                <div class="col-11">
                                                    <h6 class="my-auto">
                                                        <strong><?php echo $lain['pertanyaan'] ?></strong>
                                                    </h6>
                                                </div>


                                            </div>
                                        </li>
                                    </a>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function bookmark() {
        var id_user = document.getElementById("id_user").value;

        if (id_user != '') {
            var bookmark = event.target.getAttribute('data');
            var element = document.getElementById("btnbookmark" + bookmark);
            element.classList.toggle("sudahbookmark");
            var element2 = document.getElementById("btnbookmark_mobile" + bookmark);
            element2.classList.toggle("sudahbookmark");
            $.ajax({
                url: "<?php echo base_url('LikeBookmark/bookmark/') ?>",
                type: "POST",
                data: {
                    id_pertanyaan: bookmark
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                }
            });
        } else {
            $('#Konfirmasi_Like_Login').modal('show');
        };
    };

    function unbookmark() {
        var id_user = document.getElementById("id_user").value;
        //var checkval = document.getElementById("likedtl").value;
        var asw = event.target.getAttribute('data2');
        if (id_user != '') {
            if (asw) {
                var unbookmark = event.target.getAttribute('data2');
                var element = document.getElementById("btnunbookmark" + unbookmark);
                element.classList.toggle("sudahbookmark");
                var element2 = document.getElementById("btnunbookmark_mobile" + unbookmark);
                element2.classList.toggle("sudahbookmark");
                $.ajax({
                    url: "<?php echo base_url('LikeBookmark/bookmark/') ?>",
                    type: "POST",
                    data: {
                        id_pertanyaan: unbookmark
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                    }
                });
            } else {
                var unbookmark = event.target.getAttribute('data2');
                var element = document.getElementById("btnunbookmark" + unbookmark);
                element.classList.remove("sudahbookmark");
                var element2 = document.getElementById("btnunbookmark_mobile" + unbookmark);
                element2.classList.remove("sudahbookmark");
                $.ajax({
                    url: "<?php echo base_url('LikeBookmark/bookmark/') ?>",
                    type: "POST",
                    data: {
                        id_pertanyaan: unbookmark
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                    }
                });

            }
        } else {
            $('#Konfirmasi_Like_Login').modal('show');
        };
    };

    function tampil_modal_share() {
        $('#modal_share').modal('show');
    };
</script>

<div class="modal fade" id="tambahjawaban" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?php foreach ($question as $prt) : ?>
                    <form class="d-block" action="<?php echo base_url('Pertanyaan/tambah_jawaban/' . $prt['id_pertanyaan']) ?>" method="POST" enctype="multipart/form-data">
                        <h4>Tambah Jawab</h4>
                        <textarea name="jawaban" id="addquestion" class="w-100 p-3 mb-2" style="height: 30vh;border-radius:10px; border:none;background:#e7ffec" required oninvalid="this.setCustomValidity('Pertanyaan tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>

                        <div class="d-flex align-items-center mb-2">
                            <h6 class="d-block d-sm-none p-0 m-0 me-3">File</h6>
                            <h6 class="d-sm-block d-none p-0 m-0 me-3">Lampirkan File</h6>
                            <input type="file" name="gambar_jawab" id="real-file" hidden="hidden" accept="image/png, image/gif, image/jpeg" />
                            <button type="button" id="custom-button">
                                <i class="fas fa-copy"></i>
                            </button>
                            <span id="custom-text">Belum ada file yang dipiih</span>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">


                        <!-- <input type="text" name="user" value="<?= $sess ?>"> -->
                        <button class="btn btn-primary" style="padding:5px 15px;border-radius:10px; border:none;background:#0073ff;font-size:1rem">Jawab</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- EDIT PERTANYAAN -->
<div class="modal fade" id="edittanya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <?php foreach ($question as $prt) : ?>
                    <form class="d-block" action="<?php echo base_url('Pertanyaan/edit_pertanyaan/' . $prt['id_pertanyaan']) ?>" method="POST" enctype="multipart/form-data">
                        <h4>Edit Pertanyaan</h4>
                        <textarea name="pertanyaan" id="addquestion" class="w-100 p-3 mb-2" style="height: 30vh;border-radius:10px; border:none;background:#e7ffec" required oninvalid="this.setCustomValidity('Pertanyaan tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $prt['pertanyaan'] ?></textarea>


                        <div class="d-flex align-items-center mb-3">
                            <h6 class="p-0 m-0 me-3">Kategori</h6>
                            <div class="select-wrapper w-100">
                                <select class="w-25" name="kategori" id="kategori" required oninvalid="this.setCustomValidity('kategori pertanyaan belum dipilih')" oninput="setCustomValidity('')">
                                    <option value="<?= $prt['id_kategori'] ?>"><?= $prt['nama_kategori'] ?></option>
                                    <?php foreach ($kategori as $ktg) : ?>
                                        <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">


                        <!-- <input type="text" name="user" value="<?= $sess ?>"> -->
                        <button class="btn btn-primary" style="padding:5px 15px;border-radius:10px; border:none;background:#0073ff;font-size:1rem">Tanyakan</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php foreach ($question as $prt) : ?>
    <!-- MODAL Konfirmasi Hapus pertanyaan -->
    <div class="modal fade" id="hapustanya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                    <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
                </div>
                <div class="modal-body">
                    <div class="container text-center justify-content-center">
                        <h5>Apakah anda yakin ingin Membatalkan ini !</h5>
                    </div>
                    <div class="container text-center mt-3">
                        <form action="<?php echo base_url('Pertanyaan/hapus_pertanyaan') ?>" method="POST" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id_jawaban" value="<?php echo $jwb['id_jawaban'] ?>"> -->
                            <input type="hidden" name="id_pertanyaan" value="<?php echo $prt['id_pertanyaan'] ?>">
                            <input type="hidden" name="id_user" value="<?php echo $sess ?>">
                            <button class="btn btn-primary mr-4" type="submit">Ya</button>
                            <a class="btn btn-danger ml-3" onclick="close_modal()">Tidak</a>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    function close_modal() {
                        $('#hapustanya').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>

    <!-- MODAL Report pertanyaan -->
    <div class="modal fade" id="reporttanya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                    <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
                </div>
                <div class="modal-body">
                    <div class="container text-center justify-content-center">
                        <h5>Report Pertanyaan !</h5>
                    </div>
                    <div class="container text-center mt-3">
                        <form action="<?php echo base_url('Pertanyaan/report_pertanyaan') ?>" method="POST" enctype="multipart/form-data">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="p-0 m-0 me-3">Report</h6>
                                <div class="select-wrapper w-100">
                                    <select class="form-control" name="pesan" id="kategori" required oninvalid="this.setCustomValidity('kategori pertanyaan belum dipilih')" oninput="setCustomValidity('')">
                                        <option value="Pertanyaan Tidak Pantas">Pertanyaan Tidak Pantas</option>
                                        <option value="Jawaban Perlu di Verifikasi">Jawaban Perlu di Verifikasi</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id_pertanyaan" value="<?php echo $prt['id_pertanyaan'] ?>">
                            <input type="hidden" name="id_user" value="<?php echo $sess ?>">
                            <button class="btn btn-primary mr-4" type="submit">Kirim</button>
                            <a class="btn btn-danger ml-3" onclick="close_modal()">Batal</a>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    function close_modal() {
                        $('#reporttanya').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
<?php endforeach; ?>