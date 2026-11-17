# Praktikum Pemrograman Web — Dasar PHP & Pemrosesan Form (`Lab7Web_PHP`)

Repository ini berisi kumpulan kode latihan, eksplorasi mandiri, dan mini project pada praktikum **Pemrograman Web (PHP Dasar, Function, serta Pemrosesan Form GET & POST)**.

## Identitas Mahasiswa

* **Nama:** Angga Qomaruzzaman
* **NIM:** 312510158
* **Kelas:** I253C
* **Program Studi:** Teknik Informatika — Universitas Pelita Bangsa
* **Repository GitHub:** <https://github.com/ZiQax/Lab7Web_PHP>

## Lingkungan Pengembangan

* **Local Server Stack:** Laragon 2026 v8.8.0
* **Web Server:** Apache 2.4.69
* **Versi PHP:** PHP 8.3.36 (TS, x64)
* **Database:** MySQL 8.4.3
* **Direktori Proyek:** `C:\laragon\www\htdocs\Lab7Web_PHP`

## Struktur File Proyek

| Nama File / Folder | Keterangan |
| :--- | :--- |
| `img/` | Folder penyimpanan tangkapan layar (*screenshot*) kode dan *preview* hasil praktikum. |
| `index.php` | **Latihan 1 — Menjalankan PHP:** Menampilkan teks output dasar dan waktu server secara dinamis menggunakan fungsi `date()`. |
| `latihan2.php` | **Latihan 2 — Variabel, Operator, dan Percabangan:** Menghitung nilai akhir berbobot (Tugas 30%, UTS 30%, UAS 40%) dan menentukan predikat huruf mutu menggunakan `if-elseif-else`. |
| `latihan3.php` | **Latihan 3 — Perulangan dan Array:** Menampilkan daftar nama mahasiswa dari array menggunakan perulangan `foreach` ke dalam elemen HTML `<ol>`. |
| `latihan4.php` | **Latihan 4 — Membuat Function:** Implementasi fungsi kustom `hitungNilaiAkhir()` dan `hitungDiskon()` untuk perhitungan modular. |
| `latihan5.php` | **Latihan 5 — Memproses Form dengan GET:** Form pencarian kata kunci sederhana menggunakan superglobal `$_GET` dan sanitasi `htmlspecialchars()`. |
| `latihan6.php` | **Latihan 6 — Memproses Form dengan POST:** Form input Nama dan Program Studi menggunakan `$_POST` beserta pengecekan kolom wajib diisi. |
| `latihan7.php` | **Latihan 7 — Pengolahan Data Sederhana:** Kalkulator subtotal belanja (Nama Barang, Harga, Jumlah) dengan validasi numerik (`is_numeric`) dan bilangan bulat positif (`ctype_digit`). |
| `eksMan.php` | **Eksplorasi Mandiri:** Pencarian data mahasiswa pada array asosiatif menggunakan metode `GET` (`array_filter` + `stripos`) serta fungsi `formatRupiah()`. |
| `minProy.php` | **Mini Project — Formulir Data & Nilai Mahasiswa:** Aplikasi form lengkap dengan validasi *server-side*, perhitungan nilai rata-rata (Tugas, UTS, UAS), dan tombol reset interaktif. |
| `README.md` | Dokumentasi laporan hasil praktikum. |

---

## Dokumentasi & Preview Hasil Praktikum

### 1. Instalasi & Konfigurasi Server Lokal (Laragon)

Menjalankan layanan web server Apache 2.4.69, MySQL 8.4.3, memverifikasi versi PHP 8.3.36, serta menyiapkan direktori proyek di dalam `htdocs`.

![Panel Kontrol Laragon](img/01-laragon-panel.png)
*Tampilan kontrol layanan Apache & MySQL aktif pada Laragon 2026.*

![Informasi Versi PHP 8.3.36](img/02-phpinfo.png)
*Verifikasi konfigurasi PHP Version 8.3.36 melalui `phpinfo()`.*

![Struktur Folder Proyek di VS Code](img/03-folder-proyek.png)
*Pembuatan folder proyek dan file `index.php` di dalam direktori `htdocs`.*

---

### 2. Latihan Dasar PHP (Latihan 1 – Latihan 4)

#### Latihan 1 — Menjalankan PHP (`index.php`)
Menampilkan output teks HTML dari dalam blok `<?php ... ?>` beserta waktu server *real-time* menggunakan `date("d-m-Y H:i:s")`.

![Kode Latihan 1](img/latihan1-kode.png)
![Preview Latihan 1](img/latihan1-preview.png)

