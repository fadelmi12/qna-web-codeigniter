<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
				<h1>Solusi Terbaik untuk PR dan Dompetmu</h1>
				<h5>Siswarajin merupakan website untuk membantu menjawab soal dan pertanyaanmu. Kamu juga bisa mendapatkan
					uang dengan menjawab pertanyaan.</h5>
				<form id="my_form" action="<?php echo base_url('Pertanyaan/search') ?>" method="post" class="nfilters">
					<div class="d-flex justify-content-center justify-content-lg-start">
						<a href="#" class="btn-watch-video">
							<input name="keyword" id="tes" class="input-search" type="text" placeholder="Cari Pertanyaan" />
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<button type="button" class="mt-3" style="background: transparent; border:none;" onclick="validateForm()"><i class='bx bx-search-alt'></i></button>
						</a>
					</div>
				</form>
				<script>
					function validateForm() {
						var a = document.getElementById("tes").value;
						if (a == "") {
							swal('Forbiden', 'Silahkan isi Inputan', 'error');
							// document.forms["my_form"]["tes"].focus();

						} else {
							document.getElementById("my_form").submit();
						}
					}
				</script>
				<script>
					document.getElementById("my_form").addEventListener('submit', function(e) {
						e.preventDefault();
						var a = document.getElementById("tes").value;
						if (a == "") {
							swal('Forbiden', 'Silahkan isi Inputan', 'error');
							// document.forms["my_form"]["tes"].focus();

						} else {
							document.getElementById("my_form").submit();
						}

					});
				</script>


			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img text-right" data-aos="zoom-in" data-aos-delay="100">
				<img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
			</div>
		</div>
	</div>

