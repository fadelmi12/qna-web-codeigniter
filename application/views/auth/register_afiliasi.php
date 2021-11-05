<div class="py-4">
    <div class="container">
        Home / Gabung Anggota
    </div>
</div>
<div id="register" class="register">
    <div class="container mb-5 text-center">
        <h2>
            Register
        </h2>
        <hr style="width:220px;border:solid 1px" class="mx-auto">
        <div class="row">
            <form id="form_afiliasi" action="<?php echo base_url() . 'auth/Register/daftar_afiliasi/' . $this->uri->segment(4, 0); ?>" method="post" enctype="multipart/form-data">
                <div class="col-md-5 mx-auto">
                    <div class="auth-box text-start p-4">
                        <div class="group mb-3">
                            <h5>
                                Nama Lengkap
                            </h5>
                            <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Nama Lengkap masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Nama" />
                            <span class="text-danger"><?= form_error('nama_lengkap') ?></span>
                        </div>

                        <div class="group mb-3">
                            <h5>
                                Username
                            </h5>
                            <input type="text" name="username" value="<?= set_value('username') ?>" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Username masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Username" />
                            <span class="text-danger"><?= form_error('username') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Email
                            </h5>
                            <input type="email" name="email" value="<?= set_value('email') ?>" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Email belum sesuai')" oninput="setCustomValidity('')" placeholder="Masukkan Email" />
                            <span class="text-danger"><?= form_error('email') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                No Whatsapp
                            </h5>
                            <input type="text" name="no_hp" id="no_wa" value="<?= set_value('no_hp') ?>" id="" onfocus="(this.type='number')" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('No Handphone masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan No Whatsapp" />
                            <span class="text-danger"><?= form_error('no_hp') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Tanggal Lahir
                            </h5>
                            <input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Tanggal lahir belum diisi nih!')" oninput="setCustomValidity('')" />
                            <span class="text-danger"><?= form_error('tgl_lahir') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Jenis Kelamin
                            </h5>
                            <select class="form-control" name="gender" id="" value="<?= set_value('gender') ?>" required oninvalid="this.setCustomValidity('Jenis Kelamin belum diisi')" oninput="setCustomValidity('')">
                                <option value="" disabled selected hidden>pilih jenis kelamin</option>
                                <option value="laki" <?php if (set_value('gender') == "laki") {
                                                            echo "selected";
                                                        } ?>>Laki-Laki</option>
                                <option value="perempuan" <?php if (set_value('gender') == "perempuan") {
                                                                echo "selected";
                                                            } ?>>Perempuan</option>
                            </select>
                            <span class="text-danger"><?= form_error('gender') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Password
                            </h5>
                            <input type="password" name="password" id="password-field" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Password minimal 8 karakter dan menggunakan minimal 1 huruf besar dan 1 angka')" oninput="setCustomValidity('')" placeholder="Masukkan Password" />
                            <span style="position: absolute;margin-left:-30px;margin-top:13px;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span class="text-danger"><?= form_error('password') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Konfirmasi Password
                            </h5>
                            <input type="password" name="confirm_password" id="password-field2" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Konfirmasi Password masih kosong')" oninput="setCustomValidity('')" placeholder="Masukkan Konfirmasi Password" />
                            <span style="position: absolute;margin-left:-30px;margin-top:13px;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span class="text-danger"><?= form_error('confirm_password') ?></span>
                        </div>
                        <div class="group mb-3">
                            <h5>
                                Kode OTP
                            </h5>
                            <input type="number" name="kode_otp" id="" class="w-100 p-2 px-3" required oninvalid="this.setCustomValidity('Kode OTP belum sesuai')" oninput="setCustomValidity('')" placeholder="Masukkan Kode OTP" />
                            <span class="text-danger"><?= form_error('kode_otp') ?></span>
                        </div>
                        <div class="group mb-3 text-justify">
                            <span><strong><a aria-disabled="true" target="_blank" href="https://wa.me/6281331255143?text=Hai%20Admin%20Siswa%20Rajin.%20Saya%20ingin%20request%20kode%20otp,%20untuk%20bergabung%20bersama%20Siswa%20Rajin." onclick="setTimeout(request_otp(),5000)">Klik disini</a></strong> untuk mendapatkan kode OTP. Kode OTP akan dikirim melalui nomor WA dan hanya berlaku 5 menit.<br></span>
                        </div>
                        <hr>
                        <div class="group mb-4 text-center">
                            Saya setuju dengan <strong><a href="<?php echo base_url(); ?>">Aturan dan Kebijkan</a></strong> dari siswarajin.com
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="text-center">
                            <button type="submit" style="background: transparent; border: 0px;">
                                <div class="btn-daftar px-4 py-2 mx-auto">
                                    <h5>
                                        DAFTAR
                                    </h5>
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
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

    function request_otp() {
        var no_wa = document.getElementById("no_wa").value;
        if (no_wa == "") {
            alert("Nomor Whatsapp belum diinputkan!");
        } else {
            setTimeout(() => {
                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    url: '<?php echo base_url() ?>auth/Register/kirim_otp',
                    data: {
                        no_wa: no_wa
                    },
                    success: function(result) {
                        if (result == '') {
                            console.log("false");
                        } else {
                            console.log("true");
                        }
                    }
                })
            }, 5000);
        }
    }

    function check_otp() {
        var no_wa = document.getElementById("no_wa").value;
        document.getElementById("form_afiliasi").submit();
    }
</script>