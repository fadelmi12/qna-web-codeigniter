<div class="artikel pb-5" id="artikel">
    <div class="py-4">
        <div class="container route">
            Home / Jurnal / Semua Kategori
        </div>

    </div>

    <div class="artikel-list mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-none d-md-block">
                    <div class="p-3 p-md-4 bg-white" style="border-left: solid 2px #cecece;border-right: solid 2px #cecece;">
                        <h3 class="mb-3">
                            Tag
                        </h3>
                        <div class="tag-box py-3">
                            <div class='nav'>
                                <ul>
                                    <?php foreach ($kategori_tag as $ktg) : ?>
                                        <li class='sub-menu w-100 px-3 py-2'>
                                            <a class="d-flex justify-content-between ">
                                                <div class="d-flex align-items-center">
                                                    <i class="iconify me-2" data-icon="<?= $ktg['svg'] ?>"></i>
                                                    <h5 class="mb-0 ktg"><?= $ktg['nama_kategori'] ?></h5>
                                                </div>
                                                <div class='fa fa-caret-down right my-auto'></div>
                                            </a>
                                            <ul>
                                                <?php foreach ($tag as $tg) :
                                                    if ($ktg['id_kategori_tag'] == $tg['id_kategori_tag']) : ?>
                                                        <li class="py-1">
                                                            <a href='<?= base_url('Artikel/tag/'.$tg['namaTag']) ?>'>
                                                                <div class="d-flex">
                                                                    <div class="d-flex align-items-center"><i class="iconify me-2" data-icon="eos-icons:science-outlined" style="opacity:0;"></i></div>
                                                                    <div class="d-flex justify-content-between w-100 pe-3">
                                                                        <?= $tg['namaTag'] ?>
                                                                        <?php $jumlah = 0;
                                                                        foreach ($tag_artikel as $tga) {
                                                                            if ($tg['idTag'] == $tga['idTag']) $jumlah++;
                                                                        } ?>
                                                                        <div class="tag-count"><?= $jumlah ?></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="bg-white p-3 p-md-4" style="border-left: solid 2px #cecece;border-right: solid 2px #cecece;">


                        <h3 class="mb-3">
                            Jurnal dan Modul Ajar
                        </h3>
                        <ul style="list-style: none;" class="m-0 p-0">
                            <?php foreach ($article as $arti) : ?>
                                <li class="mb-3">
                                    <div class="artikel-order p-3">
                                        <a href="<?php echo base_url(); ?>artikel/detail/<?= $arti['slug'] ?>" class="text-black">
                                            <h5>
                                                <?= $arti['judul_artikel'] ?>
                                            </h5>
                                        </a>

                                        <div class="d-flex mb-2">
                                            <div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/103?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                            </div>
                                            <div class="author">
                                                <?= $arti['nama_user'] ?>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="d-block">
                                                <div class="d-flex mb-1">
                                                    <?php
                                                    $i = 0;
                                                    foreach ($tag_artikel as $tga) :
                                                        if ($arti['id_artikel'] == $tga['id_artikel']) {
                                                            $i++;
                                                        }
                                                    endforeach; ?>
                                                    <?php if ($i !== 0) : ?>
                                                        <i class="fa fa-tag my-auto"></i>
                                                    <?php endif; ?>
                                                    <div class="tag">
                                                        <?php foreach ($tag_artikel as $tga) :
                                                            if ($arti['id_artikel'] == $tga['id_artikel']) {
                                                                echo $tga['namaTag'];
                                                                if ($i > 1) {
                                                                    echo " , ";
                                                                    $i--;
                                                                }
                                                            }
                                                        endforeach; ?>

                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <i class="fas fa-file-pdf my-auto"></i>
                                                    <div class="tag">
                                                        <?= $arti['jumlah_halaman'] . " Halaman, " . $arti['tahun_rilis'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- khusus desktop -->
                                            <a href="<?php echo base_url('Artikel/detail/' . $arti['slug']) ?>">
                                                <div class="d-sm-flex btn-download align-items-center d-none">
                                                    <i class="fas fa-eye mr-4 text-black"></i>
                                                    <h6 class="m-0 text-black">
                                                        Lihat Artikel
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.sub-menu ul').hide();
            $(".sub-menu a").click(function() {
                $(this).parent(".sub-menu").children("ul").slideToggle("100");
                $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
            });
        });
    </script>

</div>