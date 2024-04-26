<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asrama Telkom University</title>
  
  <!-- Memuat Bootstrap CSS dari CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!-- Konten Anda akan ditambahkan di sini -->

  <!-- Memuat Bootstrap JavaScript (dan Popper.js jika diperlukan) dari CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

    <style>
        /* Custom styles for this template */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #000;
            overflow-x: hidden;
            margin: 0;
        }

        .hero-section {
            min-height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url('gambar/hero.png') center/cover;
            color: #fff;
            padding: 20px;
            margin-bottom: 100px;
        }

        .btn-login,
        .btn-register {
            display: inline-block;
            padding: 10px 25px;
            margin: 10px;
            font-weight: normal;
            border: 1px solid #fff; /* Bingkai putih */
            border-radius: 40px;
            text-decoration: none; /* Menghapus underline default pada tautan */
            transition: background-color 0.3s ease, color 0.3s ease; /* Efek transisi pada hover */
        }

        .btn-login {
            background-color: #D92E2D;
            color: #fff;
            border: none; /* Hilangkan border pada tombol Login */
        }

        .btn-register {
            background-color: transparent;
            color: #fff;
            border: 1px solid #fff; /* Tetapkan border putih pada tombol Register */
        }

        .btn-login:hover {
            /* Tetap warna latar merah dan teks putih saat dihover */
            background-color: #D92E2D;
            color: #fff;
        }

        .btn-register:hover {
            /* Mengubah warna latar putih dan teks merah saat dihover */
            background-color: #fff;
            color: #D92E2D;
            border-color: #fff; /* Ubah border menjadi merah saat dihover */
        }

        .about-section {
            padding: 50px 0;
        }

        .section-divider {
            margin-bottom: 100px;
        }

        footer {
            padding: 50px 0;
            background-color: #D92E2D;
            color: #fff;
            min-height: 300px;
        }

        .facility-container {
            overflow-x: auto;
            white-space: nowrap;
            width: 100%;
            height: 400px;
            margin-bottom: 100px;
            padding: 20px 0;
        }

        .facility-card {
            display: inline-block;
            width: 300px;
            margin-right: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        .facility-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Facility Navigation Styles */
        .facility-nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .facility-nav-btn {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            outline: none;
            transition: color 0.3s ease;
        }

        .facility-nav-btn.active {
            color: #D92E2D; /* Highlight color for active button */
            border-bottom: 2px solid #D92E2D; /* Red underline for active button */
        }

        /* Facility Content Styles */
        .facility-content {
            display: none;
        }

        .facility-content.active {
            display: block;
        }

    </style>

<style>
    /* Mengatur ukuran maksimum gambar di dalam carousel */
    .carousel-item img {
            max-width: 300%; /* Lebar maksimum adalah 100% dari container */
            max-height: 800px; /* Tinggi maksimum adalah 300px (sesuaikan dengan kebutuhan Anda) */
            width: auto; /* Lebar otomatis sesuai dengan proporsi gambar */
            height: auto; /* Tinggi otomatis sesuai dengan proporsi gambar */
        }

        /* Mengatur posisi teks di bawah gambar */
        .carousel-caption {
            text-align: center;
            background: rgba(0, 0, 0, 0.5); /* Warna latar belakang semi-transparan untuk teks */
            color: #fff; /* Warna teks */
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px; /* Padding untuk teks */
        }

        /* Aturan CSS untuk tombol navigasi */
    .facility-nav-btn {
        margin: 5px; /* Berikan sedikit ruang di sekitar tombol */
        padding: 10px 20px; /* Atur padding untuk membuat tombol lebih besar */
        font-size: 16px; /* Ukuran font */
    }

    /* Aturan CSS untuk layar dengan lebar maksimum 768px (perangkat ukuran kecil dan di atasnya) */
    @media (max-width: 768px) {
        .facility-nav-btn {
            width: 100%; /* Atur lebar tombol menjadi 100% dari lebar div */
            margin: 5px 0; /* Ubah margin agar tombol berada dalam satu baris */
        }
    }
    
</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="gambar/logo telu.png" alt="Telkom Dormitory" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTentang" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tentang
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTentang">
        <li><a class="dropdown-item" href="{{ asset('pdf/Tata-Tertib-Asrama-Universitas-Telkom.pdf') }}">Aturan Asrama</a></li>
        <li><a class="dropdown-item" href="#facility-content">Asrama</a></li>
    </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perizinan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kalender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dorm Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Helpdesk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Check In / Out
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Check In</a></li>
                            <li><a class="dropdown-item" href="#">Check Out</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pemberitahuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ubah Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="display-2">Selamat Datang di Asrama Telkom University</h1>
        <h2 class="display-5">Menyambut Penghuni Baru dengan Kebersamaan dan Antusiasme!</h2>
        <p class="lead my-4">
            "Mari kita jaga disiplin dan tata tertib di asrama dengan melakukan proses login dan register saat Anda tinggal sementara di sini. Langkah kecil ini membantu kami memantau keberadaan penghuni dan memastikan segala sesuatunya berjalan dengan baik. Terima kasih atas perhatiannya!"
        </p>
       <div class="d-grid gap-3 d-md-flex justify-content-md-center">
    <a href="#" class="btn btn-lg btn-login me-md-2">Masuk</a>
    <a href="#" class="btn btn-lg btn-register">Daftar</a>
</div>

    </section>

<!-- Section 2: About Asrama -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('gambar/image 3.png') }}" class="img-fluid rounded mb-3" alt="About Asrama" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <h2 class="display-4 mb-4">Tentang Asrama Telkom University</h2>
                <p>Asrama Telkom University memiliki letak yang sangat strategis karena dekat dengan gedung kuliah umum (Gd. Tokong Nanas 10 lantai). Asrama ini menjadi salah satu sarana kampus yang dibangun untuk tempat tinggal Mahasiswa/i baru pada 1 tahun pertama masa perkuliahan di Telkom University sehingga para orang tua tidak perlu khawatir meninggalkan putra dan putri untuk melanjutkan studinya. Setiap gedung asrama memiliki kakak asrama yang biasa disebut sebagai Senior Residents serta Helpdesk di setiap lantai dasar gedung sehingga kenyamanan dan keamanan akan tetap terjaga. Selain itu, kegiatan pembinaan terhadap mahasiswa/i yang tinggal di asrama akan diawasi secara rutin oleh Direktorat Kemahasiswaan Telkom University.</p>
                <!-- Menggunakan link untuk menampilkan modal -->
                <a href="#" id="lihatDenahLink" class="text-danger" data-bs-toggle="modal" data-bs-target="#denahModal">Lihat Denah</a>
            </div>
        </div>
    </div>
