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
                    Daftar Artikel
                </h3>
                <hr class="m-0">
                <div class="profile-list mt-3">
                    <ul style="list-style: none;" class="m-0 p-0">
                        <?php foreach ($artikel as $art) : ?>
                            <li class="mb-3">
                                <div class="artikel-order p-3">
                                    <a href="<?php echo base_url(); ?>artikel/detail/<?= $art['slug'] ?>" class="text-black">
                                        <h5>
                                            <?php echo $art['judul_artikel'] ?>
                                        </h5>
                                    </a>
                                    <div class="d-flex mb-2">
                                        <div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/103?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                                        </div>
                                        <div class="author">
                                            <?php echo $art['nama_user'] ?>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <div class="d-flex mb-1">
                                                <?php
                                                $article_tag = $this->Model_dashboard->get_tag_article($art['id_artikel'])->result_array();
                                                $i = 0;
                                                if ($article_tag != null) : ?>
                                                    <i class="fa fa-tag my-auto"></i>
                                                <?php endif; ?>
                                                <div class="tag">
                                                    <?php foreach ($article_tag as $arg) :
                                                        if ($i == 0) :
                                                            echo $arg['namaTag'];
                                                        else :
                                                            echo ", " . $arg['namaTag'];
                                                        endif;
                                                        $i++;
                                                    endforeach;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <i class="fas fa-file-pdf my-auto"></i>
                                                <div class="tag">
                                                    <?php echo $art['jumlah_halaman'] ?> Halaman, <?php echo $art['tahun_rilis'] ?>
                                                </div>
                                            </div>
                                        </div>
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