#### Latihan 2 — Variabel, Operator, dan Percabangan (`latihan2.php`)
Menghitung nilai akhir mahasiswa dari komponen Tugas, UTS, dan UAS serta menentukan predikat huruf (`A`, `B`, `C`, `D`) menggunakan struktur `if-elseif-else`.

![Kode Latihan 2](img/latihan2-kode.png)
![Preview Latihan 2](img/latihan2-preview.png)

#### Latihan 3 — Perulangan dan Array (`latihan3.php`)
Menampilkan daftar 7 nama mahasiswa (`Alya`, `Bima`, `Citra`, `Doni`, `Agus`, `Dina`, `Angga`) dari array menggunakan perulangan `foreach`.

![Kode Latihan 3](img/latihan3-kode.png)
![Preview Latihan 3](img/latihan3-preview.png)

#### Latihan 4 — Membuat Function (`latihan4.php`)
Pembuatan fungsi modular `hitungNilaiAkhir()` dan `hitungDiskon()` untuk menghitung potongan harga sebesar 10% dari `Rp150.000` menjadi `Rp135.000`.

![Kode Latihan 4](img/latihan4-kode.png)
![Preview Latihan 4](img/latihan4-preview.png)

---

### 3. Pemrosesan Form & Pengolahan Data (Latihan 5 – Latihan 7)

#### Latihan 5 — Memproses Form dengan GET (`latihan5.php`)
Mengirimkan parameter kata kunci pencarian melalui URL (`$_GET["kata"]`) dan menampilkannya secara aman dengan `htmlspecialchars()`.

![Kode Latihan 5](img/latihan5-kode.png)
![Preview Latihan 5](img/latihan5-preview.png)

#### Latihan 6 — Memproses Form dengan POST (`latihan6.php`)
Memproses input `Nama` dan `Program Studi` melalui metode `POST` (`$_SERVER["REQUEST_METHOD"] === "POST"`).

![Kode Latihan 6](img/latihan6-kode.png)
![Preview Latihan 6](img/latihan6-preview.png)

#### Latihan 7 — Pengolahan Data Sederhana (`latihan7.php`)
Menghitung subtotal harga barang dengan validasi angka positif dan bilangan bulat pada kolom jumlah.

![Kode Latihan 7](img/latihan7-kode.png)
![Preview Validasi Error Latihan 7](img/latihan7-preview-error.png)
![Preview Hasil Valid Latihan 7](img/latihan7-preview-valid.png)

---

### 4. Mini Project — Formulir Data & Nilai Mahasiswa (`minProy.php`)

Pengembangan bertahap aplikasi formulir mahasiswa dengan validasi lengkap, perhitungan rata-rata nilai, validasi NIM 9 digit, dan tombol reset interaktif.

#### Tahap 1: Form Dasar, Validasi Wajib Isi, dan Ringkasan Data
![Kode Mini Project](img/minproy-kode.png)
![Preview Mini Project Valid](img/minproy-preview-valid.png)
![Preview Mini Project Error](img/minproy-preview-error.png)

#### Tahap 2: Penambahan Perhitungan Nilai Rata-rata (Tugas, UTS, UAS)
Menambahkan 3 input komponen nilai (rentang `0–100`) dan menghitung rata-ratanya (`86.00` dari nilai `80`, `98`, dan `80`).

![Preview Validasi Komponen Nilai](img/minproy-nilai-error.png)
![Preview Hasil Rata-rata Nilai](img/minproy-nilai-valid.png)

#### Tahap 3: Validasi NIM 9 Digit Angka & Tombol Reset Interaktif
Memastikan NIM hanya berisi digit angka (`ctype_digit`) sebanyak 9 karakter, serta menambahkan tombol `Reset` berbasis JavaScript untuk mengosongkan input dan menampilkan notifikasi *"Data form sudah di-reset."*

![Preview Validasi NIM](img/minproy-validasi-nim.png)
![Preview Tombol Reset Form](img/minproy-tombol-reset.png)

---

### 5. Eksplorasi Mandiri (`eksMan.php`)

#### Pencarian Nama Mahasiswa dari Array dengan GET
Memfilter array asosiatif mahasiswa berdasarkan kata kunci nama secara *case-insensitive* menggunakan `array_filter()` dan `stripos()`, dilengkapi tombol `Reset` (`href="?"`).

![Kode Pencarian GET Array](img/eksman-get-kode.png)
![Preview Pencarian GET Array](img/eksman-get-preview.png)

#### Function Format Harga Rupiah (`formatRupiah`)
Mengubah angka numerik menjadi format mata uang Rupiah (`Rp1.500.000` dan `Rp750.000,00`) menggunakan `number_format()`.

