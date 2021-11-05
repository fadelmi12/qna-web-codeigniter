<div class="list-pertanyaan">
    <ul class="px-1 px-lg-2">

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
                <div class="d-flex">
                    <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $qty['id_user']; ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                    </div>
                    <div class="d-block w-100">
                        <div class="d-flex justify-content-between ">
                            <div class="user mb-2">
                                <div class="nama">
                                    <h5>
                                        <?= $qty['nama_user'] ?> </h5>
                                </div>
                                <div class="upload mt-1">
                                    <h6>
                                        <span class="d-none d-sm-inline-block"><?= $qty['nama_kategori'] ?> ,</span> <a href=""><?= $time ?> yang lalu</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="harga">
                                <h6>
                                    <span style="margin-right:.3rem;"></span><?php echo number_format($qty['harga'], '0', ',', '.') ?> Coin
                                </h6>
                            </div>
                        </div>
                        <div class="pertanyaan">
                            <h6>
                                <?= $qty['pertanyaan'] ?>
                            </h6>
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
                                            <button onclick="unlike()" id="btnunlike<?php echo $qty['id_pertanyaan'] ?>" data2="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up sudahjempol p-0 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
                                        </form>
                                    </div>
                            <?php }
                            endforeach; ?>

                            <?php if ($i != 0) : ?>
                                <h6 id="ttl_like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position: absolute; left:45px"><?php echo $i; ?></h6>
                            <?php endif; ?>

                            <h6 id="like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position: absolute; left:45px; display: none;"><strong id="like<?php echo $qty['id_pertanyaan'] ?>"></strong></h6>

                            <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
                                function like() {
                                    var id_user = document.getElementById("id_user").value;
                                    if (id_user != '') {
                                        var like = event.target.getAttribute('data');
                                        var element = document.getElementById("btnjempol" + like);
                                        element.classList.toggle("sudahjempol");
                                        $.ajax({
                                            url: "<?php echo base_url('LikeBookmark/like/') ?>",
                                            type: "POST",
                                            data: {
                                                id_pertanyaan: like
                                            },
                                            dataType: "JSON",
                                            success: function(data) {
                                                console.log(data);
                                                if (data > [null]) {
                                                    $('#ttl_like' + like).hide();
                                                    $('#like' + like).show();
                                                    var result = data;
                                                    i = 1;
                                                    for (jml in result) {
                                                        document.getElementById("like" + like).innerHTML = i++;
                                                    }
                                                } else if (data = [null]) {
                                                    $('#ttl_like' + like).hide();
                                                    $('#like' + like).show();
                                                    var result = data;
                                                    i = 1;
                                                    for (jml in result) {
                                                        document.getElementById("like" + like).innerHTML = null;
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
                                            $.ajax({
                                                url: "<?php echo base_url('LikeBookmark/like/') ?>",
                                                type: "POST",
                                                data: {
                                                    id_pertanyaan: like2
                                                },
                                                dataType: "JSON",
                                                success: function(data) {
                                                    console.log(data);
                                                    if (data > [null]) {
                                                        $('#ttl_like' + like2).hide();
                                                        $('#like' + like2).show();
                                                        var result = data;
                                                        i = 1;
                                                        for (jml in result) {
                                                            document.getElementById("like" + like2).innerHTML = i++;
                                                        }
                                                    } else if (data = [null]) {
                                                        $('#ttl_like' + like2).hide();
                                                        $('#like' + like2).show();
                                                        var result = data;
                                                        i = 1;
                                                        for (jml in result) {
                                                            document.getElementById("like" + like2).innerHTML = null;
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
            </li>

        <?php endforeach; ?>
    </ul>
</div>