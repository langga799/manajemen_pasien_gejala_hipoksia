<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hipoksia</title>

  {{-- CSS Build Mix --}}
  <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    {{-- Preloader Start --}}
    <div class="base-load preloader">
      <span></span>
    </div>
    {{-- Preloader End --}}

    {{-- Navbar Section Start --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">AmadO<span>2</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i><img src="{{ asset('storage/icon/bars-solid.svg') }}" alt="bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#how-it-works">Cara Kerja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-1" href="{{ route('login') }}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    {{-- Navbar Section End --}}

    {{-- Home Section Start --}}
    <section class="home" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-7">
            <div class="home-text mr-3">
              <h1 class="first-title">Prioritaskan</h1>
              <h1 class="second-title">Kesehatan Pasien</h1>
              <h4>Memantau kadar oksigen terlarut dalam darah dan mendapatkan hasil diagnosa
                berdasarkan hasil rekam medis pasien
              </h4>
              <div class="home-btn">
                <a href="#about" class="btn btn-1">Pelajari Lanjut</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5">
            <div class="home-img">
              <img src="{{ asset('storage/web-picture/home-website.png') }}" alt="home">
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- Home Section End --}}

    {{-- Section About Start --}}
    <section class="about section-padding" id="about">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title">
              <h2 class="first-heading">About</h2>
              <h2 class="second-heading">Tentang Sistem Kami</h2>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-5 d-flex justify-content-center">
            <div class="about-img">
              <img src="{{ asset('/storage/web-picture/about-website.png') }}" alt="">
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <div class="about-content">
              <h2>modernisasi pengalaman pada pasien</h2>
              <div class="content">
                <p class="first-about-p">Melakukan proses monitoring kadar oksigen terlarut dalam darah pada pasien melalui smartphone, yang menghasilkan rekam medis melalui analisis data di website</p>
                <p class="second-about-p">Hasil rekam medis digunakan sebagai identifikasi gejala hipoksia, kami akan memberikan rekomendasi penanganan melalui smartphone berdasarkan hasil pemantauan secara berkala.</p>
              </div>
              <div class="about-btn">
                <a href="#how-it-works" class="btn btn-1">Cara Kerja</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- Section About End --}}

    {{-- Section How it Works Start --}}
    <section class="how-it-works section-padding" id="how-it-works">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title">
              <h2 class="first-heading">How it works</h2>
              <h2 class="second-heading">Cara Kerja Sistem</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-12 d-flex flex-wrap justify-content-center">
            <div class="">
              <div class="item">
                <div class="circle"><span>1</span></div>
                <h4>Registrasi</h4>
                <p>Pasien melakukan pendaftaran akun
                  melalui aplikasi Pulseoximetry</p>
              </div>
            </div>
            <div class="">
              <div class="item">
                <div class="circle"><span>2</span></div>
                <h4>Lengkapi Data</h4>
                <p>Pasien melengkapi data pribadi
                  pada aplikasi sebelum melakukan monitoring</p>
              </div>
            </div>
            <div class="">
              <div class="item">
                <div class="circle"><span>3</span></div>
                <h4>Geolokasi</h4>
                <p>Pasien pasien mengaktifkan fitur 
                  geolokasi untuk mendapatkan lokasi pasien</p>
              </div>
            </div>
            <div class="">
              <div class="item">
                <div class="circle"><span>4</span></div>
                <h4>Monitoring</h4>
                <p>Pasien melakukan monitoring melalui 
                  sensor yang terintegrasi dengan 
                  smartphone dan web</p>
              </div>
            </div>
            <div class="">
              <div class="item">
                <div class="circle"><span>5</span></div>
                <h4>Pemantauan</h4>
                <p>Proses monitoring Spo2 dan Bpm 
                  dilakukan selama 10 menit 
                  selama 14 hari</p>
              </div>
            </div>
            <div class="">
              <div class="item">
                <div class="circle"><span>6</span></div>
                <h4>Diagnosa</h4>
                <p>Pasien mendapatkan hasil diagnosa dari hasil 
                  rekam medis yang dikelola instansi kesehatan.
                </p>
              </div>
            </div>
          </div>
          
          {{-- <div class="col-lg-12 mt-3 d-flex flex-row justify-content-center">
            <div class="row justify-content-center">
              
            </div>
          </div> --}}
        </div>
      </div>
    </section>
    {{-- Section How it Works End --}}

    {{-- Download App Section Start --}}
    <section class="download-app section-padding">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center">
          <div class="download-content">
            <h2>aplikasi kami telah tersedia</h2>
            <p>Aplikasi kami telah tersedia 
              untuk platform Android, download  sekarang melalui Google Playstore
            </p>
            <div class="btn-download">
              <a href="#" class="btn btn-1">Download</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 d-flex justify-content-center">
          <div class="img-download">
            <img src="{{ asset('/storage/web-picture/app-website.png') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    {{-- Download App Section End --}}

    {{-- Contact Section Start --}}
    <footer class="footer section-padding" id="contact">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="footer-title">
              <h2>AmadO<span>2</span></h2>
            </div>
          </div>
          <div class="col-md-8 d-flex justify-content-center">
            <div class="col">
              <h4>Alamat</h4>
              <p>Jalan Raya Jember No.KM13, Kawang, Labanasem, 
                Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68461</p>
            </div>
            <div class="col">
              <h4>Contact</h4>
              <p>(0333) 636780 <br>poliwangi.ac.id</p>
            </div>
            <div class="col">
              <h4>Vectors</h4>
              <p>Vectors creted by 
                vectorjuice</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    {{-- Contact Section End --}}
    
    
    <script src="{{ asset('/js/landing-page.js') }}"></script>

</body>

</html>
