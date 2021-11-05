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
                                <div class="btn btn-success mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="button" onclick="copy_link()"><i class="fas fa-copy"></i> Copy</button>
                                </div>
                                <div class="btn btn-secondary mt-3">
                                    <button style="background-color: transparent;border:none;color:white;" type="button" onclick="share_afiliasi()"><i class="fas fa-share-square"></i> Share</button>
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