![Kode Function Rupiah](img/eksman-rupiah-kode.png)
![Preview Function Rupiah](img/eksman-rupiah-preview.png)

---

### 6. Manajemen Repository GitHub

Pembuatan repository `Lab7Web_PHP`, proses `git clone` ke direktori Laragon, serta `git add`, `git commit`, dan `git push origin main`.

![Create Repository GitHub](img/github-create-repo.png)
![Git Clone dan Push ke GitHub](img/github-git-push.png)

---

## Analisis Error Berdasarkan Dokumentasi Gambar

Berdasarkan tangkapan layar kode dan *preview* browser yang terlampir pada laporan praktikum, terdapat beberapa **error teknis/bug** maupun **error hasil pengujian validasi** yang dapat diidentifikasi:

### 1. Error Akses File Menggunakan Protokol `file:///` (Tahap Setup Awal)
![Error Akses Protokol File](img/04-error-file-protocol.png)

* **Kondisi pada Gambar:** Pada tangkapan layar awal saat membuka proyek, bilah alamat browser menampilkan `file:///C:/laragon/www/htdocs/lab7_php/` dan memunculkan tampilan direktori statis (`Index of C:\laragon\www\htdocs\lab7_php\`).
* **Penyebab:** File dibuka langsung dari sistem berkas lokal Windows tanpa melalui web server Apache. Browser tidak memiliki *interpreter* PHP sehingga kode `.php` tidak akan dieksekusi (hanya terbaca sebagai teks mentah atau diunduh).
* **Solusi:** Mengakses proyek melalui protokol HTTP web server lokal (misalnya `http://localhost/htdocs/lab7_php/` atau `http://localhost/htdocs/Lab7Web_PHP/`), seperti yang sudah diperbaiki pada tangkapan layar Latihan 1.

### 2. Bug *Variable Scope* dan Bobot Perhitungan pada `latihan4.php`
* **Kondisi pada Gambar:** Pada fungsi `hitungNilaiAkhir($tugas, $uts, $uas)`, variabel `$predikat` didefinisikan di dalam blok fungsi, namun fungsi hanya melakukan `return $nilaiAkhir;`. Kemudian di luar fungsi dijalankan perintah `echo "Predikat: " . $predikat;`. Selain itu, rumus perhitungan ditulis `($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.30)`.
* **Penyebab:**
  1. **Lingkup Variabel (*Variable Scope*):** Variabel `$predikat` bersifat lokal di dalam fungsi sehingga tidak dikenal di *global scope* (akan memicu `Warning: Undefined variable $predikat` jika dijalankan terpisah, atau terbawa nilai sisa `$predikat` dari skrip sebelumnya saat digabung).
  2. **Akumulasi Bobot:** Total bobot komponen nilai pada rumus tersebut baru berjumlah `0.90` (90%), kurang 10% dari total 100%.
* **Solusi:** Mengembalikan array `return [$nilaiAkhir, $predikat];` dari dalam fungsi dan menyesuaikan salah satu bobot komponen (misalnya UAS menjadi `0.40`).

### 3. Ketidaksesuaian Pesan Error dengan Logika Kondisi pada Validasi NIM (`minProy.php`)
* **Kondisi pada Gambar:** Pada kode validasi NIM tertulis kondisi `elseif (!ctype_digit($nim) || strlen($nim) !== 9)`, sedangkan pesan error yang ditampilkan berbunyi `"NIM harus berupa angka dan minimal terdiri dari 9 digit"`.
* **Penyebab:** Operator `!== 9` memeriksa apakah panjang string **tidak sama dengan 9** (artinya wajib tepat 9 digit, baik kurang dari 9 maupun lebih dari 9 akan ditolak), sedangkan teks pesan error menyebut kata *"minimal"*.
* **Solusi:** Menyelaraskan pesan error menjadi `"NIM harus berupa angka dan terdiri dari tepat 9 digit."` atau mengubah operator menjadi `strlen($nim) < 9` jika memang dimaksudkan sebagai batas minimal.

### 4. Error Validasi Input yang Berhasil Ditangkap Sistem (Pengujian Fungsional)
Pada beberapa tangkapan layar *preview*, terlihat pesan error yang memang sengaja dipicu untuk menguji keandalan validasi *server-side*:
* **Pengujian `latihan7.php`:** Menginput harga negatif (`-10000`) dan jumlah desimal (`10.0`) memicu pesan *"Periksa kembali nama barang, harga, dan jumlah."* karena gagal pada syarat `(float)$hargaInput < 0` dan `!ctype_digit((string)$jumlahInput)`.
* **Pengujian Form Kosong & Nilai Tidak Valid (`minProy.php`):** Dengan atribut `novalidate` pada `<form>`, pengiriman form kosong menampilkan seluruh daftar error wajib isi, validasi format email (`FILTER_VALIDATE_EMAIL`), rentang semester (`1–14`), rentang nilai (`0–100`), serta penolakan input huruf (`"adafaf"`) pada kolom NIM.

---

## Perbedaan Tombol Reset dengan Pemrosesan Ulang di Server

Tombol **reset** bekerja secara lokal di browser pengguna (*client-side*) untuk mengosongkan kolom input dan menyembunyikan tampilan hasil secara instan tanpa mengirim permintaan (*request*) ke server maupun memuat ulang halaman. Sebaliknya, **pemrosesan ulang di server** mengirimkan permintaan HTTP baru (`GET` atau `POST`) sehingga PHP mengeksekusi ulang seluruh skrip dari awal, mengevaluasi kembali variabel validasi serta perhitungan, lalu merender ulang halaman HTML yang baru—yang memakan sumber daya server dan berisiko memicu pengiriman data ganda (*form resubmission*) jika dilakukan melalui *refresh* browser setelah metode `POST`.

---

## Jawaban Pertanyaan Evaluasi

1. **Perbedaan pemrosesan *client-side* dan *server-side*:** *Client-side* dieksekusi langsung di browser pengguna (seperti HTML, CSS, dan JavaScript) untuk mengatur tampilan serta interaksi secara instan, sedangkan *server-side* dijalankan di komputer server (seperti PHP) untuk memproses logika program, keamanan, dan database sebelum hasilnya dikirimkan ke browser.
2. **Alasan file PHP harus dijalankan melalui web server:** Browser hanya dapat membaca dokumen web standar seperti HTML dan tidak memiliki *interpreter* untuk menerjemahkan sintaksis PHP. Web server (bersama *engine* PHP) bertugas mengeksekusi kode PHP tersebut terlebih dahulu dan mengubah output-nya menjadi HTML murni agar bisa ditampilkan browser.
3. **Fungsi tanda `$` pada variabel PHP:** Tanda `$` berfungsi sebagai penanda sintaksis (*prefix*) untuk mendeklarasikan sekaligus memanggil variabel, sehingga *interpreter* PHP dapat membedakan variabel dari fungsi, konstanta, maupun kata kunci (*keyword*) lainnya.
4. **Perbedaan metode GET dan POST:** Metode **GET** mengirimkan data secara terbuka melalui parameter URL (*query string*) dengan kapasitas terbatas sehingga cocok untuk fitur pencarian, sedangkan metode **POST** mengirimkan data secara tersembunyi di dalam *body* permintaan HTTP sehingga lebih aman dan mampu menampung data sensitif maupun berukuran besar.
5. **Pentingnya validasi input di sisi server:** Validasi di sisi klien (atribut HTML atau JavaScript) dapat dengan mudah dimatikan atau dimanipulasi pengguna melalui *Inspect Element* browser, sehingga validasi server wajib dilakukan untuk menjaga keakuratan format data dan mencegah celah keamanan sebelum data diproses lebih lanjut.
6. **Fungsi `htmlspecialchars()` saat menampilkan data form:** Mengonversi karakter khusus HTML (seperti `<`, `>`, `&`, dan `"`) menjadi entitas teks biasa agar tag HTML atau skrip berbahaya yang diinput pengguna tidak dieksekusi oleh browser, sehingga mencegah serangan *Cross-Site Scripting* (XSS).
7. **Manfaat penggunaan `function` dalam program PHP:** Membuat struktur kode lebih rapi dan modular, memungkinkan blok kode dipakai berulang kali tanpa harus menulis ulang (*reusability*), serta mempermudah proses pelacakan kesalahan (*debugging*) dan pemeliharaan program.

---

## Cara Menjalankan Proyek

1. Pastikan **Laragon** (atau web server lokal seperti XAMPP) sudah terinstal dan layanan **Apache** dalam keadaan aktif (*Start All*).
2. Clone repository ini ke dalam folder root web server (`C:\laragon\www\htdocs\`):
   ```bash
   git clone https://github.com/ZiQax/Lab7Web_PHP.git
   ```
3. Buka browser dan akses melalui alamat:
   ```text
   http://localhost/htdocs/Lab7Web_PHP/
   ```
4. Pilih file latihan atau mini project (misalnya `minProy.php` atau `eksMan.php`) yang ingin dijalankan.