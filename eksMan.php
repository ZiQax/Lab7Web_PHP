 <?php
    $data = null;
    $error = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $nim = trim($_POST["nim"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        $semesterInput = $_POST["semester"] ?? "";
        $email = trim($_POST["email"] ?? "");

        $tugasInput = trim($_POST["tugas"] ?? "");
        $utsInput = trim($_POST["uts"] ?? "");
        $uasInput = trim($_POST["uas"] ?? "");

        if ($nama === "") $error[] = "Nama wajib diisi.";

        if ($nim === "") {
            $error[] = "NIM wajib diisi.";
        } elseif (!ctype_digit($nim) || strlen($nim) !== 9) {
            $error[] = "NIM harus berupa angka dan minimal terdiri dari 9 digit";
        }

        if ($prodi === "") $error[] = "Program studi wajib diisi.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Format email tidak valid.";
        }
        if (
            !ctype_digit((string)$semesterInput) ||
            (int)$semesterInput < 1 || (int)$semesterInput > 14
        ) {
            $error[] = "Semester harus berupa angka 1–14.";
        }

        // validasi tiga komponen nlai
        $komponenNilai = [
            "Nilai Tugas" => $tugasInput,
            "Nilai UTS"   => $utsInput,
            "Nilai UAS"   => $uasInput,
        ];
        foreach ($komponenNilai as $label => $nilai) {
            if ($nilai === "" || !is_numeric($nilai) || (float)$nilai < 0 || (float)$nilai > 100) {
                $error[] = "$label harus berupa angka 0–100.";
            }
        }

        if (!$error) {
            $tugas = (float)$tugasInput;
            $uts = (float)$utsInput;
            $uas = (float)$uasInput;

            // Perhitungan nilai rata-rata dari tiga komponen
            $rataRata = ($tugas + $uts + $uas) / 3;

            $data = compact("nama", "nim", "prodi", "email", "tugas", "uts", "uas", "rataRata");
            $data["semester"] = (int)$semesterInput;
        }
    }
    ?>

    <h2>Input Data Mahasiswa</h2>

    <!-- Atribut novalidate-->
    <form id="form-mahasiswa" method="POST" action="" novalidate>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= !$data ? htmlspecialchars($_POST['nama'] ?? '') : '' ?>">
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?= !$data ? htmlspecialchars($_POST['nim'] ?? '') : '' ?>">
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi" value="<?= !$data ? htmlspecialchars($_POST['prodi'] ?? '') : '' ?>">
        </div>

        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" id="semester" name="semester" min="1" max="14" value="<?= !$data ? htmlspecialchars($_POST['semester'] ?? '') : '' ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= !$data ? htmlspecialchars($_POST['email'] ?? '') : '' ?>">
        </div>
        <div class="nilai-grid">
            <div class="form-group">
                <label for="tugas">Nilai Tugas</label>
                <input type="number" id="tugas" name="tugas" step="0.01" min="0" max="100" value="<?= !$data ? htmlspecialchars($_POST['tugas'] ?? '') : '' ?>">
            </div>

            <div class="form-group">
                <label for="uts">Nilai UTS</label>
                <input type="number" id="uts" name="uts" step="0.01" min="0" max="100" value="<?= !$data ? htmlspecialchars($_POST['uts'] ?? '') : '' ?>">
            </div>

            <div class="form-group">
                <label for="uas">Nilai UAS</label>
                <input type="number" id="uas" name="uas" step="0.01" min="0" max="100" value="<?= !$data ? htmlspecialchars($_POST['uas'] ?? '') : '' ?>">
            </div>
        </div>

        <div class="btn-group">
            <button type="submit">Hitung & Kirim Data</button>
            <button type="reset">Reset</button>
        </div>
    </form>

    <!-- Tampilan teks saat tombol Reset ditekan -->
    <div id="reset-box" class="reset-box" style="display: none;">
        Data form sudah di-reset.
    </div>

    <!-- Bagian Tampilan Hasil -->
    <?php if (!empty($error)): ?>
        <div class="error-box">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                <?php foreach ($error as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($data): ?>
        <div class="result-box">
            <h3>Ringkasan Data Mahasiswa</h3>
            <ul>
                <li><strong>Nama:</strong> <?= htmlspecialchars($data["nama"]) ?></li>
                <li><strong>NIM:</strong> <?= htmlspecialchars($data["nim"]) ?></li>
                <li><strong>Program Studi:</strong> <?= htmlspecialchars($data["prodi"]) ?></li>
                <li><strong>Semester:</strong> <?= htmlspecialchars((string)$data["semester"]) ?></li>
                <li><strong>Email:</strong> <?= htmlspecialchars($data["email"]) ?></li>
                <li><strong>Rincian Nilai:</strong> Tugas (<?= $data["tugas"] ?>), UTS (<?= $data["uts"] ?>), UAS (<?= $data["uas"] ?>)</li>
                <li><strong>Nilai Rata-rata:</strong> <?= number_format($data["rataRata"], 2) ?></li>
            </ul>
        </div>
    <?php endif; ?>

    <?php
    // Array data sederhana berisi daftar mahasiswa
    $daftarMahasiswa = [
        ["nama" => "Ahmad Fauzi",   "nim" => "312410001", "prodi" => "Teknik Informatika"],
        ["nama" => "Budi Santoso",  "nim" => "312410002", "prodi" => "Sistem Informasi"],
        ["nama" => "Citra Lestari", "nim" => "312410003", "prodi" => "Teknik Informatika"],
        ["nama" => "Dimas Pratama", "nim" => "312410004", "prodi" => "Teknik Industri"],
        ["nama" => "Eka Putri",     "nim" => "312410005", "prodi" => "Sistem Informasi"],
    ];

    // Ambil kata kunci dari query string URL ($_GET['cari'])
    $keyword = trim($_GET["cari"] ?? "");
    $hasilPencarian = $daftarMahasiswa;

    // Lakukan pencarian jika kata kunci tidak kosong
    if ($keyword !== "") {
        $hasilPencarian = array_filter($daftarMahasiswa, function ($mhs) use ($keyword) {
            // stripos() mencari substring tanpa membedakan huruf besar/kecil
            return stripos($mhs["nama"], $keyword) !== false;
        });
    }
    ?>
    <h2>Pencarian Data Mahasiswa</h2>

    <!-- Form menggunakan method="GET" sehingga parameter pencarian muncul di URL (?cari=...) -->
    <form method="GET" action="" class="search-box">
        <input
            type="text"
            name="cari"
            placeholder="Ketik nama yang dicari..."
            value="<?= htmlspecialchars($keyword) ?>">
        <button type="submit">Cari</button>
        <?php if ($keyword !== ""): ?>
            <a href="?" class="reset-btn">Reset</a>
        <?php endif; ?>
    </form>

    <?php if ($keyword !== ""): ?>
        <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($keyword) ?></strong></p>
    <?php endif; ?>

    <?php if (empty($hasilPencarian)): ?>
        <div class="empty">Nama "<?= htmlspecialchars($keyword) ?>" tidak ditemukan dalam data.</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hasilPencarian as $mhs): ?>
                    <tr>
                        <td><?= htmlspecialchars($mhs["nim"]) ?></td>
                        <td><?= htmlspecialchars($mhs["nama"]) ?></td>
                        <td><?= htmlspecialchars($mhs["prodi"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php
    function formatRupiah($ank, $bildes = 0)
    {
        return "Rp" . number_format((float)$ank, $bildes, ",", ".");
    }

    $harga_normal = 1500000;
    $harga_promo = 750000;

    echo formatRupiah($harga_normal) . "<br>";
    echo formatRupiah($harga_promo, 2) . "<br>";

    ?>

    <script>
        const form = document.getElementById("form-mahasiswa");
        const resetBox = document.getElementById("reset-box");

        form.addEventListener("reset", function(e) {
            e.preventDefault();

            // Kosongkan seluruh kolom input, termasuk nilai sticky sisa validasi PHP
            form.querySelectorAll("input").forEach(function(input) {
                input.value = "";
            });

            // Sembunyikan kotak error atau ringkasan hasil sebelumnya jika masih tampil
            document.querySelectorAll(".error-box, .result-box").forEach(function(box) {
                box.style.display = "none";
            });

            // Munculkan teks konfirmasi reset
            resetBox.style.display = "block";
        });
    </script>

</body>

</html>