</section>

<!-- Modal untuk gambar denah -->
<div class="modal fade" id="denahModal" tabindex="-1" aria-labelledby="denahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="denahModalLabel">Denah Kawasan Telkom University</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Gambar denah -->
                <img src="{{ asset('gambar/Denah.png') }}" class="img-fluid rounded mb-3" alt="Denah Asrama">
            </div>
        </div>
    </div>
</div>


   <!-- Section 3: Facilities -->
<section id="facility-section" class="bg-light py-5">
    <div class="container">
        <h2 class="display-4 text-center mb-5">Jelajahi Fasilitas Terbaik Telkom University</h2>
        <p class="lead text-center mb-4">Fasilitas Lengkap untuk Pengalaman Tinggal yang Nyaman di Asrama Telkom</p>

<!-- Navigation for Facility Categories -->
<div class="facility-nav">
    <button class="facility-nav-btn active" onclick="showFacility('asrama')">Asrama</button>
    <button class="facility-nav-btn" onclick="showFacility('olahraga')">Olahraga & Kesehatan</button>
    <button class="facility-nav-btn" onclick="showFacility('makanan')">Makanan & Rekreasi</button>
    <button class="facility-nav-btn" onclick="showFacility('area')">Area Siswa</button>
    <button class="facility-nav-btn" onclick="showFacility('transportasi')">Transportasi</button>
