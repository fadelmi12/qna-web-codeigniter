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
                <h6 class="fw-normal my-2">
                    <?= $arti['deskripsi_artikel'] ?>
                </h6>
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