<?php echo $this->session->flashdata('pesan'); ?>

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
            <div class="col-lg-7">
                <h3 class="fw-bold">
                    Pengaturan Akun
                </h3>
                <hr class="m-0">
                <div class="col-lg-8 text-center text-sm-start">
                    <form action="<?php echo base_url() ?>Profile/edit_password" method="post">
                        <div class="edit-profile text-start">
                            <div class="form-group mt-3">
                                <h6 class="fw-bolder">
                                    Password Sekarang
                                </h6>
                                <input disabled type="password" id="password" value="<?php echo $datadiri->view_password ?> " class="w-100 px-3 py-1">
                                <span style="position: absolute;margin-left:-30px;margin-top:10px;" toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <!-- <div class="me-2" style="text-align: right;">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div> -->
                            <div class="form-group mt-3">
                                <h6 class="fw-bolder">
                                    Password Baru
                                </h6>
                                <input required type="password" id="password_new" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" oninvalid="this.setCustomValidity('Password minimal 8 karakter dan menggunakan minimal 1 huruf besar dan 1 angka')" oninput="setCustomValidity('')" class="w-100 px-3 py-1">
                                <span style="position: absolute;margin-left:-30px;margin-top:10px;" toggle="#password_new" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <!-- <div class="me-2" style="text-align: right;">
                                <span toggle="#password_new" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div> -->
                            <span class="text-danger"><?= form_error('password') ?></span>
                            <div class="form-group mt-3">
                                <h6 class="fw-bolder">
                                    Konfirmasi Password Baru
                                </h6>
                                <input required type="password" id="password_new_conf" name="confirm_password" class="w-100 px-3 py-1">
                                <span style="position: absolute;margin-left:-30px;margin-top:10px;" toggle="#password_new_conf" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <!-- <div class="me-2" style="text-align: right;">
                                <span toggle="#password_new_conf" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div> -->
                            <span class="text-danger"><?= form_error('confirm_password') ?></span>
                        </div>

                        <div>
                            <button type="submit" class="btn text-white btn-primary fw-bold mt-3">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>