</div>



        <!-- Content for each Facility Category -->
        <div id="facility-content">
            <!-- Facility Content: Asrama -->
            <div id="facility-asrama" class="facility-content active">
                
                <p>
                    Universitas Telkom memastikan pengalaman awal mahasiswa barunya benar-benar "Aman dan Nyaman". Sebagai bagian dari pembentukan karakter, para mahasiswa tahun pertama diwajibkan tinggal di asrama kampus selama satu tahun akademik. Suasana asri menyambut dengan tersedianya 18 gedung asrama yang dilengkapi berbagai fasilitas pendukung. Di lingkungan ini, mahasiswa bukan hanya mendapatkan tempat tinggal yang layak, tetapi juga bekal pengalaman berharga untuk membentuk kepribadian yang tangguh dan mandiri menghadapi kehidupan kampus dan masa depan.
                </p>
                
                <div class="container">
    <h2 class="text-center mt-5 mb-4">Gedung Asrama</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

    <!-- Slide 1: Gedung Asrama Putri -->
<div class="carousel-item active">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4 h-100">
                <img src="{{ asset('gambar/gedung 1.png') }}" alt="asrama putri" class="card-img-top">
                <div class="card-header" style="background-color: #D92E2D; color: white; text-align: center;">
                    <h4 class="mb-0">Gedung Asrama Putri</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Gedung Asrama Putri adalah fasilitas serupa yang ditujukan khusus bagi mahasiswa perempuan. Gedung ini juga terdiri dari beberapa bangunan dengan nama lengkap dan kode gedung yang berbeda, antara lain Gedung Dana (B01), Gedung Dona (B02), Gedung Enggano (B03), Gedung Enu (B04), Gedung Fani (B05), Gedung Fanildo (B06), Gedung Sebelas (A11), dan Gedung Duabelas (A12).</p>
                </div>
            </div>
        </div>
        <!-- asrama putra -->
        <div class="col-md-6">
            <div class="card mb-4 h-100">
                <img src="{{ asset('gambar/gedung2.png') }}" alt="asrama putra" class="card-img-top">
                <div class="card-header" style="background-color: #D92E2D; color: white; text-align: center;">
                    <h4 class="mb-0">Gedung Asrama Putra</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Gedung Asrama Putra adalah kompleks fasilitas hunian yang diperuntukkan bagi mahasiswa laki-laki. Gedung ini terdiri dari beberapa bangunan yang menyediakan tempat tinggal bagi mahasiswa. Setiap bangunan memiliki nama lengkap serta kode gedung, seperti Gedung Laag (A01), Gedung Larat (A02), Gedung Leti (A03), Gedung Liki (A04), Gedung Lingian (A05), Gedung Liran (A06), Gedung Sambit (A07), Gedung Sebetul (A08), Gedung Sekatung (A09), dan Gedung Sekel (A10).</p>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- Slide 2: Lobby Asrama -->
        <div class="carousel-item">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 h-100">
                        <img src="{{ asset('gambar/lobby.png') }}" alt="Lobby Asrama" class="card-img-top">
                        <div class="card-header" style="background-color: #D92E2D; color: white; text-align: center;">
                            <h4 class="mb-0">Lobby Asrama</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lobby Asrama merupakan area publik yang berada di lantai masuk atau area utama sebuah asrama. Biasanya, lobby ini berfungsi sebagai tempat pertemuan, pusat informasi, atau area resepsi. Di sini, penghuni asrama dapat berkumpul, bersosialisasi, atau menunggu tamu. Lobby juga sering dilengkapi dengan kursi, meja, dan fasilitas lainnya untuk kenyamanan penghuninya.</p>
                        </div>
                    </div>
                </div>
                <!-- Kamar Asrama -->
                <div class="col-md-6">
                    <div class="card mb-4 h-100">
                        <img src="{{ asset('gambar/fasilitas-kamar.jpg') }}" alt="Kamar Asrama" class="card-img-top">
                        <div class="card-header" style="background-color: #D92E2D; color: white; text-align: center;">
                            <h4 class="mb-0">Kamar Asrama</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Setiap kamar mahasiswa dilengkapi dengan satu set tempat tidur lengkap, termasuk kasur, sprei, dan selimut, serta satu set bantal dan linen tempat tidur. Di dalam kamar juga terdapat lemari dan rak buku untuk penyimpanan pribadi. Setiap ruangan dilengkapi dengan kamar mandi pribadi yang dilengkapi dengan perlengkapan mandi seperti sabun, sampo, dan handuk. Selain itu, terdapat juga sistem token elektronik untuk pembayaran dan pengaturan akses.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tombol Navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>




    <!-- Deskripsi Fasilitas Kamar Asrama -->
    <div class="mt-4">
        <h2 class="text-center mb-4">Fasilitas Kamar Asrama</h2>
        <ul class="list-group">
            <li class="list-group-item">Kasur</li>
            <li class="list-group-item">Bantal</li>
            <li class="list-group-item">Bed Cover</li>
            <li class="list-group-item">Lemari</li>
            <li class="list-group-item">Cermin</li>
            <li class="list-group-item">Kamar Mandi</li>
            <li class="list-group-item">Rak Buku</li>
        </ul>
        <p class="mt-3"><strong>Biaya Asrama:</strong> Rp 5.500.000/Tahun</p>
    </div>
