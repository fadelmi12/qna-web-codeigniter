<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<div class="detail-artikel pb-5" id="detail-artikel">
    <div class="py-4">
        <div class="container route">
            Home / Jurnal / <?= $article->judul_artikel; ?>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="art-detail bg-white">
                    <div class="artikel-box" style="overflow:hidden">
                        <div class="p-3 pb-0">
                            <h3>
                                <?= $article->judul_artikel; ?>
                            </h3>
                            <hr class="mt-0">
                            <div class="d-flex mb-2 align-items-center">
                                <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $article->id_user ?>?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                </div>
                                <div class="fw-bold">
                                    <strong>
                                        <h6 class="m-0 fw-bold"><?php echo ($article->nama_user) ?></h6>
                                    </strong>

                                    <strong>
                                        <h6 class="m-0 fw-bold">Author : <?php echo  strtoupper($article->author) ?> </h6>
                                    </strong>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mb-1">
                                <div class="d-block">
                                    <div class="d-flex mb-1 nb">
                                        <?php
                                        $i = 0;
                                        foreach ($tag_artikel as $tga) :
                                            if ($article->id_artikel == $tga->id_artikel) {
                                                $i++;
                                            }
                                        endforeach; ?>
                                        <?php if ($i !== 0) : ?>
                                            <i class="fa fa-tag my-auto me-2"></i>
                                        <?php endif; ?>
                                        <div class="tag">
                                            <?php foreach ($tag_artikel as $tga) :
                                                if ($article->id_artikel == $tga->id_artikel) {
                                                    echo $tga->namaTag;
                                                    if ($i > 1) {
                                                        echo " , ";
                                                        $i--;
                                                    }
                                                }
                                            endforeach; ?>

                                        </div>
                                    </div>
                                    <div class="d-flex nb mb-1">
                                        <i class="fas fa-file-pdf my-auto me-2"></i>
                                        <div class="tag my-auto">
                                            <?php echo $article->jumlah_halaman . ' ' . 'Halaman' . ', ' . $article->tahun_rilis ?>
                                        </div>
                                    </div>
                                    <div class="d-flex nb mb-1">
                                        <i class="fas fa-dollar-sign my-auto me-2"></i>
                                        <div class="tag my-auto">
                                            <?php echo "Coin" . " " .  $article->harga_artikel ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="my-2">
                                <?php echo $article->deskripsi_artikel ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex  align-items-start">
                                    <div class="d-flex preview align-items-center me-2 me-lg-3 px-3 py-2 pb-3">
                                        <span class="iconify me-2" data-icon="fa-regular:eye"></span>
                                        <h6 class="m-0 d-none d-sm-block me-1">
                                            Preview
                                        </h6><span>
                                            <h6 class="m-0">
                                                PDF
                                            </h6>
                                        </span>

                                    </div>
                                    <?php
                                    $jum = 0;
                                    foreach ($pembelian as $beli) {
                                        if ($this->session->userdata('id_user') == $beli->id_user && $article->id_artikel == $beli->id_artikel) {

                                            $jum++;
                                        }
                                    } ?>
                                    <?php if ($jum == 0) : ?>
                                        <a onclick="check_download()">
                                            <div class="download-button d-flex align-items-center px-3 py-2">
                                                <span class="iconify me-2 text-black" data-icon="bi:cart-check"></span>
                                                <h6 class="m-0 text-black">
                                                    Beli
                                                </h6>
                                            </div>
                                        </a>
                                    <?php else : ?>

                                        <a href="<?= base_url("Artikel/download/" . $article->file_pdf . "/" . $article->slug) ?>">
                                            <div class="download-button d-flex align-items-center px-3 py-2">
                                                <span class="iconify me-2 text-black" data-icon="bx:bxs-download"></span>
                                                <h6 class="m-0 text-black">
                                                    Download
                                                </h6>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <form id="input" enctype="multipart/form-data">

                                    <input type="hidden" id="slug" name="text" value="<?php echo $article->slug ?>">
                                    <input type="hidden" id="pdf_file" name="text" value="<?php echo $article->file_pdf ?>">
                                    <input type="hidden" id="harga" name="text" value="<?php echo $article->harga_artikel ?>">
                                    <input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
                                    <?php if ($this->session->userdata('id_user') != null) : ?>
                                        <input type="hidden" id="dompet" name="text" value="<?php echo $user_wallet ?>">
                                    <?php endif; ?>
                                </form>
                                <script type="text/javascript">
                                    function check_download() {
                                        var slug = document.getElementById("slug").value;
                                        var url = document.getElementById("pdf_file").value;
                                        console.log(url);
                                        var id_user = document.getElementById("id_user").value;
                                        if (id_user !== '') {
                                            var dompet = parseInt(document.getElementById("dompet").value);
                                            var price = parseInt(document.getElementById("harga").value);
                                            if (dompet <= price) {
                                                // swal('Forbiden', 'Saldo anda kurang', 'error');
                                                $('#peringatan').modal('show');
                                                // document.forms["my_form"]["tes"].focus();
                                            } else {
                                                $('#beli').modal('show');
                                            }
                                        } else {
                                            $('#Konfirmasi_Like_Login').modal('show');
                                        };
                                    };
                                </script>
                                <!-- <div class="options p-2">
                                    <h6 class="m-0 p-0">
                                        <span class="iconify m-0 p-0" data-icon="mi:options-vertical"></span>
                                    </h6>
                                </div> -->
                                <style type="text/css">
                                    .belumsave {
                                        color: black;
                                    }

                                    .sudahsave {
                                        color: darkblue;
                                    }
                                </style>
                                <div class="download-button d-flex align-items-center px-2 py-1">
                                    <div class="dropdown">
                                        <button role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;padding:0;background:transparent">
                                            <span class="iconify p-0 m-0" data-icon="cil:options"></span>
                                        </button>
                                        <!--<a style="cursor: pointer;" class="dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"><strong>Menu</strong></a>-->
                                        <ul class="dropdown-menu">
                                            <input hidden id="id_user" type="text" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                                            <!-- <?php foreach ($article as $art) ?> -->
                                            <?php foreach ($artikel_save as $artikel) ?>
                                            <?php if (empty($artikel_save)) : ?>
                                                <li>
                                                    <button class="dropdown-item fw-bold d-flex" id="btnsave<?php echo $article->id_artikel ?>" onclick="save()" data1="<?php echo $article->id_artikel ?>" type="button" style="font-family:inherit">
                                                        <span class="iconify my-auto me-2" data-icon="fluent:save-24-filled"></span>
                                                        Simpan Artikel
                                                    </button>
                                                </li>
                                            <?php elseif ($artikel['status_save'] == '0') : ?>
                                                <li>
                                                    <button class="dropdown-item fw-bold d-flex" id="btnsave<?php echo $article->id_artikel ?>" onclick="save()" data1="<?php echo $article->id_artikel ?>" type="button" style="font-family:inherit">
                                                        <span class="iconify my-auto me-2" data-icon="fluent:save-24-filled"></span>
                                                        Simpan Artikel
                                                    </button>
                                                </li>
                                            <?php elseif ($artikel['status_save'] == '1') : ?>
                                                <li>
                                                    <button class="dropdown-item fw-bold sudahsave d-flex" id="btnunsave<?php echo $article->id_artikel ?>" onclick="unsave()" data2="<?php echo $article->id_artikel ?>" type="button" style="font-family:inherit">
                                                        <span class="iconify my-auto me-2" data-icon="fluent:save-24-filled"></span>
                                                        Simpan Artikel
                                                    </button>
                                                </li>
                                            <?php endif; ?>
                                            <li><button class="dropdown-item fas fw-bold" onclick="share_artikel()" style="font-family:inherit">
                                                    <span class="iconify my-auto me-2" data-icon="fa-solid:share-alt"></span>
                                                    Share Artikel
                                                </button></li>
                                            <li><button class="dropdown-item fas fw-bold" onclick="report_artikel()" style="font-family:inherit">
                                                    <span class="iconify my-auto me-2" data-icon="codicon:report"></span>
                                                    report Artikel
                                                </button></li>
                                            <?php if ($this->session->userdata('id_user') != null) {
                                                $idses = json_encode($this->session->userdata('id_user'));
                                            } ?>
                                            <script>
                                                function report_artikel() {
                                                    var id = <?= $idses ?>;

                                                    if (id != null) {
                                                        $('#reportartikel').modal('show');
                                                    } else {
                                                        $('#Konfirmasi_Like_Login').modal('show');
                                                    }

                                                }
                                            </script>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="holder" data-file="<?= base_url() ?>assets/pdf/<?= $article->file_pdf; ?>" class="text-center pt-3" style="background-color: #f3f4fa;border: solid 1px #cecece;overflow-x:scroll"></div> -->
                        <div class="w-100" style="background-color: #f3f4fa;border: solid 2px #cecece">
                            <div id="adobe-dc-view" style="width: 100%;" data-file="<?= base_url() ?>assets/pdf/<?= $article->file_pdf; ?>" data-meta="<?= $article->file_pdf; ?>"></div>
                        </div>

                    </div>
                    <!-- <div id="holder" data-file="<?= base_url() ?>assets/pdf/<?= $article->file_pdf; ?>" class="text-center pt-3" style="background-color: #f3f4fa;border: solid 1px #cecece;overflow-x:scroll"></div> -->
                    <div class="w-100" style="background-color: #f3f4fa;border: solid 2px #cecece">
                        <div id="adobe-dc-view" style="width: 100%;" data-file="<?= base_url() ?>assets/pdf/<?= $article->file_pdf; ?>" data-meta="<?= $article->file_pdf; ?>"></div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="author bg-white p-3">
                    <h3 class="fw-bold">
                        Author
                    </h3>

                    <hr class="m-0 p-0 mb-3">
                    <div class="d-flex mb-3 align-items-center ">
                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo rand(1, 50); ?>?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                        </div>
                        <div>
                            <h6 class="m-0 p-0 fw-bold">
                                <?php echo  strtoupper($article->author) ?>
                            </h6>
                            <!-- <h6 class="m-0 p-0">
                                Web Developer
                            </h6> -->
                        </div>
                    </div>
                    <h6 class="fw-bold">
                        ARTIKEL LAIN DARI <?php echo strtoupper($article->author) ?>
                    </h6>
                    <hr class="m-0 p-0 mb-2">
                    <ul class="m-0 p-0">
                        <?php foreach ($article_all as $all) : ?>
                            <?php if ($article->author == $all->author) : ?>

                                <li class="p-1 px-2 row">
                                    <div class="col-1">
                                        <i class="iconify" data-icon="dashicons:book-alt"></i>
                                    </div>
                                    <div class="col-11">
                                        <a style="color:black;" href="<?php echo base_url('Artikel/detail/' . $all->slug) ?>">
                                            <h6 class="judul fw-bold mb-0">
                                                <?php echo $all->judul_artikel ?>
                                            </h6>
                                        </a>
                                        <h6 class="desc mb-0">
                                            <?php echo $all->deskripsi_artikel ?>
                                        </h6>
                                        <hr class="mt-1 mb-0">
                                    </div>

                                </li>

                            <?php endif; ?>
                        <?php endforeach; ?>


                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    var text = $('.text-overflow'),
        btn = $('.btn-overflow'),
        h = text[0].scrollHeight;

    if (h > 50) {
        btn.addClass('less');
        btn.css('display', 'block');
    }

    btn.click(function(e) {
        e.stopPropagation();

        if (btn.hasClass('less')) {
            btn.removeClass('less');
            btn.addClass('more');
            btn.text('Show less');

            text.animate({
                'height': h
            });
        } else {
            btn.addClass('less');
            btn.removeClass('more');
            btn.text('Show more');
            text.animate({
                'height': '50px'
            });
        }
    });
