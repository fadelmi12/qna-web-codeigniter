<style>
  body {
    /* min-height: 2000px; */
  }

  .jumbotron {
    padding-top: 6rem;
    background-color: #A1F4C0;
    border: transparent;
  }

  .main {
    padding-bottom: 12rem;
  }

  .nav-tabs .nav-link.active {
    background-color: #A1F4C0;
    color: white;
    border: 3px solid #A1F4C0;
  }

  .nav-tabs .nav-link {
    background-color: white;
    color: #A1F4C0;
    border: 3px solid white;
  }

  @media (max-width:576px) {
    .contact-text {
      font-size: 15px;
      font-style: bold;
    }

    .contact-span {
      font-size: 12px;
      /* font-style: bold; */
      color: blue;
      /* display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      text-transform: capitalize; */
    }

  }
</style>

<body>
  <section class="jumbotron text-center">
    <img class="rounded-circle img-thumbnail " src="https://www.gravatar.com/avatar/101b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid" alt="">
    <p class="lead mt-2">Deka Pramesta</p>
    <p>Programmer | Student</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,245.3C384,256,480,224,576,208C672,192,768,192,864,202.7C960,213,1056,235,1152,224C1248,213,1344,171,1392,149.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <section class="main">
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-items"><a class="nav-link active" data-bs-toggle="tab" href="#pertanyaan">Pertanyaan</a></li>
        <li class="nav-items"><a class="nav-link" data-bs-toggle="tab" href="#article">Artikel</a></li>
        <li class="nav-items"><a class="nav-link" data-bs-toggle="tab" href="#contact"> Contact</a></li>

      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="pertanyaan">
          <div class="row border g-0 rounded shadow-sm">
            <div class="col p-4 pertanyaan-profile">
              <h3 class="fw-bold mt-3">
                Daftar Pertanyaan
              </h3>
              <ul>
                <?php for ($a = 0; $a < 5; $a++) { ?>
                  <li class="p-3">
                    <div class="d-flex">
                      <div class="image-artikel" style="background-image: url('https://www.gravatar.com/avatar/102?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                      </div>
                      <div class="d-block w-100">
                        <div class="d-flex justify-content-between ">
                          <div class="user mb-2">
                            <div class="nama">
                              <h5>
                                Fadel Muhammad Irsyad
                              </h5>
                            </div>
                            <div class="upload mt-1">
                              <h6>
                                <span class="d-none d-sm-inline-block">Matematika ,</span> <a href="">16 Jam yang lalu</a>
                              </h6>
                            </div>
                          </div>
                          <div class="harga">
                            <h6>
                              <span style="margin-right:.3rem;">Rp</span>2.500
                            </h6>
                          </div>
                        </div>
                        <div class="pertanyaan">
                          <h5>
                            Berikan contoh peristiwa yang menggambarkan bahwa melalui komunikasi seseorang dapat
                            menghilangkan atau mengurangi perasaan tegang dalam dirinya!​
                          </h5>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php } ?>

              </ul>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="article">
          <div class="profile mb-5  " id="#profile" style="margin-top: -1rem;">
            <div class="row border g-0 rounded shadow-sm justify-content-center mt-3">
              <div class="col-xl-11 col-lg-11 col-md-10 col-sm-10 col-10">
                <h3 class="fw-bold mt-3">
                  Daftar Artikel
                </h3>
                <div class="profile-list mt-3">
                  <ul style="list-style: none;" class="m-0 p-0">
                    <?php for ($c = 0; $c < 6; $c++) { ?>
                      <li class="mb-3">
                        <div class="artikel-order p-3">
                          <h5>
                            LAPORAN PRAKTIKUM BIOLOGI UMUM BENTUK DAN STRUKTUR SEL
                          </h5>
                          <div class="d-flex mb-2">
                            <div class="image-activity w-100" style="background-image: url('https://www.gravatar.com/avatar/103?>b5695d974ac54d52c9b8f54ea8f86.jpg?s=115&d=monsterid')">
                            </div>
                            <div class="author">
                              Deka Pramesta
                            </div>
                          </div>

                          <div class="d-flex justify-content-between">
                            <div class="d-block">
                              <div class="d-flex mb-1">

                                <i class="fa fa-tag my-auto"></i>
                                <div class="tag">
                                  Kurikulum 2013, Pendidikan Guru Sekolah Dasar
                                </div>
                              </div>
                              <div class="d-flex">
                                <i class="fas fa-file-pdf my-auto"></i>
                                <div class="tag">
                                  16 Halaman, 2020
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="contact">
          <div class="row border g-0 rounded shadow-sm">
            <div class="col p-4">
              <h3>Contact</h3>
              <hr>
              <div class="row ms-1 mt-3 justify-content-start">
                <div class="col-xl-2 col-md-2 col-sm-3 col-4 ">
                  <h4 class="contact-text" style="font-size: 17px"> <b> No Hp </b> </h4>
                </div>
                <div class="col-xl-10 col-md-10 col-sm-9 col-8 ">
                  : <span class="contact-span" style="color: blue;"> 0895377941531 </span>
                </div>
                <div class="col-xl-2 col-md-2 col-sm-3 col-4 ">
                  <h4 class="contact-text" style="font-size: 17px"> <b> Email </b> </h4>
                </div>
                <div class="col-xl-10 col-md-10 col-sm-9 col-8 ">
                  : <span class="contact-span" style="color: blue;"> dekapramesta77@gmail.com </span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section class="about" style="background-color: #0099ff">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2 style="color: white">About Me</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center mt-3">
          <div class="col-4 text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem nostrum quam veritatis repellendus iste dolor?</div>
          <div class="col-4 text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem nostrum quam veritatis repellendus iste dolor?</div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#ffffff"
          fill-opacity="1"
          d="M0,192L34.3,202.7C68.6,213,137,235,206,202.7C274.3,171,343,85,411,85.3C480,85,549,171,617,213.3C685.7,256,754,256,823,234.7C891.4,213,960,171,1029,149.3C1097.1,128,1166,128,1234,138.7C1302.9,149,1371,171,1406,181.3L1440,192L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col mb-2 text-center">
            <h2>Project</h2>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          <div class="col-4 mb-3">
            <div class="card" style="width: 18rem">
              <img src="dekapramesta.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-4 mb-3">
            <div class="card" style="width: 18rem">
              <img src="dekapramesta.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-4 mb-3">
            <div class="card" style="width: 18rem">
              <img src="dekapramesta.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-4 mb-3">
            <div class="card" style="width: 18rem">
              <img src="dekapramesta.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-4 mb-3">
            <div class="card" style="width: 18rem">
              <img src="dekapramesta.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
</body>