<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-kOs2sh6foVzkcror"></script>

<div class="profile mb-5 text-black" id="#profile">
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
            <div class="col-lg-7 pr">
                <h3 class="fw-bold">
                    Top Up Saldo
                </h3>
                <hr class="m-0">

                <div class="row">
                    <!-- <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="10000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin1.svg" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                Rp 10.000
                            </h6>
                        </div>
                    </div> -->
                    <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="10000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin2.svg" alt="" class="img-fluid m-0 p-3 ">
                            <h6 class="fw-bold">
                                100 Coin
                            </h6>
                        </div>
                    </div>
                    <!-- <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="20000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin3.svg" alt="" class="img-fluid m-0 p-3 ">
                            <h6 class="fw-bold">
                                Rp. 20.000
                            </h6>
                        </div>
                    </div> -->
                    <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="20000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin4.png" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                200 Coin
                            </h6>
                        </div>
                    </div>
                    <!-- <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="30000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin5.svg" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                Rp 30.000
                            </h6>
                        </div>
                    </div> -->

                    <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="50000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin6.png" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                500 Coin
                            </h6>
                        </div>
                    </div>
                    <!-- <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="40000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin7.png" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                Rp 40.000
                            </h6>
                        </div>
                    </div> -->
                    <div class="col-6 mt-3 col-lg-3">
                        <div class="d-block saldo text-center p-1 px-3" data-id="100000">
                            <img src="<?php echo base_url(); ?>assets/img/svg/coin8.svg" alt="" class="img-fluid m-0 p-3">
                            <h6 class="fw-bold">
                                1000 Coin
                            </h6>
                        </div>
                    </div>
                </div>
                <form id="payment-form" method="post" action="<?= site_url() ?>midtrans/Snap/finish">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                </form>
                <form action="sadsa" method="post">
                    <h5 class="mt-3 fw-bold">
                        Harga Top Up = Rp <input type="text" id="jumlah" name="top_up" value="0" disabled="disabled"></input>
                    </h5>
                    <button disabled id="bayar" type="submit" class="btn text-white fw-bold bg-success mt-2">
                        <span>
                            Bayar
                        </span>
                    </button>
                </form>
                <div class="mt-5">
                    <h4 class="fw-bold mt-3">
                        Transaksi Top Up
                    </h4>
                    <hr class="m-0">
                    <?php if ($transaksi != null) : ?>
                        <table class="table table-bordered table-hover mt-3">
                            <tr>
                                <th>No</th>
                                <th>Total Top Up</th>
                                <th>Jenis Pembayaran</th>
                                <th>Waktu Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $i = 1;
                            foreach ($transaksi as $trans) : ?>
                                <tr>
                                    <td style="font-size: small;"><?php echo $i ?></td>
                                    <td style="font-size: small;">Rp. <?php echo number_format($trans['total_topup'], '0', ',', '.') ?></td>
                                    <td style="font-size: small;"><?php if ($trans['payment_type'] == "bank_transfer") {
                                                                        echo "Transfer Bank";
                                                                    } elseif ($trans['payment_type'] == "gopay") {
                                                                        echo "Gopay";
                                                                    }
                                                                    ?></td>
                                    <td style="font-size: small;"><?php echo date("d-m-Y H:i:s", strtotime($trans['transaction_time'])) ?> WIB</td>
                                    <td class="text-center" style="font-size: small;">
                                        <?php if ($trans['status_code'] == 201) : ?>
                                            <span class="badge bg-warning">Menunggu</span>
                                        <?php elseif ($trans['status_code'] == 200) : ?>
                                            <span class="badge bg-success">Sukses</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($trans['pdf_url'] != null) :  ?>
                                            <a class="btn btn-primary " style="font-size: small;" href="<?php echo $trans['pdf_url'] ?>" target="_blank">
                                                Panduan
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </table>
                        <h5 style="color: red;"></h5>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    console.log('asus');
    var tabLink = document.querySelectorAll(".saldo");

    tabLink.forEach(function(item) {
        item.addEventListener(
            "click",
            function(e) {
                // ADDS AND REMOVES ACTIVE CLASS ON TABLINKS
                tabLink.forEach(function(item) {
                    item.classList.remove("red");
                });
                item.classList.add("red");
                // console.log($(this).data('id'));
                var c = $(this).data('id');

                document.getElementById("jumlah").value = c;
                document.getElementById("bayar").removeAttribute('disabled');

                // SOMEHOW EQUATE TAB LINKS TO TAB PANES
                console.log(e.target);
            },
            false
        );
    });
</script>
<script type="text/javascript">
    $('#bayar').click(function(event) {
        event.preventDefault();
        // $(this).attr("disabled", "disabled");

        var topup = document.getElementById("jumlah").value;
        console.log('topup', topup);

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>midtrans/Snap/token',
            data: {
                topup: topup
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>