</script>

<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function() {
        var adobeDCView = new AdobeDC.View({
            clientId: "e66f04ef460b4e18a90b5b30b8b26adb",
            divId: "adobe-dc-view"
        });
        const url = $('#adobe-dc-view').data("file");
        const meta = $('#adobe-dc-view').data("meta");
        adobeDCView.previewFile({
            content: {
                location: {
                    url: url
                }
            },
            metaData: {
                fileName: meta
            }
        }, {
            embedMode: "IN_LINE",
            showDownloadPDF: false,
            showPrintPDF: false
        });
    });
</script>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function save() {
        var id_user = document.getElementById("id_user").value;

        if (id_user != '') {
            var save = event.target.getAttribute('data1');
            var element = document.getElementById("btnsave" + save);
            element.classList.toggle("sudahsave");
            $.ajax({
                url: "<?php echo base_url('Artikel/save/') ?>",
                type: "POST",
                data: {
                    id_artikel: save
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

    function unsave() {
        var id_user = document.getElementById("id_user").value;
        var cok = event.target.getAttribute('data2');
        if (id_user != '') {
            if (cok) {
                var unsave = event.target.getAttribute('data2');
                var element = document.getElementById("btnunsave" + unsave);
                element.classList.toggle("sudahsave");
                $.ajax({
                    url: "<?php echo base_url('Artikel/save/') ?>",
                    type: "POST",
                    data: {
                        id_artikel: unsave
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                    }
                });
            } else {
                var unsave = event.target.getAttribute('data2');
                var element = document.getElementById("btnunsave" + unsave);
                element.classList.remove("sudahsave");
                $.ajax({
                    url: "<?php echo base_url('Artikel/save/') ?>",
                    type: "POST",
                    data: {
                        id_artikel: unsave
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

    function share_artikel() {
        $('#modal_share_artikel').modal('show');
    }
</script>

<!-- MODAL Share -->
<div class="modal fade" id="modal_share_artikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Bagikan</strong></h2>
            </div>
            <div class="modal-body">
                <div class="text-center row ">

                    <!-- Untuk Email -->
                    <div class="col-3">
                        <a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 http://localhost/siswarajin/">
                            <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/mail.png">
                            <h6 class="text-black"><strong>Email</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk FB -->
                    <div class="col-3">
                        <a href="http://www.facebook.com/sharer.php?u=http://localhost<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
                            <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/facebook.png" alt="Facebook" />
                            <h6 class="text-black"><strong>Facebook</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk WA -->
                    <div class="col-3">
                        <a href="https://web.whatsapp.com/send/?phone&text=http://localhost<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
                            <img style="width: 59%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/whatsapp.png" alt="Google" />
                            <h6 class="text-black"><strong>Whatsapp</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk Twitter -->
                    <div class="col-3">
                        <a href="https://twitter.com/intent/tweet?url=http://localhost<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
                            <img style="width: 61%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/twitter.png" alt="Twitter" />
                            <h6 class="text-black"><strong>Twitter</strong></h6>
                        </a>
                    </div>

                    <div class="container text-center mt-3">
                        <input class="form-control text-center justify-content-center" type="text" value="http://localhost<?php echo ($_SERVER["REQUEST_URI"]) ?>">
                    </div>

                    <div class="container text-center mt-3">
                        <button class="btn btn-danger ml-3" onclick="close_modal_share_artikel()">Close</button>
                    </div>
                </div>
                <script type="text/javascript">
                    function close_modal_share_artikel() {
                        $('#modal_share_artikel').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="beli" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
            </div>
            <div class="modal-body">
                <div class="container text-center justify-content-center">
                    <h5>Apakah anda yakin ingin Memebeli Artikel ini dengan harga <?php echo $article->harga_artikel ?> Coin !</h5>
                </div>
                <div class="container text-center mt-3">

                    <form action="<?php echo base_url('Artikel/beli_artikel') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="slug" value="<?php echo $article->slug ?>">
                        <input type="hidden" name="url" value="<?php echo $article->file_pdf ?>">
                        <input type="hidden" name="id_artikel" value="<?php echo $article->id_artikel ?>">
                        <button class="btn btn-primary mr-4" type="submit">Ya</button>
                        <a class="btn btn-danger ml-3" onclick="close_modal()">Tidak</a>
                    </form>

                </div>
            </div>
            <script type="text/javascript">
                function close_modal() {
                    $('#beli').modal('hide');
                }
            </script>
            <script type="text/javascript">
                function close_reportArtikel() {

                    $('#reportartikel').modal('hide');
                }
            </script>
        </div>
    </div>
</div>
<div class="modal fade" id="reportartikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
            </div>
            <div class="modal-body">
                <div class="container text-center justify-content-center">
                    <h5>Report Artikel !</h5>
                </div>
                <div class="container text-center mt-3">
                    <form action="<?php echo base_url('Artikel/report_artikel') ?>" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="p-0 m-0 me-3">Report</h6>
                            <div class="select-wrapper w-100">
                                <select class="form-control" name="pesan" id="kategori" required oninvalid="this.setCustomValidity('Jenis Report Belum Dipilih')" oninput="setCustomValidity('')">
                                    <option value="Artikel Tidak Pantas">Artikel Tidak Pantas</option>
                                    <!-- <option value="Jawaban Perlu di Verifikasi">Jawaban Perlu di Verifikasi</option> -->
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="slug" value="<?= $article->slug ?>">
                        <input type="hidden" name="id_artikel" value="<?= $article->id_artikel ?>">
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                        <button class="btn btn-primary mr-4" type="submit">Kirim</button>
                        <a class="btn btn-danger ml-3" onclick="close_reportArtikel()">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="peringatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
            </div>
            <div class="modal-body">
                <div class="container text-center justify-content-center">
                    <h5>Saldo anda kurang silakan Topup dulu !</h5>
                </div>
                <div class="container text-center mt-3">

                    <a class="btn btn-danger ml-3" onclick="close_report()">ok</a>

                </div>
            </div>
            <script type="text/javascript">
                function close_report() {
                    $('#peringatan').modal('hide');
                }
            </script>
        </div>
    </div>
</div>