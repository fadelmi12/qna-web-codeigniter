<?php $sess = $this->session->userdata('id_user') ?>
<div id="question" class="question mb-5">
    <div class="py-4">
        <div class="container route">
            Home / Pertanyaan / <?php echo $title; ?>
        </div>
    </div>

    <div class="list-pertanyaan-index mt-3">
        <div class="container">

            <div class="row justify-content-center px-md-5">
                <div class="col-md-8">

                    <h3 class="mb-3 text-center text-sm-start">
                        Kata Kunci : <?php echo $katakunci; ?>
                    </h3>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <span id="show"></span>
                    <div class="btn-lainnya px-3 py-2 mx-auto mx-lg-0">
                        <div class="fw-bold">
                            Pertanyaan Lainnya
                        </div>

                    </div>
                </div>
                <div class="col-md-4  d-none d-sm-block">
                    <h3 class="mb-3 ">
                        Kategori
                    </h3>
                    <div class="kategori-list py-3">
                        <ul>
                            <?php foreach ($kategori as $ktg) : ?>
                                <a style="color:black;" href="<?php echo base_url('pertanyaan/kategori/' . $ktg['nama_kategori']) ?>">

                                    <li>
                                        <div class="kategori-nama d-flex px-4">

                                            <i class="iconify" data-icon="<?= $ktg['logo_abu'] ?>"></i>
                                            <h5 class="my-auto">
                                                <?= $ktg['nama_kategori'] ?>
                                            </h5>

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

<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
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
                url: "<?php echo base_url('LikeBookmark/like/') ?>",
                type: "POST",
                data: {
                    id_pertanyaan: like
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
                        a = 1;
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
                var element3 = document.getElementById("btnunlike_mobile" + like2);
                element3.classList.toggle("sudahjempol");
                $.ajax({
                    url: "<?php echo base_url('LikeBookmark/like/') ?>",
                    type: "POST",
                    data: {
                        id_pertanyaan: like2
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
<script>
    var total_record = 1;
    var total_groups = <?php echo $total_data; ?>;
    var segment_1 = <?php echo $title ?>;

    // console.log(total_groups);
    $(document).ready(function() {
        console.log(total_record);
        $('#show').load("<?php echo site_url('Pertanyaan/load_data_search/') ?>", {
                'nama': segment_1
            }, {
                'offset': total_record
            },

            function() {
                total_record++;
            });
        $(window).scroll(function() {

            if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                if (total_record <= total_groups) {
                    $.post('<?php echo site_url('Pertanyaan/load_data_search/') ?>', {
                            'nama': segment_1,
                            'offset': total_record
                        },
                        function(data) {
                            if (data != "") {
                                $("#show").append(data);
                                total_record++;
                                console.log(total_record);

                            }


                        });
                }
            }
        });
    });

    // function load_more() {
    //     console.log(total_record);
    //     if (total_record <= total_groups) {

    //         // console.log(segment_1);
    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo site_url('Pertanyaan/load_data/') ?>",
    //             data: {
    //                 'nama': segment_1,
    //                 'offset': total_record
    //             },
    //             dataType: "text",
    //             success: function(resultData) {
    //                 $("#results").append(resultData);
    //                 total_record++;
    //             }
    //         });

    //     }
    // }
</script>