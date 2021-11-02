<?php $sess = $this->session->userdata('id_user') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RBXQHXG55J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-RBXQHXG55J');
    </script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Siswa Rajin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://drive.google.com/uc?id=1jLrfISsLUcRiwgNl0koSfsS6lylj0E7h">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <style>
        * {
            scrollbar-width: auto;
            scrollbar-color: #cecece #ffffff;
        }

        
        *::-webkit-scrollbar {
            width: 10px;
        }

        *::-webkit-scrollbar-track {
            background: #ffffff;
        }

        *::-webkit-scrollbar-thumb {
            background-color: #cecece;
            border-radius: 10px;
            border: 2px solid #ffffff;
        }
    </style>
</head>
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <a href="<?php echo base_url(); ?>" class="logo me-auto"><img src="<?php echo base_url(); ?>assets/img/logo.svg" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?php echo base_url(); ?>">Home</a></li>

                <li class="dropdown"><a href="#"><span>Artikel</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo base_url("Artikel") ?>">Daftar Artikel</a></li>

                        <li><a href="#">Upload Artikel</a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('id_user') != null) { ?>
                    <li class="dropdown"><a href="#about"><span><?php echo $this->session->userdata('nama_user') ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo base_url("Profile") ?>">Profile</a></li>
                            <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> -->
                            <li><a href="<?php echo base_url("Profile/keuangan") ?>">Keuangan</a></li>
                            <li><a href="<?php echo base_url("Profile/daftar_pertanyaan") ?>">Pertanyaan Saya</a></li>
                            <li><a href="<?php echo base_url("Profile/daftar_artikel") ?>">Artikel Saya</a></li>
                            <li><a href="<?php echo base_url("auth/Login/logout") ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>auth/register">Daftar</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url(); ?>auth/login">Login</a></li>
                <?php } ?>
                <li><a href="javascript:check_user();" class="getstarted scrollto">Buat Pertanyaan</a></li>
                <script type="text/javascript">
                    function check_user() {
                        var id_user = '<?php echo $this->session->userdata('id_user') ?>';
                        if (id_user != '') {
                            $('#tambahpertanyaan').modal('show');
                        } else {
                            $('#Konfirmasi_Like_Login').modal('show');
                        };
                    };
                </script>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>