</div>

                </div>
            </div>

            <!-- Facility Content: Olahraga & Kesehatan -->
<div id="facility-olahraga" class="facility-content">
    <div id="carouselOlahraga" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1: Jogging Track -->
            <div class="carousel-item active">
                <div class="facility">
                    <img src="{{ asset('gambar/fasilitas_olahraga_kesehatan/joggingtrack.png') }}" class="d-block w-100 facility-img" alt="Jogging Track">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Jogging Track</h5>
                        <p>Jogging Track Telkom University tersedia pada 2 lokasi yaitu, di area utama samping Mesjid Syamsul Ulum dan sekeliling Situ Techno.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Lapangan Basket -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/lapanganbasket.jpg" class="d-block w-100 facility-img" alt="Lapangan Basket">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Basket</h5>
                        <p>Lapangan Basket Telkom University terletak di area Student Sport yang bersampingan dengan lapangan volly dan lapangan futsal.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Lapangan Volly -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/lapanganvolly.jpg" class="d-block w-100 facility-img" alt="Lapangan Volly">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Volly</h5>
                        <p>Lapangan Volly Telkom University terletak di area Student Sport yang bersampingan dengan lapangan basket dan lapangan futsal.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Lapangan Futsal -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/lapanganfutsal.jpg" class="d-block w-100 facility-img" alt="Lapangan Futsal">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Futsal</h5>
                        <p>Lapangan Futsal Telkom University terletak di area Student Sport yang bersampingan dengan lapangan volly dan lapangan basket.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 5: Lapangan Bulutangkis -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/lapanganbulutangkis.jpg" class="d-block w-100 facility-img" alt="Lapangan Bulutangkis">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Bulutangkis</h5>
                        <p>Lapangan Bulu Tangkis Telkom University memiliki 2 lapangan yang dapat digunakan. Lokasinya terletak di dalam Gedung Student Center.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 6: Lapangan Tenis -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/lapangantennis.jpg" class="d-block w-100 facility-img" alt="Lapangan Tennis">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Tennis</h5>
                        <p>Lapangan Tenis Telkom University tersedia 2 lapangan yang dapat digunakan oleh TelUtizen. Lokasinya terletak antara Student Center dan Klinik Pratama THC.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 7: Kolam Renang -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/kolamrenang.jpg" class="d-block w-100 facility-img" alt="Kolam Renang">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Kolam Renang</h5>
                        <p>Kolam renang Telkom University memiliki 2 kolam terpisah antara laki-laki dan perempuan. Kolam renang ini terletak di lantai dasar Gedung Tokong Nanas atau GKU.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 8: Ruang Gym -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/gym.jpg" class="d-block w-100 facility-img" alt="Ruang Gym">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ruang Gym</h5>
                        <p>Ruang Gym Telkom University terletak disamping student sport dengan berbagai pilihan fasilitas gym yang dapat digunakan oleh TelUtizen.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 9: Klinik Pratama THC -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="gambar/fasilitas/klinik.jpg" class="d-block w-100 facility-img" alt="Klinik Pratama THC">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Klinik Pratama THC</h5>
                        <p>Klinik Pratama THC merupakan klinik khusus TelUtizen saat ingin melakukan pemeriksaan kesehatan dengan menunjukkan KTM (Kartu Tanda Mahasiswa) bagi mahasiswa dan kartu TelkoMedika bagi pegawai.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselOlahraga" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselOlahraga" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<!-- Facility Content: Makanan & Rekreasi -->
