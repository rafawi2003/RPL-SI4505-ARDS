<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Telkom University</title>
    
    <!-- Memuat jQuery dari CDN (diperlukan untuk Bootstrap JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Memuat Bootstrap JavaScript dari CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (Popper.js is required for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


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
            background: url('images/hero.png') center/cover;
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
    /* Mengatur ukuran maksimum images di dalam carousel */
    .carousel-item img {
            max-width: 300%; /* Lebar maksimum adalah 100% dari container */
            max-height: 800px; /* Tinggi maksimum adalah 300px (sesuaikan dengan kebutuhan Anda) */
            width: auto; /* Lebar otomatis sesuai dengan proporsi images */
            height: auto; /* Tinggi otomatis sesuai dengan proporsi images */
        }

        /* Mengatur posisi teks di bawah images */
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
</style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="display-2">Selamat Datang di Asrama Telkom University</h1>
        <h2 class="display-5">Menyambut Penghuni Baru dengan Kebersamaan dan Antusiasme!</h2>
        <p class="lead my-4">
            "Mari kita jaga disiplin dan tata tertib di asrama dengan melakukan proses login dan register saat Anda tinggal sementara di sini. Langkah kecil ini membantu kami memantau keberadaan penghuni dan memastikan segala sesuatunya berjalan dengan baik. Terima kasih atas perhatiannya!"
        </p>
       <div class="d-grid gap-3 d-md-flex justify-content-md-center">
        @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-login me-md-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-lg btn-login me-md-2">Masuk</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-lg btn-register">Daftar</a>
            @endif
        @endauth
    <!-- <a href="#" class="btn btn-lg btn-login me-md-2">Masuk</a>
    <a href="#" class="btn btn-lg btn-register">Daftar</a> -->
</div>

    </section>

    <!-- Section 2: About Asrama -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="images/image 3.png" class="img-fluid rounded mb-3" alt="About Asrama" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-6">
                    <h2 class="display-4 mb-4">Tentang Asrama Telkom University</h2>
                    <p>Asrama Telkom University memiliki letak yang sangat strategis karena dekat dengan gedung kuliah umum (Gd. Tokong Nanas 10 lantai). Asrama ini menjadi salah satu sarana kampus yang dibangun untuk tempat tinggal Mahasiswa/i baru pada 1 tahun pertama masa perkuliahan di Telkom University sehingga para orang tua tidak perlu khawatir meninggalkan putra dan putri untuk melanjutkan studinya. Setiap gedung asrama memiliki kakak asrama yang biasa disebut sebagai Senior Residents serta Helpdesk di setiap lantai dasar gedung sehingga kenyamanan dan keamanan akan tetap terjaga. Selain itu, kegiatan pembinaan terhadap mahasiswa/i yang tinggal di asrama akan diawasi secara rutin oleh Direktorat Kemahasiswaan Telkom University.</p>
                    <a href="#" class="btn btn-danger btn-lg">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

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
                <h3>Asrama</h3>
                <p>
                    Universitas Telkom memastikan pengalaman awal mahasiswa barunya benar-benar "Aman dan Nyaman". Sebagai bagian dari pembentukan karakter, para mahasiswa tahun pertama diwajibkan tinggal di asrama kampus selama satu tahun akademik. Suasana asri menyambut dengan tersedianya 18 gedung asrama yang dilengkapi berbagai fasilitas pendukung. Di lingkungan ini, mahasiswa bukan hanya mendapatkan tempat tinggal yang layak, tetapi juga bekal pengalaman berharga untuk membentuk kepribadian yang tangguh dan mandiri menghadapi kehidupan kampus dan masa depan.
                </p>
                <h4>Gedung Asrama</h4>
                <div class="row">
                    <!-- images gedung asrama putra dan putri -->
                    <div class="col-md-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-0">Gedung Asrama Putra</h4>
                        </div>
                        <div class="text-center mb-4">
                            <img src="images/fasilitas/Asrama-putra.jpg" alt="Gedung Asrama Putra" class="img-fluid">
                        </div>
                        <p>
                            10 Gedung:
                            <ul>
                                <li>A01 Gd. Laag</li>
                                <li>A02 Gd. Larat</li>
                                <li>A03 Gd. Leti</li>
                                <li>A04 Gd. Liki</li>
                                <li>A05 Gd. Lingian</li>
                                <li>A06 Gd. Liran</li>
                                <li>A07 Gd. Sambit</li>
                                <li>A08 Gd. Sebetul</li>
                                <li>A09 Gd. Sekatung</li>
                                <li>A10 Gd. Sekel</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center mb-4">
                            <h4 class="mb-0">Gedung Asrama Putri</h4>
                        </div>
                        <div class="text-center mb-4">
                            <img src="images/fasilitas/Asrama-putri.jpg" alt="Gedung Asrama Putri" class="img-fluid">
                        </div>
                        <p>
                            8 Gedung:
                            <ul>
                                <li>B01 Gd. Dana (A)</li>
                                <li>B02 Gd. Dona (B)</li>
                                <li>B03 Gd. Enggano (C)</li>
                                <li>B04 Gd. Enu (D)</li>
                                <li>B05 Gd. Fani (E)</li>
                                <li>B06 Gd. Fanildo (F)</li>
                                <li>A11 Gd. Sebelas (11)</li>
                                <li>A12 Gd. Duabelas (12)</li>
                            </ul>
                        </p>
                    </div>

                     <!-- Deskripsi Fasilitas Kamar Asrama -->
                     <div class="mt-4">
                        <h4>Fasilitas Kamar Asrama:</h4>
                        <ul>
                            <li>Kasur</li>
                            <li>Bantal</li>
                            <li>Bed Cover</li>
                            <li>Lemari</li>
                            <li>Cermin</li>
                            <li>Kamar Mandi</li>
                            <li>Rak Buku</li>
                        </ul>
                        <p><strong>Biaya Asrama:</strong> Rp 5.500.000/Tahun</p>
                    </div>
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
                    <img src="images/fasilitas/joggingtrack.jpg" class="d-block w-100" alt="Jogging Track">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Jogging Track</h5>
                        <p>Jogging Track Telkom University tersedia pada 2 lokasi yaitu, di area utama samping Mesjid Syamsul Ulum dan sekeliling Situ Techno.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Lapangan Basket -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/lapanganbasket.jpg" class="d-block w-100" alt="Lapangan Basket">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Basket</h5>
                        <p>Lapangan Basket Telkom University terletak di area Student Sport yang bersampingan dengan lapangan volly dan lapangan futsal.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Lapangan Volly -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/lapanganvolly.jpg" class="d-block w-100" alt="Lapangan Volly">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Volly</h5>
                        <p>Lapangan Volly Telkom University terletak di area Student Sport yang bersampingan dengan lapangan basket dan lapangan futsal.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 4: Lapangan Futsal -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/lapanganfutsal.jpg" class="d-block w-100" alt="Lapangan Futsal">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Futsal</h5>
                        <p>Lapangan Futsal Telkom University terletak di area Student Sport yang bersampingan dengan lapangan volly dan lapangan basket.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 5: Lapangan Bulutangkis -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/lapanganbulutangkis.jpg" class="d-block w-100" alt="Lapangan Bulutangkis">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Bulutangkis</h5>
                        <p>Lapangan Bulu Tangkis Telkom University memiliki 2 lapangan yang dapat digunakan. Lokasinya terletak di dalam Gedung Student Center.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 6: Lapangan Tenis -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/lapangantennis.jpg" class="d-block w-100" alt="Lapangan Tennis">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lapangan Tennis</h5>
                        <p>Lapangan Tenis Telkom University tersedia 2 lapangan yang dapat digunakan oleh TelUtizen. Lokasinya terletak antara Student Center dan Klinik Pratama THC.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 7: Kolam Renang -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/kolamrenang.jpg" class="d-block w-100" alt="Kolam Renang">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Kolam Renang</h5>
                        <p>Kolam renang Telkom University memiliki 2 kolam terpisah antara laki-laki dan perempuan. Kolam renang ini terletak di lantai dasar Gedung Tokong Nanas atau GKU.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 8: Ruang Gym -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/gym.jpg" class="d-block w-100" alt="Ruang Gym">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ruang Gym</h5>
                        <p>Ruang Gym Telkom University terletak disamping student sport dengan berbagai pilihan fasilitas gym yang dapat digunakan oleh TelUtizen.</p>
                    </div>
                </div>
            </div>

            <!-- Slide 9: Klinik Pratama THC -->
            <div class="carousel-item">
                <div class="facility">
                    <img src="images/fasilitas/klinik.jpg" class="d-block w-100" alt="Klinik Pratama THC">
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
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/fasilitas/Tel-U-Coffee03.jpg" class="card-img-top img-fluid" alt="Tel-U Coffee">
                <div class="card-body">
                    <h5 class="card-title">Tel-U Coffee</h5>
                    <p class="card-text">Tel-U Coffee merupakan bagian dari program Unit Endowment untuk mengumpulkan dana abadi Telkom University. Terletak di Gedung Tokong Nanas (GKu).</p>
                </div>
            </div>
        </div>

        <!-- Kopi Alumni -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/fasilitas/Kopi-Alumni.jpg" class="card-img-top img-fluid" alt="Kopi Alumni">
                <div class="card-body">
                    <h5 class="card-title">Kopi Alumni</h5>
                    <p class="card-text">Kopi Alumni merupakan fasilitas dari dukungan alumni Telkom University. Lokasi: samping Gedung Selaru (Fakultas Ilmu Terapan).</p>
                </div>
            </div>
        </div>

        <!-- Kantin -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/fasilitas/kantin.jpeg" class="card-img-top img-fluid" alt="Kantin">
                <div class="card-body">
                    <h5 class="card-title">Kantin</h5>
                    <p class="card-text">Kantin terbagi di beberapa titik di Telkom University, antara lain: Kantin Teknik, Asrama Putri, Asrama Putra, Ruang Riung, dan TULT.</p>
                </div>
            </div>
        </div>

        <!-- Tel You Grill -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="images/fasilitas/telugrill.jpg" class="card-img-top img-fluid" alt="Tell You Grill">
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
        <h2>Fasilitas Area Siswa</h2>
        <div class="row">
            <!-- Open Library -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/OPLIB-1024x1024.jpg" class="card-img-top img-fluid" alt="Open Library">
                    <div class="card-body">
                        <h5 class="card-title">Open Library</h5>
                        <p class="card-text">Open Library Telkom University memiliki banyak koleksi buku dan referensi yang bisa ditemukan secara online maupun dengan berkunjung ke lokasi.</p>
                    </div>
                </div>
            </div>
            <!-- Language Center -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/LC.jpg" class="card-img-top img-fluid" alt="Language Center">
                    <div class="card-body">
                        <h5 class="card-title">Language Center</h5>
                        <p class="card-text">Language Center merupakan fasilitas pendukung bahasa TelUtizen, menyediakan program kursus bahasa inggris, bahasa korea, serta sertifikasi bahasa.</p>
                    </div>
                </div>
            </div>
            <!-- Student Lounge -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/Student-Lounge-01.jpg" class="card-img-top img-fluid" alt="Student Lounge">
                    <div class="card-body">
                        <h5 class="card-title">Student Lounge</h5>
                        <p class="card-text">Student Lounge tersedia pada setiap gedung Fakultas, tempat santai untuk mengerjakan tugas atau berkumpul dengan mahasiswa lain.</p>
                    </div>
                </div>
            </div>
            <!-- Auditorium -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/auditorium.jpg" class="card-img-top img-fluid" alt="Auditorium">
                    <div class="card-body">
                        <h5 class="card-title">Auditorium</h5>
                        <p class="card-text">Auditorium Damar dapat digunakan oleh seluruh TelUtizen dengan melakukan booking terlebih dahulu.</p>
                    </div>
                </div>
            </div>
            <!-- Masjid Syamsul Ulum -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/msu.jpg" class="card-img-top img-fluid" alt="Masjid Syamsul Ulum">
                    <div class="card-body">
                        <h5 class="card-title">Masjid Syamsul Ulum</h5>
                        <p class="card-text">Masjid Syamsul Ulum merupakan fasilitas ibadah TelUtizen muslim yang dapat menampung ribuan jamaah.</p>
                    </div>
                </div>
            </div>
            <!-- Pendopo Tel-U -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/pendopo-1024x1024.jpg" class="card-img-top img-fluid" alt="Pendopo Tel-U">
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
        <h2>Fasilitas Transportasi</h2>
        <div class="row">
            <!-- Tuc-tuc -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="images/fasilitas/Tuctuc-01.jpg" class="card-img-top img-fluid" alt="Tuc-tuc">
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
                        <img src="images/marker-02.png" alt="Marker" style="vertical-align: middle; width: 32px; height: 32px; margin-right: 10px;">
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
                            <img src="images/instagram.png" alt="Instagram" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://www.linkedin.com/company/telkom-dormitory/" class="btn btn-link me-3" target="_blank">
                            <img src="images/linkedin.png" alt="LinkedIn" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://www.youtube.com/@telkomdormitory" class="btn btn-link me-3" target="_blank">
                            <img src="images/youtube.png" alt="YouTube" style="vertical-align: middle; width: 60px; height: 60px; margin-right: 0px;">
                        </a>
                        <a href="https://wa.me/6282120988835" class="btn btn-link" target="_blank">
                            <img src="images/whatsapp.png" alt="WhatsApp" style="vertical-align: middle; width: 60px; height: 60px;">
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
    <!-- Script untuk Inisialisasi Carousel -->
    <script>
        $(document).ready(function() {
            // Inisialisasi carousel dengan ID carouselOlahraga
            $('#carouselOlahraga').carousel();
        });
    </script>
    
</body>

</html>
