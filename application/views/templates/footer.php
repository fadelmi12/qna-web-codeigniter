<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row justify-content-center justify-content-lg-between ">

        <div class="col-lg-3 col-md-6 footer-contact text-center text-lg-start">
          <a href="index.html">
            <img src="<?php echo base_url(); ?>assets/img/logo.svg" alt="">
          </a>
          <p class="mt-3 mt-lg-0">
            Madiun, Jawa Timur <br>
            Indonesia<br>
            <strong>Phone :</strong> +62 89 532 999 0656<br>
            <strong>Email :</strong> email@email.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links text-center text-lg-start">
          <h4>Fitur</h4>
          <ul>
            <li class="d-flex justify-content-center justify-content-lg-start"><i class="bx bx-chevron-right"></i> <a href="#">Question and Answer</a></li>
            <li class="d-flex justify-content-center justify-content-lg-start"><i class="bx bx-chevron-right"></i> <a href="#">Jurnal dan Modul Ajar</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links text-center text-lg-start">
          <h4>Sosial Media</h4>
          <p>Ikuti Sosial Media dari siswarajin.com</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>siswarajin.com</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <strong><a href="#" style="color: black;"></a>NgawiSoft</a></strong>
    </div>
  </div>

</footer><!-- End Footer -->

<!-- <div id="preloader"></div> -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendor/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#filter-toggle').click(function() {
      // console.log('ss');
      $('.filter-pop').slideToggle("fast");
      // Alternative animation for example
      // slideToggle("fast");
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#filter-toggle-m').click(function() {
      // console.log('ss');
      $('.filter-pop').slideToggle("fast");
      // Alternative animation for example
      // slideToggle("fast");
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.js-select2-multi').select2({
      maximumSelectionLength: 2,
      language: {
        maximumSelected: (args) => 'Maksimal ' + args.maximum + ' Pilihan'
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.multiple-items').slick({
      dots: false,
      // infinite: true,
      arrows: true,
      slidesToShow: 6,
      slidesToScroll: 6,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            arrows: false,
            slidesToShow: 4.5,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            infinite: false,
            slidesToShow: 3.6,
            slidesToScroll: 3
          }
        }
      ]
    });
  });
</script>

<!-- MODAL Konfirmasi Login like -->
<div class="modal fade" id="Konfirmasi_Like_Login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
        <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Informasi</strong></h2>
      </div>
      <div class="modal-body">
        <div class="container text-center justify-content-center">
          <h5>Anda belum Login. Silakan Login terlebih dulu untuk melakukan action ini!</h5>
        </div>
        <div class="container text-center mt-3">
          <div class="row justify-content-between">
            <div class="col">
              <button class="btn btn-primary mr-4 col-7" onclick="window.location.href='<?php echo base_url('auth/Login') ?>'">Iya</button>
            </div>
            <div class="col">
              <button class="btn btn-danger ml-3 col-7" onclick="close_modal_konfirmasi_login()">Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function close_modal_konfirmasi_login() {
          $('#Konfirmasi_Like_Login').modal('hide');
        }
      </script>
    </div>
  </div>
</div>



