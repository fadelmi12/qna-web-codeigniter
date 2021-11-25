<div class="profile mb-5 text-black" id="#profile">
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
                    Penarikan
                </h3>
                <hr class="m-0">
                <div class="box-uang p-2 p-lg-3 mt-3">
                    <div class="warning">
                        <div class="up p-2 px-3">
                            <h5 class="m-0 fw-bold">
                                Informasi
                            </h5>
                        </div>
                        <div class="down p-2 px-3">
                            <ul class="m-0 px-3">
                                <li>
                                    Daftar harga penarikan saldo
                                    <table class="table">
                                        <tr>
                                            <th>Coin</th>
                                            <th>Rupiah</th>
                                        </tr>
                                        <tr>
                                            <td>550 Coin</td>
                                            <td>Rp 50.000</td>
                                        </tr>
                                        <tr>
                                            <td>1100 Coin</td>
                                            <td>Rp 100.000</td>
                                        </tr>
                                        <tr>
                                            <td>5500 Coin</td>
                                            <td>Rp 500.000</td>
                                        </tr>
                                    </table>
                                </li>
                                <!--<li>-->
                                <!--    550 Coin = Rp50.000-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    1100 Coin = Rp100.000-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    5500 Coin = Rp500.000-->
                                <!--</li>-->
                                <li>
                                    Dimohon Untuk Mengisi Nama Bank dan No Rekening Sebelum Melakukan Penarikan
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="jumlah-tarik mt-3 ">
                        <div class="row">
                            <div class="col-lg-3 col-lg-3 col-4 d-flex align-items-center">
                                <h6 class="m-0 me-3 fw-bold">
                                    Sisa Saldo
                                </h6>
                            </div>
                            <div class="col-lg-9 col-lg-9 col-8">
                                <h6 class="m-0 me-3">
                                    <?php echo number_format($datadiri->wallet, 0, ",", ".") ?> Coin
                                </h6>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 col-4 d-flex align-items-center">
                                <h6 class="m-0 me-3 fw-bold">
                                    Jumlah Penarikan
                                </h6>
                            </div>
                            <form id="form_tarik" action="<?php echo base_url('Profile/tarik_uang') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-9 col-8 d-flex align-items-center">

                                    <!--<input id="coin_pull" type="number" name="tarik_coin" class=" px-2 h-100 w-75 me-2">-->
                                    <select id="coin_pull" name="tarik_coin" class="form-control px-2 h-100 w-75 me-2">
                                        <option disabled selected hidden>pilih jumlah penarikan</option>
                                        <option value="550">550 Coin</option>
                                        <option value="1100">1100 Coin</option>
                                        <option value="5500">5500 Coin</option>
                                    </select>
                                    <div class="coin h-100 d-flex align-items-center px-1 fw-bold" style="border:solid 1px #cecece; border-radius:5px;background-color:#cecece">
                                        Coin
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="d-flex w-100 justify-content-start mt-3 mb-2 flex-wrap">
                        <a href="<?php echo base_url(); ?>profile/keuangan">
                            <div class="d-flex align-items-center p-2 px-3 btn-ubah bg-danger me-2">
                                <span class="iconify me-2" data-icon="akar-icons:arrow-back-thick-fill"></span>
                                <span class="mb-0">
                                    Kembali
                                </span>
                            </div>
                        </a>

                        <button type="submit" style="background: transparent; border:none;">
                            <div class="d-flex align-items-center p-2 px-3 btn-ubah bg-primary">
                                <span class="iconify me-2" data-icon="uil:money-withdrawal"></span>
                                <span class="mb-0">
                                    Request Penarikan
                                </span>
                            </div>
                        </button>
                        </form>
                        <?php $id_bank = json_encode($this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->id_bank);
                        $nama_rek = json_encode($this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->nama_rek);
                        $no_rek = json_encode($this->Model_profile->get_wallet($this->session->userdata('id_user'))->row()->no_rek); ?>
                        <script type="text/javascript">
                            document.getElementById("form_tarik").addEventListener('submit', function(e) {
                                e.preventDefault();
                                var noRek = <?php echo $no_rek ?>;
                                var id_Bank = <?php echo $id_bank ?>;
                                var namaRek = <?php echo $nama_rek ?>;
                                var select = document.getElementById('coin_pull').value;
                                var a = <?php echo $money ?>;
                                var wallet = parseInt(a);
                                var hargaselect = parseInt(select);
                                if (!noRek || !id_Bank || !namaRek) {
                                    swal('Forbiden', 'Lengkapi Terlebih dahulu Nama Bank, No Rekening, dan Nama Rekening', 'error');
                                } else {
                                    if (hargaselect < 550) {
                                        swal('Forbiden', 'Minimal Penarikan 550', 'error');
                                    } else {
                                        if (wallet < hargaselect) {
                                            swal('Forbiden', 'Saldo anda kurang', 'error');
                                            // document.forms["my_form"]["tes"].focus();
                                        } else if (wallet >= hargaselect) {
                                            swal(
                                                'Good job!',
                                                'Permintaan akan diproses',
                                                'success'
                                            ).then((lanjut) => {
                                                document.getElementById("form_tarik").submit();
                                            })

                                        }
                                    }
                                }

                            });
                        </script>
                    </div>

                </div>
                <h4 class="fw-bold mt-3">
                    Riwayat Penarikan
                </h4>
                <hr class="m-0">
                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Bank</th>
                                <th scope="col">No. Rek</th>
                                <th scope="col">Nama Rek</th>
                                <th scope="col">Jumlah</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($riwayat_tarik as $rwt) : $no++ ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $no ?></th>
                                    <td style="font-size: small;"><?= $rwt->tgl_penarikan ?> WIB</td>
                                    <td style="font-size: small;">
                                        <?= $datadiri->nama_bank ?>
                                    </td>
                                    <td style="font-size: small;">
                                        <?= $datadiri->no_rek ?>
                                    </td>
                                    <td style="font-size: small;">
                                        <?= $datadiri->nama_rek ?>
                                    </td>
                                    <?php $coin = $rwt->jumlah_coin;
                                    if ($coin == 550) :
                                        $rupiah = 50000;
                                    elseif ($coin == 1100) :
                                        $rupiah = 100000;
                                    elseif ($coin == 5500) :
                                        $rupiah = 500000;
                                    endif; ?>
                                    <td style="font-size: small;"><?= $rwt->jumlah_coin ?> Coin - Rp<?= number_format($rupiah, '0', ',', '.') ?></td>
                                    <td class="text-center"><?php if ($rwt->status_terkirim == 0) : ?>
                                            <span class="badge bg-warning">Menunggu Dikirim</span>
                                        <?php elseif ($rwt->status_terkirim == 1) : ?>
                                            <span class="badge bg-success">Sudah Dikirim</span>
                                        <?php elseif ($rwt->status_terkirim == 2) : ?>
                                            <span class="badge bg-danger">Rek Tidak Ada</span>
                                        <?php elseif ($rwt->status_terkirim == 3) : ?>
                                            <span class="badge bg-danger">Penarikan Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function edit_rekening() {
        $('#edit_rekening').modal('show');
    };
</script>