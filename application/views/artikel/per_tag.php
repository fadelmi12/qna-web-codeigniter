<div class="artikel pb-5" id="artikel">
    <div class="py-4">
    <div class="container route">
        Home / Jurnal / <?= $namaTag ?>
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
                                            <a class="d-flex justify-content-between " href='#settings'>
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
                                                            <a href='<?= base_url('Artikel/tag/' . $tg['namaTag']) ?>'>
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
                        <div id="pertag_place">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script>
        var tag = <?php echo $idTag ?>;
        var total_record = 0;
        var total_groups = <?php echo $total_data; ?>;
        console.log(tag);
        $(document).ready(function() {
            $('.sub-menu ul').hide();
            $(".sub-menu a").click(function() {
                $(this).parent(".sub-menu").children("ul").slideToggle("100");
                $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
            });
            $('#pertag_place').load("<?php echo site_url('Artikel/load_pertag/') ?>", {
                    'offset': total_record,
                    'tag': tag
                },

                function() {
                    total_record++;
                });
            $(window).scroll(function() {

                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    if (total_record <= total_groups) {
                        $.post('<?php echo site_url('Artikel/load_pertag/') ?>', {
                                'offset': total_record,
                                'tag': tag
                            },
                            function(data) {
                                if (data != "") {
                                    $("#pertag_place").append(data);
                                    total_record++;
                                    console.log(total_record);

                                }


                            });
                    }
                }
            });

        });
    </script>

</div>