</section>
<main id="main">

	<section id="cliens" class="cliens">
		<div class="container">
			<div class="mt-2 mb-1">
				<h4>
					Kategori Mata Pelajaran
				</h4>
			</div>

			<div class="row my-2 mx-md-5">
				<div class="multiple-items">
					<?php foreach ($kategori as $ktg) : ?>
						<div class="col-lg-2 col-md-4 col-6 d-block" style="width:max-content">
							<a href="<?php echo base_url('pertanyaan/kategori/' . $ktg['nama_kategori']) ?>">
								<img src="assets/img/clients/<?= $ktg['gambar'] ?>" class="img-fluid " alt="">
								<h6 style="margin: 0px;font-weight: bold;color:black"><?= $ktg['nama_kategori'] ?></h6>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="about" class="about">
		<div class="container  px-sm-5">
			<div class="row">
				<div class="col-12 col-lg-8">
					<div class="d-flex mb-3 mb-lg-2 justify-content-center justify-content-lg-between align-items-center">

						<h3 class="mb-0 text-center text-sm-start " style="font-weight: bold;">
							Pertanyaan Terbaru
						</h3>
						<!-- filter khusus desktop -->
						<div class="filter me-2 py-1 px-3 d-none d-lg-flex align-items-center" id="filter-toggle">
							<i class="iconify me-1" data-icon="cil:list-filter"></i>
							<div class="fw-bold">
								Filter
							</div>
						</div>

					</div>
					<!-- filter khusus hp -->
					<div class="filter mb-3 py-1 px-3 d-flex d-lg-none align-items-center mx-auto" id="filter-toggle-m" style="width:max-content">
						<i class="iconify me-1" data-icon="cil:list-filter"></i>
						<div class="fw-bold">
							Filter
						</div>
					</div>
					<div class="filter-pop">
						<div class="mb-3 d-flex filter-menu py-3 px-3 justify-content-end">
							<!-- <h6 class="m-0 me-3">Urut Berdasarkan</h6> -->
							<select name="filter" id="filterPrice" class="px-2 me-3" >
								<option value="" disabled selected hidden>Harga : </option>
								<option value="0">Termurah</option>
								<option value="1">Termahal</option>
							</select>
							<select name="filter" id="filterTime" class="px-2" >
								<option value="" disabled selected hidden>Waktu : </option>
								<option value="0">Terlama</option>
								<option value="1">Terbaru</option>
							</select>


						</div>

					</div>

					<div id="QuestPlace" class="list-pertanyaan">
						<ul class="px-1 px-lg-2">

							<?php foreach ($question as $qty) :
								date_default_timezone_set('Asia/Jakarta');
								$awal  = date_create($qty['waktu_question']);
								$akhir = date_create();
								$diff  = date_diff($awal, $akhir);

								if ($diff->y != null) {
									$time = $diff->y . ' tahun ';
								} elseif ($diff->m != null) {
									$time = $diff->m . ' bulan ';
								} elseif ($diff->d != null) {
									$time = $diff->d . ' hari ';
								} elseif ($diff->h != null) {
									$time = $diff->h . ' jam ';
								} elseif ($diff->i != null) {
									$time = $diff->i . ' menit ';
								} else {
									$time = $diff->s . ' detik ';
								}

							?>

								<li class="p-3">
									<div class="d-flex">
										<div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/10<?= $qty['id_user']; ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
										</div>
										<div class="d-block w-100">
											<div class="d-flex justify-content-between ">
												<div class="user mb-2">
													<div class="nama">
														<h5>
															<?= $qty['nama_user'] ?> </h5>
													</div>
													<div class="upload mt-1">
														<h6>
															<span class="d-none d-sm-inline-block"><?= $qty['nama_kategori'] ?> ,</span> <a href=""><?= $time ?> yang lalu</a>
														</h6>
													</div>
												</div>
												<div class="harga">
													<h6>
														<span style="margin-right:.3rem;"></span><?php echo number_format($qty['harga'], '0', ',', '.') ?> Coin
													</h6>
												</div>
											</div>
											<div class="pertanyaan">
												<h6>
													<?= $qty['pertanyaan'] ?>
												</h6>
											</div>
											<style type="text/css">
												.btn-jempol {
													color: black;
												}

												.sudahjempol {
													color: blue;
												}
											</style>
											<div class="d-flex justify-content-between align-items-center position-relative">
												<?php
												$i = 0;
												foreach ($like as $key) :
													if ($key['id_pertanyaan'] == $qty['id_pertanyaan']) $i++;
												endforeach; ?>
												<div class="like">
													<form id="input" enctype="multipart/form-data">
														<input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
														<button onclick="like()" id="btnjempol<?php echo $qty['id_pertanyaan'] ?>" data="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up btn-jempol p-0 m-0" style="cursor:pointer;border:none; background: transparent; "></button>
													</form>
												</div>

												<?php
												foreach ($like as $key) :
													if ($key['id_pertanyaan'] == $qty['id_pertanyaan'] && $key['id_user'] ==  $this->session->userdata('id_user')) { ?>
														<div class="like" style="position: absolute;">
															<form id="input" enctype="multipart/form-data">
																<input type="hidden" id="id_user" name="text" value="<?php echo $this->session->userdata('id_user') ?>">
																<button onclick="unlike()" id="btnunlike<?php echo $qty['id_pertanyaan'] ?>" data2="<?php echo $qty['id_pertanyaan'] ?>" type="button" class="fas fa-thumbs-up sudahjempol p-0 m-0" style="cursor:pointer;border:none; background: transparent;"></button>
															</form>
														</div>
												<?php }
												endforeach; ?>

												<?php if ($i != 0) : ?>
													<h6 id="ttl_like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position: absolute; left:45px"><?php echo $i; ?></h6>
												<?php endif; ?>

												<h6 id="like<?php echo $qty['id_pertanyaan'] ?>" class="p-1 px-2 mt-2 fw-bold" style="position: absolute; left:45px; display: none;"><strong id="like<?php echo $qty['id_pertanyaan'] ?>"></strong></h6>

												<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
												<script type="text/javascript">
													function like() {
														var id_user = document.getElementById("id_user").value;
														if (id_user != '') {
															var like = event.target.getAttribute('data');
															var element = document.getElementById("btnjempol" + like);
															element.classList.toggle("sudahjempol");
															$.ajax({
																url: "<?php echo base_url('LikeBookmark/like/') ?>",
																type: "POST",
																data: {
																	id_pertanyaan: like
																},
																dataType: "JSON",
																success: function(data) {
																	console.log(data);
																	if (data > [null]) {
																		$('#ttl_like' + like).hide();
																		$('#like' + like).show();
																		var result = data;
																		i = 1;
																		for (jml in result) {
																			document.getElementById("like" + like).innerHTML = i++;
																		}
																	} else if (data = [null]) {
																		$('#ttl_like' + like).hide();
																		$('#like' + like).show();
																		var result = data;
																		i = 1;
																		for (jml in result) {
																			document.getElementById("like" + like).innerHTML = null;
																		}
																	}
																}
															});

														} else {
															$('#Konfirmasi_Like_Login').modal('show');
														};
													};

													function unlike() {
														var id_user = document.getElementById("id_user").value;
														var cok = event.target.getAttribute('data2');
														if (id_user != '') {
															if (cok) {
																var like2 = event.target.getAttribute('data2');
																var element = document.getElementById("btnunlike" + like2);
																element.classList.toggle("sudahjempol");
																$.ajax({
																	url: "<?php echo base_url('LikeBookmark/like/') ?>",
																	type: "POST",
																	data: {
																		id_pertanyaan: like2
																	},
																	dataType: "JSON",
																	success: function(data) {
																		console.log(data);
																		if (data > [null]) {
																			$('#ttl_like' + like2).hide();
																			$('#like' + like2).show();
																			var result = data;
																			i = 1;
																			for (jml in result) {
																				document.getElementById("like" + like2).innerHTML = i++;
																			}
																		} else if (data = [null]) {
																			$('#ttl_like' + like2).hide();
																			$('#like' + like2).show();
																			var result = data;
																			i = 1;
																			for (jml in result) {
																				document.getElementById("like" + like2).innerHTML = null;
																			}
																		}
																	}
																});
															}

														} else {
															$('#Konfirmasi_Like_Login').modal('show');
														};
													};
												</script>
												<a href="<?php echo base_url('Pertanyaan/detail/' . $qty['id_pertanyaan']) ?>">

													<div class="jawab d-flex">
														<i class="fas fa-pencil-alt my-auto"></i>
														<h6>
															Jawab
														</h6>
													</div>
												</a>
											</div>
										</div>
									</div>
								</li>

							<?php endforeach; ?>
						</ul>
					</div>

				</div>
				<div class="d-none d-md-block col-12 col-lg-4">
					<h3 class="mb-3 " style="font-weight: bold;">
						User Activity
					</h3>
					<div class="user-activity" style="overflow:hidden;height:120vh">
						<ul class="p-3" style="height:120vh; overflow-y: scroll;">

							<?php foreach ($activity as $act) : ?>
								<li class="mb-3">
									<div class="d-flex w-100">
										<div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/10<?= $act['id_user']; ?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
										</div>
										<div class="log-message">
											<h6>
												<strong><?= $act['nama_user'] ?></strong>
											</h6>
											<h6 class="mt-1">
												<?php if ($act['aktivitas'] == "registrasi") : ?>
													telah bergabung dengan Siswa Rajin
												<?php elseif ($act['aktivitas'] == "up_artikel") : ?>
													telah mengunggah artikel baru
												<?php elseif ($act['aktivitas'] == "up_pertanyaan") : ?>
													telah membuat pertanyaan baru
												<?php endif; ?>
											</h6>
											<div class="log-time mt-2 mb-2">
												<i class="fas fa-clock"></i>
												<h6>
													<?= date('d/m/Y H:i:s', strtotime($act['waktu_aktivitas'])) ?> WIB
												</h6>
											</div>
										</div>

									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>


		</div>
	</section><!-- End About Us Section -->
	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Lengkapi referensimu dengan Jurnal dan Modul Ajar</h2>
				<p>Download jurnal dan modul ajar yang penuh materi dan sesuai dengan kompetensi</p>
			</div>

			<div class="row journal-box py-3">
				<div class="col-md-6">
					<div class="col-md-12 journal p-3 h-100">
						<h4 class="m-0 mb-3 text-center text-sm-start">
							Jurnal Terbaru
						</h4>
						<ul style="list-style: none; padding:0px">
							<?php foreach ($article as $arc) : ?>
								<li>
									<div class="list-jurnal p-3 mb-3">
										<h5>
											<?= $arc['judul_artikel'] ?>
										</h5>
										<div class="d-flex mb-2">
											<div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/103?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
											</div>
											<div class="author">
												<?= $arc['nama_user'] ?>
											</div>
										</div>
										<h6 class="fw-normal my-2">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia atque facere dolore voluptas laboriosam reiciendis dignissimos magnam perferendis quaerat natus.
										</h6>
										<div class="d-flex justify-content-between align-items-end">
											<div class="d-block">
												<div class="d-flex mb-1">
													<?php
													$article_tag = $this->Model_dashboard->get_tag_article($arc['id_artikel'])->result_array();
													$i = 0;
													if ($article_tag != null) : ?>
														<i class="fa fa-tag my-auto"></i>
													<?php endif; ?>
													<div class="tag">

														<?php foreach ($article_tag as $arg) :
															if ($i == 0) :
																echo $arg['namaTag'];
															else :
																echo ", " . $arg['namaTag'];
															endif;
															$i++;
														endforeach;
														?>
													</div>
												</div>
												<div class="d-flex">
													<i class="fas fa-file-pdf my-auto"></i>
													<div class="tag">
														<?= $arc['jumlah_halaman'] ?> Halaman, <?= $arc['tahun_rilis'] ?>
													</div>
												</div>
											</div>
											<!-- khusus desktop -->
											<a href="<?php echo base_url('Artikel/detail/' . $arc['slug']) ?>">
												<div class="d-sm-flex btn-download align-items-center d-none">
													<i class="fas fa-eye text-black mr-4 "></i>
													<h6 class="m-0">
														Lihat Artikel
													</h6>
												</div>
											</a>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12 journal p-3 h-100">
						<h4 class="m-0 mb-3 text-center text-sm-start">
							Jurnal Terpopuler
						</h4>
						<ul style="list-style: none; padding:0px">
							<?php foreach ($article as $arc) : ?>
								<li>
									<div class="list-jurnal p-3 mb-3">
										<h5>
											<?= $arc['judul_artikel'] ?>
										</h5>
										<div class="d-flex mb-2">
											<div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/103?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
											</div>
											<div class="author">
												<?= $arc['nama_user'] ?>
											</div>
										</div>
										<h6 class="fw-normal my-2">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia atque facere dolore voluptas laboriosam reiciendis dignissimos magnam perferendis quaerat natus.
										</h6>
										<div class="d-flex justify-content-between align-items-end">
											<div class="d-block">
												<div class="d-flex mb-1">
													<?php
													$article_tag = $this->Model_dashboard->get_tag_article($arc['id_artikel'])->result_array();
													$i = 0;
													if ($article_tag != null) : ?>
														<i class="fa fa-tag my-auto"></i>
													<?php endif; ?>
													<div class="tag">

														<?php foreach ($article_tag as $arg) :
															if ($i == 0) :
																echo $arg['namaTag'];
															else :
																echo ", " . $arg['namaTag'];
															endif;
															$i++;
														endforeach;
														?>
													</div>
												</div>
												<div class="d-flex">
													<i class="fas fa-file-pdf my-auto"></i>
													<div class="tag">
														<?= $arc['jumlah_halaman'] ?> Halaman, <?= $arc['tahun_rilis'] ?>
													</div>
												</div>
											</div>
											<!-- khusus desktop -->
											<a href="<?php echo base_url('Artikel/detail/' . $arc['slug']) ?>">
												<div class="d-sm-flex btn-download align-items-center d-none">
													<i class="fas fa-eye text-black mr-4 "></i>
													<h6 class="m-0">
														Lihat Artikel
													</h6>
												</div>
											</a>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- ======= Frequently Asked Questions Section ======= -->
	<section id="faq" class="faq">
		<div class="container" data-aos="fade-left">

			<div class="section-title">
				<h2>Pertanyaan yang sering ditanyakan</h2>
				<p>Kumpulan pertanyaan yang mungkin muncul dari calon user siswarajin.com.</p>
			</div>

			<div class="faq-list">
				<ul>
					<?php $list_faq = $this->db->get('t_faq')->result_array();
					$no = 1; foreach($list_faq as $faq): ?>
					<li data-aos="fade-up" data-aos-delay="200">
						<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-<?php echo $no ?>" class="collapsed"><?php echo $faq['question'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
						<div id="faq-list-<?php echo $no ?>" class="collapse" data-bs-parent=".faq-list">
							<p>
								<?php echo $faq['answer'] ?>
							</p>
						</div>
					</li>
					<?php $no++; endforeach; ?>
				</ul>
			</div>

		</div>
	</section><!-- End Frequently Asked Questions Section -->
	<section id="support " class="support mb-5 pb-4">
		<div class="container text-center " data-aos="fade-right">
			<div class="section-title">
				<h2>Supported by </h2>
			</div>
			<div class="row">
				<div class="col-5 col-md-4 text-center mx-auto">
					<img src="https://docs.midtrans.com/asset/image/main/midtrans-logo.png" alt="" class="img-fluid">
				</div>
				<div class="col-5 col-md-4 text-center mx-auto">
					<img src="https://bse.belajar.kemdikbud.go.id/images/logo-rumah-belajar.png" alt="" class="img-fluid">
				</div>
			</div>

		</div>
	</section>
	<!-- End Contact Section -->

</main><!-- End #main -->