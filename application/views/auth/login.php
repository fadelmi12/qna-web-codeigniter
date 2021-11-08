<div id="register" class="register">
    <div class="py-4">
        <div class="container">
            Home / Login
        </div>
    </div>
    <div class="container mb-5 text-center">
        <h2>
            Login
        </h2>
        <hr style="width:220px;border:solid 1px" class="mx-auto">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="auth-box text-start p-4">
                    <div class="group mb-3">
                        <?php echo $this->session->flashdata('pesan') ?>
                        <form method="post" action="<?php echo base_url('auth/Login/login_user/') ?>" enctype="multipart/form-data">
                            <h5>
                                Email
                            </h5>
                            <input type="email" name="email" id="" class="w-100 p-2 px-3" placeholder="Masukkan Email" />
                    </div>
                    <div class="group mb-3">
                        <h5>
                            Password
                        </h5>
                        <input type="password" name="password" id="password-field" class="w-100 p-2 px-3" placeholder="Masukkan Password" />
                        <span style="position: absolute;margin-left:-30px;margin-top:13px;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <!-- <div class="me-2" style="text-align: right;">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div> -->
                    <div class="group mb-4 text-center">
                        Belum punya akun ? Gabung sekarang<strong><a href="<?php echo base_url(); ?>auth/register"> Sign Up </a></strong>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="text-center">
                        <button type="submit" style="background: transparent; border: 0px;">
                            <div class="btn-daftar px-4 py-2 mx-auto">
                                <h5>
                                    LOGIN
                                </h5>
                            </div>
                        </button>
                    </div>
                </div>
                </form>
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