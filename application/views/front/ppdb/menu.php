
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ppdb</title>

  <!-- Custom fonts for this theme -->
  <link href="<?= base_url('assets/front/ppdb/fontawesome-free/css/all.min.css'); ?> " rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?= base_url('assets/front/ppdb/'); ?>css/freelancer.min.css" rel="stylesheet">

  <!-- cutom -->
   <link href="<?= base_url('assets/front/styles/'); ?>ver2/tambahan.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->


  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">PPDB ONLINE</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= base_url(); ?>">HOME</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#informasi">INFORMASI</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">JADWAL</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Masthead -->
  <header class="masthead text-white text-center" >
    <div class="container d-flex align-items-center flex-column">

      

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="<?= base_url('assets/images/config/pp1.png') ?>" alt="">

       <!-- Masthead Heading -->
      <h1 style="color: black;" class="masthead-heading text-uppercase mb-0">PPDB ONLINE<br>DAARUL QUR'AN</h1><br>

     

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div style="background-color: black !important;" class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i style="color: black !important;" class="fas fa-star"></i>
        </div>
        <div style="background-color: black !important;" class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p style="color: black !important;" class="masthead-subheading font-weight-light mb-0">Pondok Pesantren - Madrasah Tsanawiyah - Madrasah Aliyah</p>

    </div>
  </header>

 

<!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="informasi">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Informasi</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto text-justify">
          <p class="lead">Daarul Qur'an membuka pendaftaran peserta didik baru secara online diharapkan proses pendaftaran dapat berjalan cepat dan dapat dilakukan kapanpun dimanapun. selain online daarul qur'an juga menyediakan pendaftaran offline (langsung ke tempat).</p>
        </div>
        <div class="col-lg-4 mr-auto text-justify">
          <p class="lead">Pada tahun 2025 Daarul Qur'an menjadi sekolah pencetak generasi Rabbani, yang mengedepankan adab, ilmu dan berdaya saing menghadapi tantangan zaman</p>
        </div>
      </div>

      

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="mr-1 btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
          <i class="fas fa-download mr-2"></i>
          Download Panduan
        </a>
         <a class="mr-1 mt-1 btn btn-xl btn-outline-light" href="<?= base_url('ppdb/pendaftaran'); ?>">
          <i class="fas fa-download mr-2"></i>
          Pendaftaran
        </a>
         <a class="mr-1 mt-1 btn btn-xl btn-outline-light" href="<?= base_url('ppdb/login'); ?>">
          <i class="fas fa-download mr-2"></i>
          Login Calon siswa
        </a>
      </div>

    </div>
  </section>

<!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->

      <h2 style="color: black !important;" class="page-section-heading text-center text-uppercase text-secondary mb-0">Jadwal PPDB</h2>

     <!-- Icon Divider -->
      <div class="divider-custom">
        <div style="background-color: black !important;" class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i style="color: black !important;" class="fas fa-star"></i>
        </div>
        <div style="background-color: black !important;" class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <table class="table borderd">
            <thead>
              <th>No</th>
              <th>Informasi</th>
              <th>Waktu</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Gelombang I</td>
                <td>1 - Februari 2020 s/d 30 April 2020 </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Tes Masuk</td>
                <td>30 April 2020 (Tempat: Ponpes Daarul Qur'an)</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Gelombang II</td>
                <td>1 - Mei - 2020 s/d 4 - Juli - 2020</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Tes Masuk</td>
                <td>6 - Juli - 2020 (Tempat: Ponpes Daarul Qur'an)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>




  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Daarul Qur'an 2020</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/front/ppdb/'); ?>jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/front/ppdb/'); ?>bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url('assets/front/ppdb/'); ?>jquery-easing/jquery.easing.min.js"></script>

 

  <!-- Custom scripts for this template -->
  <script src="<?= base_url('assets/front/ppdb/'); ?>js/freelancer.min.js"></script>

</body>

</html>
