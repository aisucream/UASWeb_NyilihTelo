<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- ---- -->

  <!-- CSS Native -->
 <link rel="stylesheet" href="assets/dist/css/landing page/style.css">
  <!-- ---- -->

  <!-- Logo -->
  <link rel="icon" type="png" href="../assets/images/dashboard/logo.png" />
  <!-- ---- -->

  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap" rel="stylesheet" />
  <!-- ---- -->

  <title>Landing Page | Nyilih Te-Lo</title>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/images/landing page/logo.png" alt="" width="30" class="d-inline-block align-text-top me-1" />
        Nyilih Te-Lo
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-2">
            <a class="nav-link" aria-current="page" href="#layanan">Layanan</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="#asset">Asset</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="#tutorial">Cara Pinjam</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link" href="#tentang">Tentang Kami</a>
          </li>
        </ul>

        <div>
          <a class="link-login" href="pages/login.php"><button class="button-login">Masuk</button></a>
        </div>

      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Section -->
  <section id="hero">
    <div class="container h-100">
      <div class="row h-100 justify-content-center">
        <div class="col-md-8 justify-content-center text-center hero-tag my-auto">
          <h1>Peminjaman jadi mudah dengan Nyilih Te-Lo</h1>
          <p>
            Kalian ingin meminjam
            <span class="fw-bold">Asset ITTELKOM</span> berupa barang,
            ruangan, atau lab? Cari yang kalian mau!
          </p>
          <a href="pages/login.php"><button class="button-pr">Pinjam Sekarang</button></a>
        </div>
      </div>

      <img src="assets/images/landing page/it-telkom-surabaya.png" alt="" class="position-absolute end-0 bottom-0 img-back" />
    </div>
  </section>
  <!-- Hero End -->

  <!-- Layanan Section -->
  <section id="layanan">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>Layanan Kami</h2>
          <span class="sub-title">Perbaikan layanan demi kenyamanan</span>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-4 justify-content-center text-center">
          <div class="card-layanan card-1">
            <img src="assets/images/landing page/Layanan/layanan1.png" alt="" width="200px" />
            <p class="mt-3">Peminjaman Asset semakin cepat semakin baik</p>
          </div>
        </div>

        <div class="col-md-4 justify-content-center text-center">
          <div class="card-layanan">
            <img src="assets/images/landing page/Layanan/layanan2.png" alt="" width="200px" />
            <p class="mt-3">Monitoring asset yang dipinjam gk perlu ribet</p>
          </div>
        </div>

        <div class="col-md-4 justify-content-center text-center">
          <div class="card-layanan card-2">
            <img src="assets/images/landing page/Layanan/layanan3.png" alt="" width="200px" />
            <p class="mt-3">
              Konfirmasi peminjaman gk harus capek-capek dateng ke kampus
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Layanan end -->

  <!-- Asset Section -->
  <section id="asset" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">Kami Menyediakan Peminjaman</h1>
          <span class="sub">Fasilitas yang dapat kalian pinjam dan gunakan</span>
        </div>

        <div class="col-10 mx-auto mt-5">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="barang-tab" data-bs-toggle="tab" data-bs-target="#barang" type="button" role="tab" aria-controls="barang" aria-selected="true">
                Barang Logistik
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="kelas-tab" data-bs-toggle="tab" data-bs-target="#kelas" type="button" role="tab" aria-controls="kelas" aria-selected="false">
                Ruang Kelas
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="lab-tab" data-bs-toggle="tab" data-bs-target="#lab" type="button" role="tab" aria-controls="lab" aria-selected="false">
                Ruang Lab
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="aula-tab" data-bs-toggle="tab" data-bs-target="#aula" type="button" role="tab" aria-controls="aula" aria-selected="false">
                Aula
              </button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="barang" role="tabpanel" aria-labelledby="barang-tab">
              <div class="flex_items">
                <img src="assets/images/landing page/jenis/Barang.png" alt="" width="200px" />
                <div class="selection-items">
                  <h1>Peminjaman Barang Logistik</h1>
                  <p>
                    Kami menyediakan banyak barang seperti kamera, sound
                    system dan lain-lain, untuk keperluan kalian dalam bekarya
                    atau mengadakan kegiatan kalian dapat meminjam nya secara
                    gratis
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
              <div class="flex_items">
                <img src="assets/images/landing page/jenis/Kelas.png" alt="" width="200px" />
                <div class="selection-items">
                  <h1>Peminjaman Ruang Kelas</h1>
                  <p>
                    Kami menyediakan peminjaman ruang kelas untuk anda belajar
                    ataupun berkegiatan dengan mudah dan gratis
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
              <div class="flex_items">
                <img src="assets/images/landing page/jenis/Lab.png" alt="" width="200px" />
                <div class="selection-items">
                  <h1>Peminjaman Laboratorium</h1>
                  <p>
                    Kami menyediakan Peminjaman laboratorium untuk kalian
                    melakukan riset, belajar, ataupun menikmati fasilitas lab
                    dengan gratis
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="aula" role="tabpanel" aria-labelledby="aula-tab">
              <div class="flex_items">
                <img src="assets/images/landing page/jenis/Aula.png" alt="" width="200px" />
                <div class="selection-items">
                  <h1>Peminjaman Aula</h1>
                  <p>
                    Kami menyediakan peminjaman aula untuk kalian melakukan
                    kegiatan yang membutuhkan ruang yang luas untuk menampung
                    peserta seperti seminar ataupun acara lain-nya
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Asset End -->

  <!-- Tutorial Section -->
  <section id="tutorial">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>Tata Cara Peminjaman</h2>
          <span class="sub-title">Prosedur supaya gampang monitoring</span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">1</h1>
                <h5 class="title-items">
                  Memilih Barang/Asset yang dipinjam
                </h5>
              </div>
              <p class="desc">
                Pilihlah barang/asset sesuai yang anda butuhkan
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-1.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">2</h1>
                <h5 class="title-items">
                  Mendownload berkas yang sudah disediakan
                </h5>
              </div>
              <p class="desc">
                Berkas untuk peminjaman sudah kami persiapkan, download agar
                mudah prosesnya
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-2.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">3</h1>
                <h5 class="title-items">
                  Isi formulir untuk proses peminjaman
                </h5>
              </div>
              <p class="desc">
                Isilah formulir sesuai ketentuan agar pendataan dala
                monitoring lebih mudah dan cepat
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-3.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">4</h1>
                <h5 class="title-items">
                  Tunggu proses validasi dari staff yang bekerja
                </h5>
              </div>
              <p class="desc">
                Kami memproses permintaan anda, mengecheck kelengkapan untuk
                proses peminjaman
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-4.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">5</h1>
                <h5 class="title-items">
                  Konfirmasi dan ambil barang secara offline
                </h5>
              </div>
              <p class="desc">
                pengambilan barang harus secara offline dan konfirmasi ke
                staff yang bekerja
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-5.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">6</h1>
                <h5 class="title-items">
                  Gunakan dan jaga Asset/barang yang dipinjam
                </h5>
              </div>
              <p class="desc">
                Kami percaya kalian menggunakan asset / barang yang
                dipinjamkan dengan baik dan benar
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-6.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">7</h1>
                <h5 class="title-items">Kembalikan barang sesuai waktu</h5>
              </div>
              <p class="desc">
                Jika sudah selesai digunakan/sudah waktunya dikembalikan,
                kembalikanlah barang dengan keadaan utuh
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-5">
          <div class="card p-3">
            <img src="assets/images/landing page/Ilustrasi Tata Cara/Illustrasi-7.png" alt="" />
            <div class="card-body">
              <div class="header-items">
                <h1 class="number-items">8</h1>
                <h5 class="title-items">Proses validasi pengembalian</h5>
              </div>
              <p class="desc">
                Tunggu validasi pengembalian barang mu sdan setelah itu kalian
                bebas meminjam barang/asset lagi
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Tutorial End -->

  <section id="tentang">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2>Tim Kami dan Tentang Kami</h2>
          <span class="sub-title">Tak kenal maka tak sayang, ini kami tim logistik</span>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="row mt-5">
            <div class="col-md-12 box-team">
              <img src="assets/images/landing page/profile/Rectangle 10.png" alt="" width="200px" height="200px" style="border-radius: 10px 0 0 0" />
              <div class="box-profile">
                <p>Arcadius Obaja Naarie</p>
                <span>Admin (Web Developer)</span>
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-12 box-team">
              <img src="assets/images/landing page/profile/Rectangle 11.png" alt="" width="200px" height="200px" />
              <div class="box-profile">
                <p>Bagus Febryanto</p>
                <span>Kepala Staff Logistik</span>
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-12 box-team">
              <img src="assets/images/landing page/profile/Rectangle 12.png" alt="" width="200px" height="200px" />
              <div class="box-profile">
                <p>Rizki Eka Putra</p>
                <span>Penanggung Jawab Asset Barang</span>
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-12 box-team">
              <img src="assets/images/landing page/profile/Rectangle 17.png" alt="" width="200px" height="200px" style="border-radius: 0 0 0 10px" />
              <div class="box-profile">
                <p>Adyan Izza M.A</p>
                <span>Penanggung Jawab Asset Ruangan</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-5">
          <div class="box-desc">
            <p>Tentang Kami</p>
            <span>Staff logistik adalah suatu pekerjaan yang memiliki peranan
              penting bagi perusahaan sebab berkaitan dengan pengelolaan
              produk dan distribusi. <br /><br />
              Lebih dari itu, staff logistik juga harus mencapai target yang
              telah diberikan oleh supervisor logistik. Demi mencapai target
              tersebut, seorang staff logistik perlu menjalankan beberapa
              fungsi manajemen, mulai dari planning, actuating, organizing,
              hingga controlling.
              <br /><br />
              Selain itu, staff logistik juga harus membangun hubungan baik
              dengan divisi lain yang berkaitan dengan operasional logistik
              dan distribusi di perusahaannya serta pihak eksternal seperti
              vendor logistik. Semua ini dilakukan guna mendukung kelancaran
              pekerjaan.
              <br /><br />
              Secara struktural, posisi staff logistik adalah berada di bawah
              naungan manajer logistik dan distribusi. Mereka juga harus
              memberikan laporan serta menyampaikan berbagai kendala yang
              mungkin terjadi selama proses pemenuhan kebutuhan konsumen
              kepada supervisor logistik.
              <br /><br />
              Kami staff logistik telkom menyediakan web ini untuk mempermudah
              kalian dalam memanajemen barang dan memonitoring barang supaya
              kalian dapat terus percaya dalam peminjaman barang ke kami</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->\
  <footer class="d-flex align-items-center mt-5">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <a class="navbar-brand" href="#">
              <img src="assets/images/landing page/logo.png" alt="" width="30" class="d-inline-block align-text-top me-1" />
              Nyilih Te-Lo
            </a>
          </div>

          <div class="col-md-5">
            <p>“Barang yang dipinjam adalah bukti ikatan perjanjian kita”</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <span>©copyright2022-NyilihTeLo</span>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end -->

  <!-- JS Native -->
  <script src="assets/dist/js/landing.js"></script>
  <!-- ----------- -->

  <!-- JS Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- ----------- -->
</body>

</html>