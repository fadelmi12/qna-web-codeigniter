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
                    Afiliasi
                </h3>
                <hr class="m-0">
                <div class="edit-profile">
                    <div class="row flex-column-reverse flex-md-row justify-content-center">
                        <div class="col-md-12">
                            <form action="<?= base_url() ?>Profile/save_editprofile" method="POST">
                                <div class="form-group mt-3">
                                    <h6 class="fw-bolder">
                                        Link Afiliasi
                                    </h6>
                                    <input disabled type="text" name="afiliasi" id="link_afiliasi" value="<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>" class="w-100 px-3 py-1">
                                </div>
                                <div class="mt-3" style="text-align: justify;">
                                    <span class="text-success">Setiap user yang mendaftar menggunakan link afiliasi ini, kamu akan mendapatkan tambahan saldo sebesar 10 COIN.</span>
                                </div>
                                <div class="btn btn-primary mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="button" onclick="copy_link()"><i class="fas fa-copy"></i> Copy</button>
                                </div>
                                <div class="btn btn-success mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="button" onclick="share_afiliasi()"><i class="fas fa-share-square"></i> Share</button>
                                </div>
                                <div class="btn btn-warning mt-3">
                                    <a href="<?= base_url() ?>Profile/random_afiliasi">
                                        <button style="background-color: transparent;border:none;color:white;" type="button"><i class="fas fa-random"></i> Random Link</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function copy_link() {
        /* Get the text field */
        var copyText = document.getElementById("link_afiliasi");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        alert("link afiliasi telah tersimpan di clipboard")
    }

    function share_afiliasi() {
        $('#modal_share_afiliasi').modal('show');
    };
</script>
<!-- MODAL Share  Afiliasi-->
<div class="modal fade" id="modal_share_afiliasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
                <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Bagikan</strong></h2>
            </div>
            <div class="modal-body">
                <div class="text-center row ">

                    <!-- Untuk Email -->
                    <div class="col-3">
                        <a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>">
                            <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/mail.png">
                            <h6 class="text-black"><strong>Email</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk FB -->
                    <div class="col-3">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>" target="_blank">
                            <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/facebook.png" alt="Facebook" />
                            <h6 class="text-black"><strong>Facebook</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk WA -->
                    <div class="col-3">
                        <a href="https://web.whatsapp.com/send/?phone&text=<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>" target="_blank">
                            <img style="width: 59%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/whatsapp.png" alt="Google" />
                            <h6 class="text-black"><strong>Whatsapp</strong></h6>
                        </a>
                    </div>

                    <!-- Untuk Twitter -->
                    <div class="col-3">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>" target="_blank">
                            <img style="width: 61%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/twitter.png" alt="Twitter" />
                            <h6 class="text-black"><strong>Twitter</strong></h6>
                        </a>
                    </div>

                    <div class="container text-center mt-3">
                        <input class="form-control text-center justify-content-center" type="text" value="<?php echo base_url() ?>auth/Register/afiliasi/<?php echo $datadiri->kode_afiliasi ?>">
                    </div>

                    <div class="container text-center mt-3">
                        <button class="btn btn-danger ml-3" onclick="close_modal_afiliasi()">Close</button>
                    </div>
                </div>
                <script type="text/javascript">
                    function close_modal_afiliasi() {
                        $('#modal_share_afiliasi').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>