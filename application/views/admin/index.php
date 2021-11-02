            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total Pertanyaan</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($Qcount) ?></h2>
                                                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15"> Customers</h5>
                                                    <h2 class="mb-3 font-18">1,287</h2>
                                                    <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/2.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total User</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($user) ?></h2>
                                                    <p class="mb-0"><span class="col-green">18%</span>
                                                        Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/3.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">Total Artikel</h5>
                                                    <h2 class="mb-3 font-18"><?php echo count($Arcount) ?></h2>
                                                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="assets/img/banner/4.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="text-left">Kategori</h4>
                                    <div class="card-header-action">
                                        <a href="<?= base_url('AdminPage/Verifikasi_Pertanyaan') ?>" class="btn btn-success me-2"><i class="fas fa-check"></i> Verifikasi Pertanyaan <span class="badge" style="background:white; color:#67be7e;">
                                                <?= $verifcount ?> </span> </a>
                                        <button type="button" onclick="tambahktg()" class="btn btn-primary">Tambah Kategori</button>
                                        <script>
                                            function tambahktg() {
                                                $('#tambah_kategori').modal('show');
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <?php foreach ($kategori as $ktg) : ?>

                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="card">
                                                    <div class="card-statistic-4">
                                                        <div class="align-items-center justify-content-between">
                                                            <div class="row ">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-0">

                                                                    <div class="card-content">
                                                                        <!-- <h5 class="font-15">Biologi</h5> -->
                                                                        <?php $totalktg = 0;
                                                                        foreach ($Qcount as $Qco) : ?>

                                                                            <?php if ($Qco['id_kategori'] == $ktg['id_kategori']) $totalktg++; ?>
                                                                        <?php endforeach; ?>
                                                                        <h2 class="mb-1 font-18"><?php echo $ktg['nama_kategori'] ?></h2>
                                                                        <p class="mb-0">Total Pertanyaan :<span class="col-green"><?php echo $totalktg ?></span></p>

                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-6 col-md-11 col-sm-12 col-12 pl-0">
                                                                    <div class="d-flex flex-row-reverse bd-highlight">

                                                                        <a href="<?= base_url('AdminPage/Question/' . $ktg['nama_kategori']) ?>" class="btn btn-primary mt-2 mb-2 m-1">View Question</a>
                                                                        <button type="button" data-toggle="modal" data-target="#edit_kategori<?= $ktg['id_kategori'] ?>" class="btn btn-info mt-2 mb-2 m-1">Edit</button>
                                                                        <a href="#" data-toggle="modal" data-target="#delete_kategori<?= $ktg['id_kategori'] ?>" class="btn btn-danger mt-2 mb-2 m-1">Delete</a>


                                                                    </div>
                                                                    <!-- <div class="banner-img">
                                                                    <img src="<?php echo base_url(); ?>assets/img/skills.png" alt="">
                                                                </div> -->
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        <?php endforeach; ?>

                                        <!-- <div class="col-lg-9">
                                            <div id="chart1"></div>
                                            <div class="row mb-0">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="m-b-0">$675</h5>
                                                            <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle" class="col-orange"></i>
                                                            <h5 class="m-b-0">$1,587</h5>
                                                            <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="list-inline text-center">
                                                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-green"></i>
                                                            <h5 class="mb-0 m-b-0">$45,965</h5>
                                                            <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row mt-5">
                                                <div class="col-7 col-xl-7 mb-3">Total customers</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">8,257</span>
                                                    <sup class="col-green">+09%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total Income</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">$9,857</span>
                                                    <sup class="text-danger">-18%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Project completed</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">28</span>
                                                    <sup class="col-green">+16%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">Total expense</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">$6,287</span>
                                                    <sup class="col-green">+09%</sup>
                                                </div>
                                                <div class="col-7 col-xl-7 mb-3">New Customers</div>
                                                <div class="col-5 col-xl-5 mb-3">
                                                    <span class="text-big">684</span>
                                                    <sup class="col-green">+22%</sup>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart4" class="chartsh"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div class="summary">
                                        <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                                            <div id="chart3" class="chartsh"></div>
                                        </div>
                                        <div data-tab-group="summary-tab" id="summary-text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart2" class="chartsh"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->