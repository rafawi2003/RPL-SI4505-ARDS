<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if(Auth::check() && Auth::user()->kamar == NULL)
                    @if(Auth::check() && Auth::user()->status == 'Belum Melakukan Check-in')
                        <div class="p-6 bg-red-50 border-l-4 border-red-500 text-red-700">
                            <p class="mb-4">Silahkan Melakukan Check-in untuk Mendapatkan Kamar</p>
                            <form action="{{ route('profile.checkin') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Check In
                                </button>
                            </form>
                        </div>
                    @elseif(Auth::check() && Auth::user()->status == 'Menunggu Update Kamar oleh Admin')
                        <div class="p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700">
                            <p>Anda sudah melakukan Check-in, namun kamar Anda sedang menunggu update oleh Admin.</p>
                        </div>
                    @endif

                @elseif(Auth::check() && Auth::user()->status == 'Proses Pengunduran Diri')
                    <div class="p-6 bg-red-200 border-l-4 border-red-500 text-white-700">
                        <p>Anda dalam Proses Pengunduran Diri (Checkout).</p>
                    </div>
                @else
                    @php
                        $kamar = Auth::user()->kamar;
                        $matches = [];
                        if (preg_match('/([A-Z]\d{2})_(\d{3})_([A-Z]\d)/', $kamar, $matches)) {
                            $gedung = $matches[1];
                            $nomorKamar = $matches[2];
                            $lantai = substr($nomorKamar, 0, 1); // Lantai adalah digit pertama dari nomor kamar
                            $bed = substr($matches[3], 1); // Bed is the digit after the letter in the third match
                        } else {
                            // Handle case where the regex does not match
                            $gedung = 'N/A';
                            $nomorKamar = 'N/A';
                            $lantai = 'N/A';
                            $bed = 'N/A';
                        }
                    @endphp

                    <div class="p-6 bg-green-50 border-l-4 border-green-500 text-green-700">
                        <h3 class="text-2xl font-bold mb-2">Selamat Datang!</h3>
                        <p class="text-lg">di Gedung <span class="font-semibold">{{ $gedung }}</span> Lantai <span class="font-semibold">{{ $lantai }}</span> Kamar <span class="font-semibold">{{ $nomorKamar }}</span> Bed <span class="font-semibold">{{ $bed }}</span>!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>



    
    
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-6">
                    
                        <h1 class="text-xl font-semibold">TATA TERTIB PENGHUNI<br>ASRAMA TELKOM UNIVERSITY</h1>
                        <p class="text-center">Nomor : 169/KMHS4/BKA/2017</p>
                    </div>

                    <h3 class="text-center font-semibold mb-2">Pasal 1</h3>
                    <h4 class="text-center font-semibold mb-2">Penghuni Asrama</h4>
                    <p class="mb-4 text-justify">
                        (1) Penghuni asrama adalah mahasiswa aktif Telkom University yang telah menyelesaikan seluruh kewajiban administrasi untuk tinggal di asrama dan telah mendapatkan nomor kamar hunian yang sah yang ditetapkan oleh Direktorat Pengelolaan Mahasiswa Telkom University.
                    </p>
                    <p class="mb-4 text-justify">
                        (2) Penghuni asrama terdiri dari :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) mahasiswa yang telah dinyatakan lolos Seleksi Masuk Bersama Telkom (SMB Telkom) dan tercatat sebagai mahasiswa setelah mengikuti seluruh rangkaian registrasi mahasiswa yang kemudian disebut sebagai mahasiswa baru,<br>
                        (b) mahasiswa yang telah mengajukan permohonan perpanjangan asrama dan telah disetujui oleh Direktorat Pengelolaan Mahasiswa yang kemudian disebut sebagai mahasiswa perpanjangan asrama, dan<br>
                        (c) mahasiswa yang telah mengikuti seluruh tahapan seleksi dan dinyatakan lolos untuk menjalankan tugas pembinaan, pendampingan dan pelaksana Framework “ASAS” yang kemudian disebut sebagai Senior Residents (SR).
                    </p>
                    <p class="mb-4 text-justify">
                        (3) Penghuni asrama wajib tinggal di asrama selama satu tahun akademik, yakni sejak ditetapkan sebagai penghuni asrama hingga dikeluarkannya surat ketetapan akhir masa tinggal di asrama oleh Direktorat Pengelolaan Mahasiswa Telkom University.
                    </p>
                    <p class="mb-4 text-justify">
                        (4) Penghuni asrama tidak diperkenankan untuk tinggal di luar asrama tanpa sepengetahuan dan izin dari Direktorat Pengelolaan Mahasiswa Telkom University.
                    </p>

                    <h3 class="text-center font-semibold mb-2">Pasal 2</h3>
                    <h4 class="text-center font-semibold mb-2">Hak dan Kewajiban</h4>
                    <p class="mb-4 text-justify">
                        (1) Penghuni asrama memiliki hak untuk :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) menggunakan fasilitas kamar hunian dan umum yang telah disediakan di asrama Telkom University,<br>
                        (b) memperoleh layanan pengelolaan fasilitas kamar hunian dan umum yang ada di asrama Telkom University, dan<br>
                        (c) mendapatkan informasi tentang pelaksanaan pengelolaan fasilitas dan kegiatan pembinaan yang dilaksanakan di lingkungan asrama Telkom University.
                    </p>
                    <p class="mb-4 text-justify">
                        (2) Penghuni asrama memiliki kewajiban untuk :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) menaati aturan dan tata tertib yang ada di lingkungan asrama dan kampus Telkom University,<br>
                        (b) mengikuti seluruh kegiatan pembinaan karakter dan softskill (Framework “ASAS”) yang dilaksanakan di lingkungan asrama Telkom University, dan<br>
                        (c) melaporkan kejadian, permasalahan atau pelanggaran aturan yang terjadi di lingkungan asrama Telkom University kepada Senior Residents, Petugas Keamanan, Pengelola Asrama maupun Direktorat Pengelolaan Mahasiswa.
                    </p>

                    <h3 class="text-center font-semibold mb-2">Pasal 3</h3>
                    <h4 class="text-center font-semibold mb-2">Norma Tingkah Laku</h4>
                    <p class="mb-4 text-justify">
                        (1) Setiap penghuni asrama memiliki norma tingkah laku sebagai berikut.
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Menjunjung tinggi asas kekeluargaan dan toleransi.<br>
                        (b) Bertindak jujur, disiplin, dan tidak mengambil hak orang lain.<br>
                        (c) Bersikap sopan, baik dalam tingkah laku dan menggunakan bahasa yang santun dalam ucapan.<br>
                        (d) Berpakaian sopan dan pantas selama berada di lingkungan asrama.<br>
                        (e) Menghormati dan tolong menolong dalam hal-hal yang positif.<br>
                        (f) Menjaga ketentraman dan ketertiban di lingkungan asrama.<br>
                        (g) Menjaga, mengamankan dan menyimpan barang-barang berharga milik pribadi.<br>
                        (h) Menjaga kebersihan kamar hunian secara swadaya dengan asas gotong royong.<br>
                        (i) Menggunakan fasilitas asrama yang telah disediakan secara wajar dan tepat guna.<br>
                        (j) Meminta izin pemilik barang sebelum meminjam barang orang lain.<br>
                        (k) Mengingatkan satu sama lain untuk menaati peraturan yang telah ditetapkan di lingkungan asrama.<br>
                        (l) Menjaga nama baik almamater dan kerukunan antara penghuni asrama, Senior Residents, Petugas Keamanan dan Pengelola Asrama.<br>
                        (m) Menyampaikan pendapat secara santun dan langsung kepada pihak terkait sesuai dengan perihal/topik yang akan disampaikan.
                    </p>

                    <h3 class="text-center font-semibold mb-2">Pasal 4</h3>
                    <h4 class="text-center font-semibold mb-2">Aturan dan Larangan</h4>
                    <p class="mb-4 text-justify">
                        (1) Aturan dan larangan tentang kamar hunian :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Menempati kamar dan tempat tidur sesuai dengan nomor yang telah ditetapkan oleh Direktorat Pengelolaan Mahasiswa.<br>
                        (b) Menjaga tatanan ruang kamar hunian sesuai dengan tatanan yang telah ditetapkan oleh Pengelola Asrama.<br>
                        (c) Tidak diperkenankan pindah kamar tanpa seizin teman sekamar, Senior Residents dan Pengelola Asrama.<br>
                        (d) Tidak diperkenankan pindah tempat tidur tanpa kesepakatan dengan pengguna lainnya.<br>
                        (e) Setiap penghuni bertanggung jawab atas kebersihan kamar hunian dan kamar mandi masing-masing.
                    </p>
                    <p class="mb-4 text-justify">
                        (2) Aturan dan larangan tentang menerima tamu :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Yang dimaksud tamu luar adalah mahasiswa non penghuni asrama, sanak saudara/keluarga dan petugas jasa pengantar barang.<br>
                        (b) Yang dimaksud tamu dalam adalah penghuni asrama yang berasal dari luar kamar penghuni penerima tamu.<br>
                        (c) Menerima tamu luar dan tamu dalam lawan jenis hanya dilakukan di loby lantai dasar gedung masing-masing dengan menyesuaikan peraturan jam kunjungan yaitu sejak pukul 07.00 s.d. 21.00 WIB.<br>
                        (d) Tidak diperkenankan membawa tamu luar dan tamu dalam masuk ke dalam kamar hunian tanpa seizin dari penghuni kamar penerima tamu dan atau pengawasan dari petugas keamanan asrama.
                    </p>
                    <p class="mb-4 text-justify">
                        (3) Aturan dan larangan tentang meninggalkan asrama :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Menaati pelaksanaan jam malam yaitu pukul 21.00 WIB untuk weekdays dan pukul 22.00 WIB untuk weekend.<br>
                        (b) Wajib menyerahkan kunci kamar kepada petugas Helpdesk jika kondisi kamar tidak ada penghuni.<br>
                        (c) Wajib menyerahkan surat izin yang telah ditandatangani oleh Direktorat Pengelolaan Mahasiswa kepada Senior Residents jika akan mengikuti kegiatan organisasi/kepanitiaan yang melebihi jam malam atau lebih dari 1 (satu) hari.<br>
                        (d) Wajib menginformasikan kepada teman kamar, Senior Residents dan atau petugas Helpdesk jika akan meninggalkan asrama untuk keperluan keluarga atau keperluan pribadi dalam jangka waktu lebih dari 1 (satu) hari.<br>
                        (e) Wajib menginformasikan kepada Senior Residents dan petugas Helpdesk jika akan meninggalkan asrama karena pindah ke tempat kost, rumah saudara atau kontrakan pada saat periode masa akhir tinggal di asrama berlaku.
                    </p>
                    <p class="mb-4 text-justify">
                        (4) Aturan dan larangan lain-lain :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Dilarang membawa dan atau menggunakan rokok, vape atau sejenisnya.<br>
                        (b) Dilarang mempergunakan kompor gas di dalam kamar atau di tempat lain di lingkungan asrama.<br>
                        (c) Dilarang membawa dan menggunakan barang yang dapat mengganggu ketertiban dan kenyamanan penghuni asrama yang lain.<br>
                        (d) Dilarang membawa atau memelihara hewan peliharaan apapun.<br>
                        (e) Dilarang membawa, menyimpan, menggunakan dan atau mengedarkan barang-barang terlarang seperti narkotika dan sejenisnya, minuman keras, senjata api dan senjata tajam yang dinilai berbahaya di lingkungan asrama dengan alasan apapun.<br>
                        (f) Dilarang merokok di dalam kamar, lobby, sekitar gedung asrama dan lingkungan asrama.<br>
                        (g) Dilarang melakukan intimidasi atau melakukan ancaman kepada sesama penghuni asrama.<br>
                        (h) Dilarang melakukan perjudian dalam bentuk apapun.<br>
                        (i) Dilarang menyimpan, mengedarkan atau menggunakan barang cetakan, audiovisual yang tidak sesuai dengan etika dan atau mengandung unsur pornografi dan SARA.<br>
                        (j) Dilarang merusak, mencoret-coret dinding, menempel poster atau sejenisnya di lingkungan asrama, termasuk seluruh fasilitas yang ada dalam kamar dan gedung asrama.<br>
                        (k) Dilarang membuat keributan, berteriak-teriak, menyalakan petasan atau sejenisnya dan tindakan lainnya yang dapat mengganggu ketenangan penghuni asrama lain.
                    </p>

                    <h3 class="text-center font-semibold mb-2">Pasal 5</h3>
                    <h4 class="text-center font-semibold mb-2">Periode Masa Akhir Tinggal</h4>
                    <p class="mb-4 text-justify">
                        (1) Periode masa akhir tinggal di asrama adalah 3 (tiga) minggu atau H-21 dari tanggal batas akhir masa tinggal di asrama.
                    </p>
                    <p class="mb-4 text-justify">
                        (2) Penetapan tanggal batas akhir masa tinggal di asrama dilakukan oleh Direktorat Pengelolaan Mahasiswa.
                    </p>
                    <p class="mb-4 text-justify">
                        (3) Hal-hal yang wajib dilakukan ketika periode masa akhir tinggal di asrama berlaku :
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Mengemas seluruh barang-barang bawaan pribadi.<br>
                        (b) Memastikan tidak ada barang-barang bawaan pribadi yang tertinggal.<br>
                        (c) Menata kondisi kamar seperti semula.<br>
                        (d) Menginformasikan kepada Senior Residents dan petugas Helpdesk.<br>
                        (e) Menyerahkan kunci kamar kepada petugas Helpdesk.
                    </p>
                    <p class="mb-4 text-justify">
                        (4) Pengelola asrama tidak menyediakan jasa penitipan barang baik yang sengaja maupun tidak sengaja ditinggal.
                    </p>
                    <p class="mb-4 text-justify">
                        (5) Apabila terdapat peralatan maupun kelengkapan kamar yang hilang atau rusak, maka penghuni bertanggung jawab dan mengganti biaya perbaikan atau kerugian yang akan dihitung bersama dengan petugas pengelola asrama.
                    </p>

                    <h3 class="text-center font-semibold mb-2">Pasal 6</h3>
                    <h4 class="text-center font-semibold mb-2">Sanksi Pelanggaran</h4>
                    <p class="mb-4 text-justify">
                        (1) Sanksi atas pelanggaran tata tertib akan diberikan secara berjenjang sesuai dengan tingkat pelanggaran yang dilakukan, yaitu pelanggaran ringan, sedang dan berat.
                    </p>
                    <p class="mb-4 text-justify pl-4">
                        (a) Sanksi pelanggaran ringan berupa teguran secara lisan oleh Senior Residents, Pengelola Asrama atau Direktorat Pengelolaan Mahasiswa.<br>
                        (b) Sanksi pelanggaran sedang berupa surat peringatan yang dikeluarkan oleh Direktorat Pengelolaan Mahasiswa.<br>
                        (c) Sanksi pelanggaran berat berupa surat panggilan mengikuti sidang etik yang dikeluarkan oleh Komisi Etik Telkom University dengan kemungkinan hukuman adalah diberikan skorsing atau dikeluarkan dari Telkom University.
                    </p>
                    <p class="mb-4 text-justify">
                        (2) Pelanggaran berupa perusakan, penghilangan, atau tindakan vandalisme pada fasilitas asrama secara sengaja akan dikenakan biaya penggantian atau perbaikan sesuai dengan taksiran nominal jumlah biaya yang dilakukan bersama dengan pihak pengelola asrama.
                    </p>
                    <p class="mb-4 text-justify">
                        (3) Setiap pelanggaran yang dilakukan oleh penghuni akan dilaporkan dan dicatat oleh Senior Residents, Pengelola Asrama atau Direktorat Pengelolaan Mahasiswa.
                    </p>
                    <p class="mb-4 text-justify">
                        (4) Apabila pelanggaran yang dilakukan masuk ke dalam kategori tindak pidana, maka akan diproses secara langsung oleh pihak yang berwajib (kepolisian).
                    </p>

                    <div class="text-justify">
                            <p class="mb-4">Demikian tata tertib ini dibuat agar dapat dilaksanakan oleh seluruh penghuni Asrama Telkom University.</p>
                        </div>

                    <p class="mb-4 text-justify">
                        <img src="{{ asset('images/ttd_dpm.png') }}" alt="TTD DPM" class="inline-block w-150 h-auto float-left mr-4 mb-20">
                        <br>
                        <br>
                    </p>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