<div class="modal fade" id="tambahpertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <form class="d-block" id="save_form" action="<?php echo base_url('Dashboard/save_pertanyaan') ?>" method="POST" enctype="multipart/form-data">
          <h4>Ajukan Pertanyaan</h4>
          <textarea name="pertanyaan" id="addquestion" class="w-100 p-3 mb-2" style="height: 30vh;border-radius:10px; border:none;background:#e7ffec" required oninvalid="this.setCustomValidity('Pertanyaan tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>

          <div class="row mb-2">
            <div class="col-lg-2 col-4 d-flex align-items-center">
              <h6 class="d-block d-sm-none p-0 m-0 me-3">File</h6>
              <h6 class="d-sm-block d-none p-0 m-0 me-3">Lampirkan File</h6>
            </div>
            <div class="col-lg-9 col-8">
              <input type="file" name="gambar_tanya" id="real-file" hidden="hidden" accept="image/png, image/gif, image/jpeg" />
              <button type="button" id="custom-button">
                <i class="fas fa-copy"></i>
              </button>
              <span id="custom-text">Belum ada file yang dipiih</span>

            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-2 col-4 d-flex align-items-center">
              <h6 class="p-0 m-0 me-3">Kategori</h6>
            </div>
            <div class="col-lg-9 col-8">
              <div class="select-wrapper w-100">
                <?php $choice = $this->Model_dashboard->get_kategori_dasboard()->result_array(); ?>
                <select class="w-25 form-control" name="kategori" id="kategori" required oninvalid="this.setCustomValidity('kategori pertanyaan belum dipilih')" oninput="setCustomValidity('')">
                  <option value="" disable selected hidden>Pilih Kategori</option>
                  <?php
                  foreach ($choice as $cc) : ?>
                    <option value="<?= $cc['id_kategori'] ?>"><?= $cc['nama_kategori'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

          </div>
          <div class="row mb-3">
            <div class="col-lg-2 col-4 d-flex align-items-center">
              <h6 class="p-0 m-0 me-3">Harga</h6>
            </div>
            <div class="col-lg-9 col-8">
              <div class="select-wrapper" style="width:max-content">
                <select class="form-control" id="harga_prt" name="harga" required oninvalid="this.setCustomValidity('nilai pertanyaan belum dipilih')" oninput="setCustomValidity('')">
                  <option value="" disable selected hidden>Harga</option>
                  <option value="20">20 Coin</option>
                  <option value="25">25 Coin</option>
                  <option value="35">35 Coin</option>
                </select>
              </div>
            </div>

          </div>
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

          <!-- <input type="text" name="user" value="<?= $sess ?>"> -->
          <button class="btn btn-primary" style="padding:5px 15px;border-radius:10px; border:none;background:#0073ff;font-size:1rem">Tanyakan</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- MODAL Share -->
<div class="modal fade" id="modal_share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background: aquamarine; justify-content:center; height: 4rem;" align="center">
        <h2 class="modal-title text-black" id="exampleModalLabel"><strong>Bagikan</strong></h2>
      </div>
      <div class="modal-body">
        <div class="text-center row ">

          <!-- Untuk Email -->
          <div class="col-3">
            <a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://siswarajin.com<?php echo ($_SERVER["REQUEST_URI"]) ?>">
              <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/mail.png">
              <h6 class="text-black"><strong>Email</strong></h6>
            </a>
          </div>

          <!-- Untuk FB -->
          <div class="col-3">
            <a href="http://www.facebook.com/sharer.php?u=https://siswarajin.com<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
              <img style="width: 60%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/facebook.png" alt="Facebook" />
              <h6 class="text-black"><strong>Facebook</strong></h6>
            </a>
          </div>

          <!-- Untuk WA -->
          <div class="col-3">
            <a href="https://web.whatsapp.com/send/?phone&text=https://siswarajin.com<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
              <img style="width: 59%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/whatsapp.png" alt="Google" />
              <h6 class="text-black"><strong>Whatsapp</strong></h6>
            </a>
          </div>

          <!-- Untuk Twitter -->
          <div class="col-3">
            <a href="https://twitter.com/intent/tweet?url=https://siswarajin.com<?php echo ($_SERVER["REQUEST_URI"]) ?>" target="_blank">
              <img style="width: 61%; height: auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/img/share/twitter.png" alt="Twitter" />
              <h6 class="text-black"><strong>Twitter</strong></h6>
            </a>
          </div>

          <div class="container text-center mt-3">
            <input class="form-control text-center justify-content-center" type="text" value="https://siswarajin.com<?php echo ($_SERVER["REQUEST_URI"]) ?>">
          </div>

          <div class="container text-center mt-3">
            <button class="btn btn-danger ml-3" onclick="close_modal_share()">Close</button>
          </div>
        </div>
        <script type="text/javascript">
          function close_modal_share() {
            $('#modal_share').modal('hide');
          }
        </script>
      </div>
    </div>
  </div>
</div>

<script>
  const realFileBtn = document.getElementById("real-file");
  const customBtn = document.getElementById("custom-button");
  const customTxt = document.getElementById("custom-text");

  customBtn.addEventListener("click", function() {
    realFileBtn.click();
  });

  realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
      customTxt.innerHTML = realFileBtn.value.match(
        /[\/\\]([\w\d\s\.\-\(\)]+)$/
      )[1];
    } else {
      customTxt.innerHTML = "No file chosen, yet.";
    }
  });
</script>
<script type="text/javascript">
  document.getElementById("save_form").addEventListener('submit', function(e) {
    e.preventDefault();
    var select = document.getElementById('harga_prt');
    var asu = select.options[select.selectedIndex].value;
    var a = <?php echo $money ?>;
    var wallet = parseInt(a);
    var hargaselect = parseInt(asu);
    if (wallet < hargaselect) {
      swal('Forbiden', 'Saldo anda kurang', 'error');
      // document.forms["my_form"]["tes"].focus();
    } else if (wallet >= hargaselect) {
      document.getElementById("save_form").submit();
    }

  });
</script>
</body>


</html>