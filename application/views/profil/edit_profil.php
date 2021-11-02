<div class="profile mb-5 " id="#profile">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center profile-atas">
                    <?php if ($datadiri->foto_user == null) : ?>
                        <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo $datadiri->id_user ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                    <?php else : ?>
                        <div class="image-artikel" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $datadiri->foto_user ?>)"></div>
                    <?php endif; ?>
                    <div class="d-block">
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
            <div class="col-lg-7">
                <h3 class="fw-bold">
                    Edit Profile
                </h3>
                <hr class="m-0">
                <div class="edit-profile">
                    <div class="row flex-column-reverse flex-md-row justify-content-center">
                        <div class="col-md-7">
                            <form action="<?= base_url() ?>Profile/save_editprofile" method="POST">
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Nama Lengkap
                                    </h6>
                                    <input required type="text" name="nama_lengkap" value="<?php echo $datadiri->nama_lengkap ?>" class="w-100 px-3 py-1">
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Username
                                    </h6>
                                    <input required type="text" name="username" value="<?php echo $datadiri->nama_user ?>" class="w-100 px-3 py-1">
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Email
                                    </h6>
                                    <input required type="email" name="email" value="<?php echo $datadiri->email ?>" class="w-100 px-3 py-1">
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        No Whatsapp
                                    </h6>
                                    <input required type="number" name="no_hp" value="<?php echo $datadiri->no_hp ?>" class="w-100 px-3 py-1">
                                </div>

                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Tanggal Lahir
                                    </h6>
                                    <input required type="text" name="tgl_lahir" onfocus="(this.type='date')" value="<?php echo $datadiri->tgl_lahir ?>" placeholder="masukkan tanggal lahir" class="w-100 px-3 py-1">
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Provinsi
                                    </h6>
                                    <select class="form-control" required name="provinsi" id="provinsi">
                                        <option value="" disabled selected hidden>pilih provinsi</option>
                                        <?php foreach ($provinsi as $prov) : ?>
                                            <option value="<?php echo $prov['id'] ?>" <?php if ($datadiri->provinsi == $prov['id']) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $prov['nama_provinsi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Kota
                                    </h6>
                                    <select class="form-control" required name="kota" id="kota">
                                        <option value="" disabled selected hidden>pilih kota</option>
                                        <?php foreach ($kota as $kot) : ?>
                                            <option value="<?php echo $kot['id'] ?>" <?php if ($datadiri->kota == $kot['id']) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $kot['nama_kota'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Alamat
                                    </h6>
                                    <textarea required class="form-control" name="alamat" id="" cols="30" rows="2"><?php echo $datadiri->alamat ?></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Jenis Kelamin
                                    </h6>
                                    <select class="form-control" required name="jenis_kelamin" id="">
                                        <option value="" disabled selected hidden>pilih jenis kelamin</option>
                                        <option value="laki" <?php if ($datadiri->gender == "laki") {
                                                                    echo "selected";
                                                                } ?>>Laki-laki</option>
                                        <option value="perempuan" <?php if ($datadiri->gender == "perempuan") {
                                                                        echo "selected";
                                                                    } ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="btn btn-success mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="submit">Update Profil</button>
                                </div>
                                <div class="btn btn-secondary mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-7 col-md-5 px-md-4 mx-auto">
                            <div class="foto-profil mt-3 text-center text-md-start">
                                <h5 class="fw-bold">
                                    Foto Profile
                                </h5>
                                <?php if ($datadiri->foto_user == null) : ?>
                                    <div class="rounded-circle mb-3" id="imagePreview" style="background-image: url('https://www.gravatar.com/avatar/10<?php echo $datadiri->id_user ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')"></div>
                                <?php else : ?>
                                    <div class="rounded-circle mb-3" id="imagePreview" style="background-image: url(<?php echo base_url() ?>assets/img/foto_user/<?php echo $datadiri->foto_user ?>)"></div>
                                <?php endif; ?>
                                <form action="<?= base_url() ?>Profile/save_foto_profil" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn-foto">
                                                    <i class="fas fa-pencil-alt my-auto me-1"></i>
                                                    Upload
                                                </button>
                                                <input type="file" name="foto_profil" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div>
                                                <button type="submit" class="btn-foto">
                                                    <i class="fas fa-save my-auto me-1"></i>
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
        console.log(this);
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $('#kota option:gt(0)').remove();
            $.ajax({
                url: "<?php echo base_url(); ?>Profile/get_kota/",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var city = '<option disabled selected hidden>pilih kota</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        city += '<option value="' + data[i].id + '">' + data[i].nama_kota + '</option>';
                    }
                    $('#kota').html(city);
                }
            });
        });
    });
</script>