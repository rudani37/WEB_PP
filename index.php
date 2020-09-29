<?php
include 'admin/fungsi.php';
error_reporting(0);
$sqlslide = "select * from beranda order by id_beranda";
$strorg = "select * from struktur_organisasi order by id_anggota";
$tenah = "select * from tenaga_ahli order by id_tenaga_ahli ASC";
$pry = "select * from proyek order by id_proyek DESC";
$data_kontak = query("select * from kontak order by id_kontak ASC");
$data_visimisi = query("select * from visimisi order by id_visimisi ASC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PT Harapan Indah Jaya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


   <style type="text/css">
  img.bingkais {
  padding:5px;
  background-color:#ccc;
  border-radius:20px;
  }
  </style>

    <!-- Bagian css -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/ilmudetil.css">
  <!--<link rel='stylesheet' href='assets/css/jquery-ui-custom.css'>-->
  
  
  <!-- Akhir dari Bagian css -->
  <!-- Bagian js -->
  <script src='assets/js/jquery-1.10.1.min.js'></script>       
    
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- akhir dari Bagian js -->

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1> <a href="#intro"><img src="img/logo.png" alt="" title="" style="width:40px; height: 45px;" /></a> </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
      
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Beranda</a></li>
          <li><a href="#about">Visi Misi</a></li>
          <li><a href="#services">Daftar Tenaga Ahli</a></li>
          <li><a href="#portfolio">Proyek</a></li>
          <li><a href="#team">Struktur Organisasi</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="admin/login.php"><img src="admin/icon/admin.png" title="admin" width="18" height="18" /></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Beranda
  ============================-->
  <section id="intro">

    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">

          <?php
               if($res = $konek->query($sqlslide)) {
                $x = 0;
                while ($row = $res->fetch_assoc()) {
               if($x==0) $aktif = "active";
                else $aktif = '';
        ?>

          <div class="carousel-item <?php echo $aktif?> ">
            <div class="carousel-background"><img src="./image/beranda/<?php echo $row["foto_beranda"];?> "></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?php echo $row['isi']; ?></h2>
                <p></p>
              </div>
            </div>
          </div>
 
       <?php 
            $x++;
          } // tutup while
        } // tutup if
         ?>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->
  <main id="main">

  
    <!--==========================
      Visimisi
    ============================-->
     <?php
          
          $data2 = mysql_fetch_array($data_visimisi)
          ?>
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Visi & Misi</h3>
          <p>Visi & Misi memberikan perusahaan tujuan sehingga dapat dengan kukuh berusaha mencapai sasaran yang signifikan. Tanpa adanya misi atau tujuan, sukses dalam jangka panjang tidak memungkinkan bagi entitas bisnis manapun. </p>
        </header>

        <div class="row about-cols">
       
          <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visi</a></h2>
              
                <?php echo $data2['visi']; ?>
            
            </div>
          </div>

           <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi</a></h2>
             
               <?php echo $data2['misi']; ?>
            
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Daftar Tenaga Ahli
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Daftar Tenaga Ahli</h3>
          <p>Tenaga Ahli Konstruksi Indonesia yang selanjutnya disebut Tenaga Ahli adalah tenaga dengan sertifikat keahlian berdasarkan klasifikasi dan kualifikasi yang ditetapkan sesuai dengan ketentuan peraturan perundang-undangan tentang jasa konstruksi.</p>
        </header>

        <div class="row">

          <?php
               if($res = $konek->query($tenah)) {
                $x = 0;
                while ($row = $res->fetch_assoc()) {
               if($x==0) $member = "member";
                else $member = '';
          ?>

          <div class="col-lg-3 col-md-6 wow fadeInLeft">
            <div class="thumbnail"> 
              <img src="./image/tenaga_ahli/<?php echo $row["foto_tenaga_ahli"] ?>" class="img-fluid" alt="" style="width:250px; height: 250px;">
              <div class="caption"> 
                  <h5><p class="text-center"><?php echo $row["nama_lengkap"] ?></p></h5>
                  <span><p class="text-center"><?php echo $row["keahlian"] ?></p></span>
                  </div>
              </div>
          </div>


         <?php 
            $x++;
          } // tutup while
        } // tutup if
         ?>


        </div>

      </div>
    </section><!-- #services -->


    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Call To Action</h3>
        <p> PT Harapan Indah Jaya adalah perusahaan yang bepusat di Provinsi Kalimatan Tengah kota Palangka Raya yang berfokus pada bidang kontruksi disertai dengan tenaga ahli berpengalaman yang mengikuti proyek pemerintah dengan cara berpatisipasi melalui lelang LPSE.</p>
        <a class="cta-btn" href="#">Kembali ke Beranda</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Proyek
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Proyek</h3>
        </header>


        <div class="row portfolio-container">

           <?php
               if($res = $konek->query($pry)) {
                $x = 0;
                while ($row = $res->fetch_assoc()) {
               if($x==0) $member = "member";
                else $member = '';
          ?>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInRight">
            <div class="portfolio-wrap">
              <figure>
                <img src="./image/proyek/<?php echo $row["foto"] ?>" class="img-fluid" alt="" style="width:350px; height: 250px; ">
                <a href="./image/proyek/<?php echo $row["foto"] ?>" data-lightbox="portfolio" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              </figure>
              <div class="portfolio-info" style="padding-top: 10px;">
                <h4><?php echo $row["nama_proyek"] ?></h4>
               <?php echo $row["nilai_proyek"] ?>
                <?php echo $row["deskripsi"] ?>
              </div>
            </div>
          </div>

           <?php 
            $x++;
          } // tutup while
        } // tutup if
         ?>

        
        </div>

      </div>
    </section><!-- #proyek -->
  
    <!--==========================
      Struktur Organisasi
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Struktur Organisasi</h3>
          <p>Struktur Organisasi adalah suatu susunan dan hubungan antara tiap bagian serta posisi yang ada pada suatu perusahaan dalam menjalankan kegiatan operasional untuk mencapai tujuan yang di harapakan dan di inginkan.</p>
        </div>

        <div class="row">
          <?php
               if($res = $konek->query($strorg)) {
                $x = 0;
                while ($row = $res->fetch_assoc()) {
               if($x==0) $member = "member";
                else $member = '';
        ?>

          <div class="col-lg-3 col-md-6 wow fadeInUp">
          <div class="thumbnail"> 
              <img src="./image/struktur_organisasi/<?php echo $row["foto"] ?> "  style="width:250px; height: 250px;">
             <div class="caption"> 
                  <h4><p class="text-center"><?php echo $row['nama_lengkap'] ?></p></h4>
                  <span><p class="text-center"><?php echo $row['jabatan'] ?> </p></span>
                   </div>
               </div>
          </div>

         <?php 
            $x++;
          } // tutup while
        } // tutup if
         ?>

        </div>

      </div>
    </section><!-- #team -->
    <!--==========================
      Kontak
    ============================-->
    <?php
            $no = 1;
            while ($data6 = mysql_fetch_array($data_kontak)) {
          ?>
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Kontak</h3>
          <p>Hubungi kami jika anda mempunyai persoalan dengan pembuatan SKA atau SKT. Apakah anda seorang yang mempunyai proyek, konsultan, kontraktor, akademisi, ataupun mahasiswa. Hubungi kami segera dan kami akan tahu bagaimana bisa membantu anda</p>
        </div>

        <div class="row contact-info">
          

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address> <?php echo $data6['alamat'];?> </address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telp / Fax</h3>
              <p><a href="tel:+155895548855"><?php echo $data6['telepon']; ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com"><?php echo $data6['email']; ?></a></p>
            </div>
          </div>

        </div>

       
    </section><!-- #contact -->
     
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>PT HIJ</h3>
            <p>PT Harapan Indah Jaya adalah perusahaan yang bepusat di Provinsi Kalimatan Tengah kota Palangka Raya yang berfokus pada bidang kontruksi disertai dengan tenaga ahli berpengalaman yang mengikuti proyek pemerintah dengan cara berpatisipasi melalui lelang LPSE</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Navigasi Web</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#intro">Beranda</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Visi Misi</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Daftar Tenaga Ahli</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#portfolio">Proyek</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#team">Struktur Organisasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi Kami</h4>
              <strong>Alamat   :</strong> <?php echo $data6['alamat']; ?><br>
              <strong>Telepon  :</strong> <?php echo $data6['telepon']; ?><br>
              <strong>Email    :</strong> <?php echo $data6['email']; ?><br>
              <?php
               }
               ?>
            </p>
          </div>

           <div class="col-lg-3 col-md-6 footer-contact">
            <h4>kalender</h4>
          <?php include 'kalender.php' ?>


         

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2018 <strong>PT Harapan Indah Jaya</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=PT HIJ
        -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

   <script type="text/javascript">var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-3674746-17']);  _gaq.push(['_trackPageview']); (function() {  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })(); </script>
<!-- </body> --></body>
</html>