<div id="facility-makanan" class="facility-content active">
    <div class="row">
        <!-- Tel-U Coffee -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="gambar/fasilitas/Tel-U-Coffee03.jpg" class="card-img-top img-fluid" alt="Tel-U Coffee">
                <div class="card-body">
                    <h5 class="card-title">Tel-U Coffee</h5>
                    <p class="card-text">Tel-U Coffee merupakan bagian dari program Unit Endowment untuk mengumpulkan dana abadi Telkom University. Terletak di GKu.</p>
                </div>
            </div>
        </div>

        <!-- Kopi Alumni -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="gambar/fasilitas/Kopi-Alumni.jpg" class="card-img-top img-fluid" alt="Kopi Alumni">
                <div class="card-body">
                    <h5 class="card-title">Kopi Alumni</h5>
                    <p class="card-text">Kopi Alumni merupakan fasilitas dari dukungan alumni Telkom University. Lokasi: samping Gedung Selaru (Fakultas Ilmu Terapan).</p>
                </div>
            </div>
        </div>

        <!-- Kantin -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('gambar/fasilitas_makanan_rekreasi/kantin.png') }}" class="card-img-top img-fluid" alt="Kantin">
                <div class="card-body">
                    <h5 class="card-title">Kantin</h5>
                    <p class="card-text">Kantin terbagi di beberapa titik di Telkom University, antara lain: Kantin Teknik, Asrama Putri, Asrama Putra, Ruang Riung, dan TULT.</p>
                </div>
            </div>
        </div>

        <!-- Tel You Grill -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="gambar/fasilitas/telugrill.jpg" class="card-img-top img-fluid" alt="Tell You Grill">
                <div class="card-body">
                    <h5 class="card-title">Tell You Grill</h5>
                    <p class="card-text">Tell You Grill merupakan fasilitas dari dukungan alumni Telkom University. Lokasi: samping Gedung Selaru (Fakultas Ilmu Terapan).</p>
                </div>
            </div>
        </div>
    </div>
</div>



          <!-- Facility Content: Area Siswa -->
<div id="facility-area" class="facility-content">
    <div class="container">
        
        <div class="row">
            <!-- Open Library -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/OPLIB-1024x1024.jpg" class="card-img-top img-fluid" alt="Open Library">
                    <div class="card-body">
                        <h5 class="card-title">Open Library</h5>
                        <p class="card-text">Open Library Telkom University memiliki banyak koleksi buku dan referensi yang bisa ditemukan secara online maupun dengan berkunjung ke lokasi.</p>
                    </div>
                </div>
            </div>
            <!-- Language Center -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/LC.jpg" class="card-img-top img-fluid" alt="Language Center">
                    <div class="card-body">
                        <h5 class="card-title">Language Center</h5>
                        <p class="card-text">Language Center merupakan fasilitas pendukung bahasa TelUtizen, menyediakan program kursus bahasa inggris, bahasa korea, serta sertifikasi bahasa.</p>
                    </div>
                </div>
            </div>
            <!-- Student Lounge -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/Student-Lounge-01.jpg" class="card-img-top img-fluid" alt="Student Lounge">
                    <div class="card-body">
                        <h5 class="card-title">Student Lounge</h5>
                        <p class="card-text">Student Lounge tersedia pada setiap gedung Fakultas, tempat santai untuk mengerjakan tugas atau berkumpul dengan mahasiswa lain.</p>
                    </div>
                </div>
            </div>
            <!-- Auditorium -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/auditorium.jpg" class="card-img-top img-fluid" alt="Auditorium">
                    <div class="card-body">
                        <h5 class="card-title">Auditorium</h5>
                        <p class="card-text">Auditorium Damar dapat digunakan oleh seluruh TelUtizen dengan melakukan booking terlebih dahulu.</p>
                    </div>
                </div>
            </div>
            <!-- Masjid Syamsul Ulum -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/msu.jpg" class="card-img-top img-fluid" alt="Masjid Syamsul Ulum">
                    <div class="card-body">
                        <h5 class="card-title">Masjid Syamsul Ulum</h5>
                        <p class="card-text">Masjid Syamsul Ulum merupakan fasilitas ibadah TelUtizen muslim yang dapat menampung ribuan jamaah.</p>
                    </div>
                </div>
            </div>
            <!-- Pendopo Tel-U -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('gambar/fasilitas_area_siswa/pendopo.png') }}" class="card-img-top img-fluid" alt="Pendopo Tel-U">
                    <div class="card-body">
                        <h5 class="card-title">Pendopo Tel-U</h5>
                        <p class="card-text">Pendopo merupakan fasilitas terbuka yang bisa digunakan oleh seluruh TelUtizen.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Facility Content: Transportasi -->
