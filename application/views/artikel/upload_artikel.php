<div class="upload-artikel mb-5">
    <div class="py-4">

    </div>
    <div class="container">
        <h3 class="text-center fw-bold">
            Upload Artikel
        </h3>
        <hr class="m-0 w-25 mx-auto">
        <div class="mt-3">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form action="<?php echo base_url('Artikel/save_artikel') ?>" method="POST" enctype="multipart/form-data">
                        <div class="text-start p-3 py-4 p-lg-4 auth-box" style="border:solid 1px #cecece">
                            <div class="group mb-3">
                                <h5>
                                    Judul Artikel
                                </h5>
                                <input type="text" name="judul" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Nama Lengkap masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Judul Artikel" />
                            </div>

                            <div class="group mb-3">
                                <h5>
                                    Deskripsi Artikel
                                </h5>
                                <input type="text" name="deskripsi" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Username masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Deskripsi" />
                                <span class="text-danger"><?= form_error('username') ?></span>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    Jumlah Halaman
                                </h5>
                                <input type="number" name="jumlah_hal" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Email belum sesuai')" oninput="setCustomValidity('')" placeholder="Masukkan Jumlah Halaman" />
                                <span class="text-danger"><?= form_error('email') ?></span>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    Tahun Rilis
                                </h5>
                                <input type="number" name="year" id="" onfocus="(this.type='number')" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('No Handphone masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Tahun Rilis" />
                                <span class="text-danger"><?= form_error('no_hp') ?></span>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    Penulis
                                </h5>
                                <input type="text" name="penulis" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Tanggal lahir belum diisi nih!')" oninput="setCustomValidity('')" placeholder="Masukkan Tahun Rilis" />
                                <span class="text-danger"><?= form_error('tgl_lahir') ?></span>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    Tag
                                </h5>
                                <select id="multiple" class="w-100 js-select2-multi" name="tag[]" multiple="multiple">
                                    <?php foreach ($tag as $tg) : ?>
                                        <option value="<?= $tg['idTag'] ?>"><?= $tg['namaTag'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    File
                                </h5>
                                <input type="file" name="upload_file" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Tanggal lahir belum diisi nih!')" oninput="setCustomValidity('')" />
                                <span class="text-danger"><?= form_error('tgl_lahir') ?></span>
                            </div>
                            <div class="group mb-3">
                                <h5>
                                    Harga
                                </h5>
                                <input type="number" name="harga" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Tanggal lahir belum diisi nih!')" oninput="setCustomValidity('')" />
                                <span class="text-danger"><?= form_error('tgl_lahir') ?></span>
                            </div>
                            <div class="w-100 text-center">
                                <button class="btn btn-primary mt-2 fw-bold">
                                    Upload Artikel 
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>