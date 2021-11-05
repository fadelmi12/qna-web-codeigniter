<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siswa Rajin - Admin </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/app.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/bundles/datatables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/bundles/prism/prism.css') ?>">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/custom.css') ?>">
    <link rel='shortcut icon' type='image/x-icon' href='<?= base_url('assets/img/favicon.ico') ?>' />
</head>

<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url(); ?>assets/admin/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('') ?>"> <span class="logo-name">Siswa Rajin</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <?php $unread = $this->db->query("SELECT * FROM t_message WHERE status_baca = '0'")->num_rows() ?>
                        <li class="menu-header">Main</li>
                        <li class="dropdown">
                            <a href="<?php echo base_url('AdminPage') ?>" class="nav-link"><i data-feather="help-circle"></i><span>Pertanyaan</span></a>
                            <a href="<?php echo base_url('Daftar_artikel/index') ?>" class="nav-link"><i data-feather="book"></i><span>Artikel</span></a>
                            <a href="<?php echo base_url('Daftar_user') ?>" class="nav-link"><i data-feather="users"></i><span>User</span></a>
                            <a href="<?php echo base_url('Penarikan_saldo/index') ?>" class="nav-link"><i data-feather="dollar-sign"></i><span>Penarikan</span></a>
                            <a href="<?php echo base_url() ?>AdminPage/log_login" class="nav-link"><i data-feather="log-in"></i><span>Log Login</span></a>
                            <a href="<?php echo base_url() ?>AdminPage/MessageBox" class="nav-link"><i data-feather="monitor"></i><span>Pesan</span> <em style="color: #3177F3; font-weight: 100; "> <?= $unread ?></em></a>
                            <a href="<?php echo base_url() ?>AdminPage/wa" class="nav-link"><i data-feather="monitor"></i><span>Broadcast WA</span></a>
                        </li>



                    </ul>
                </aside>
            </div>