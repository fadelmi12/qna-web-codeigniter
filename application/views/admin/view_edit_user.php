<!-- Main Content -->
<?php foreach($data_user as $d_user): ?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h3>View & Edit Data User</h3><br>
                        </div>
                        <form method="post" action="<?php echo base_url('Daftar_user/edit_profil/'.$d_user['id_user']) ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <h5>Nama Lengkap</h5>
                                        <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $d_user['nama_lengkap'] ?>"><br>

                                        <h5>Nama User</h5>
                                        <input class="form-control" type="text" name="nama_user" value="<?php echo $d_user['nama_user'] ?>"><br>

                                        <h5>Email</h5>
                                        <input class="form-control" type="email" name="email" value="<?php echo $d_user['email'] ?>"><br>

                                        <h5>Password</h5>
                                        <input id="password-field" class="form-control w-100 p-2 px-3" type="password" name="password" value="<?php echo $d_user['view_password'] ?>">
                                        <div align="right">
                                            <span style="position: absolute;margin-left: -30px;margin-top: -27px;" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span><br>
                                        </div>

                                        <h5>Tanggal Lahir</h5>
                                        <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $d_user['tgl_lahir'] ?>"><br>

                                        <h5>Gender</h5>
                                        <select required name="gender" id="" class="form-control">
                                            <option value="" disabled selected hidden>Pilih jenis kelamin</option>
                                            <option value="laki" <?php if ($d_user['gender'] == "laki") {
                                                                        echo "selected";
                                                                    } ?>>Laki-laki</option>
                                            <option value="perempuan" <?php if ($d_user['gender'] == "perempuan") {
                                                                            echo "selected";
                                                                        } ?>>Perempuan</option>
                                        </select><br>

                                        <h5>No. HP</h5>
                                        <input class="form-control" type="text" name="no_hp" value="<?php echo $d_user['no_hp'] ?>"><br>

                                        <h5>Provinsi</h5>
                                        <select class="form-control" required name="provinsi" id="provinsi">
                                            <option value="" disabled selected hidden>Pilih provinsi</option>
                                            <?php $provinsi = $this->db->query("SELECT * FROM wilayah_provinsi")->result();
                                             foreach ($provinsi as $prov) : ?>
                                                <option value="<?php echo $prov->id ?>" 
                                                    <?php if ($d_user['provinsi'] == $prov->id) 
                                                        {echo "selected";} ?> >
                                                            <?php echo $prov->nama_provinsi ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select><br>

                                        <h5>Kota</h5>
                                        <select class="form-control" required name="kota" id="kota" >
                                            <option selected="" value="<?php echo $d_user['kota'] ?>"><?php echo $d_user['nama_kota'] ?></option>
                                            <?php 
                                                $id_prov = $d_user['provinsi'];
                                                $kabupaten = $this->db->query("SELECT * FROM wilayah_kabupaten where provinsi_id = '$id_prov'")->result();
                                                foreach ($kabupaten as $kab) : ?>
                                            <option value="<?php echo $kab->id ?>">
                                                <?php echo $kab->nama_kota ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select><br>

                                        <h5>Total Saldo</h5>
                                        <input class="form-control" type="text" name="wallet" value="Rp. <?php echo $d_user['wallet'] ?>"><br>
                                </div>
                            <div class="col" align="center">
                                <h4><strong>Foto Profil</strong></h4>
                                <img class="mt-2" src="https://www.gravatar.com/avatar/101b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid" style="border-radius: 100%; width: 60%; height: auto;"><br>
                                <button class="btn btn-sm btn-primary mt-3" type="submit"><h6 class="mt-2">Edit Foto</h6></button>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col" align="center">
                                    <button class="btn btn-sm btn-warning" onclick="window.location.href='<?php echo base_url('Daftar_user/index/') ?>'"type="button"><h6 class="mt-2">Kembali</h6></button>
                                </div>
                                <div class="col" align="center">
                                    <button class="btn btn-sm btn-success" type="submit"><h6 class="mt-2">Simpan Perubahan</h6></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $('#kota option:gt(0)').remove();
            $.ajax({
                url: "<?php echo base_url(); ?>Daftar_user/get_kota/",
                method: "POST",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    var html = '<option disabled selected hidden>pilih kota</option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama_kota + '</option>';
                    }
                    $('#kota').html(html);
                }
            });
        });

        $(".toggle-password").click(function() {
            
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>