<div id="facility-transportasi" class="facility-content">
    <div class="container">
        <div class="row">
            <!-- Tuc-tuc -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="gambar/fasilitas/Tuctuc-01.jpg" class="card-img-top img-fluid" alt="Tuc-tuc">
                    <div class="card-body">
                        <h5 class="card-title">Tuc-tuc (Telkom University Car)</h5>
                        <p class="card-text">Tuc-tuc adalah fasilitas shuttle minibus yang disediakan kampus untuk mengantar mahasiswa antar kawasan di lingkungan Telkom University.</p>
                        <p class="card-text">Fasilitas ini gratis dan dapat dipakai oleh TelUtizen kapanpun beroperasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- Footer -->
    <footer class="bg-danger text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-start mb-4 mb-md-0">
                    <p class="lead mb-0"><strong style="font-size: 20px;">Lokasi Kami</strong></p>
                    <div class="d-flex align-items-start mt-3">
                        <img src="gambar/marker-02.png" alt="Marker" style="vertical-align: middle; width: 32px; height: 32px; margin-right: 10px;">
                        <p style="font-size: 16px; margin-bottom: 0;">
                            Gedung Bangkit Telkom University<br>
                            Jl. Telekomunikasi Terusan Buah Batu<br>
                            Indonesia 40257, Bandung, Indonesia
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <p class="lead mb-0"><strong style="font-size: 20px;">Media Sosial Kami</strong></p>
                    <div class="mt-4">
                        <a href="https://www.instagram.com/telkomdormitory/?hl=id" class="btn btn-link me-3" target="_blank">
                            <img src="gambar/instagram.png" alt="Instagram" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://www.linkedin.com/company/telkom-dormitory/" class="btn btn-link me-3" target="_blank">
                            <img src="gambar/linkedin.png" alt="LinkedIn" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://www.youtube.com/@telkomdormitory" class="btn btn-link me-3" target="_blank">
                            <img src="gambar/youtube.png" alt="YouTube" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://wa.me/6282120988835" class="btn btn-link" target="_blank">
                            <img src="gambar/whatsapp.png" alt="WhatsApp" style="vertical-align: middle; width: 60px; height: 60px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Function to show selected facility category
        function showFacility(category) {
            // Hide all facility content
            document.querySelectorAll('.facility-content').forEach((content) => {
                content.classList.remove('active');
            });

            // Show the selected facility content
            document.getElementById(`facility-${category}`).classList.add('active');

            // Highlight the active button in navigation
            document.querySelectorAll('.facility-nav-btn').forEach((btn) => {
                btn.classList.remove('active');
            });
            document.querySelector(`.facility-nav-btn:nth-child(${getNavIndex(category)})`).classList.add('active');
        }

        // Helper function to get index for navigation button
        function getNavIndex(category) {
            const categories = ['asrama', 'olahraga', 'makanan', 'area', 'transportasi'];
            return categories.indexOf(category) + 1;
        }

        // Show default facility content on page load
        document.addEventListener('DOMContentLoaded', () => {
            showFacility('asrama'); // Show Asrama content by default
        });
    </script>
    <script>
        // Inisialisasi dropdown
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    </script>

    <script>
    // biar bisa diklik text nya
    document.getElementById('lihatDenahLink').addEventListener('click', function() {
        console.log('Teks "Lihat Denah" diklik');
    });
</script>

</body>

</html>
