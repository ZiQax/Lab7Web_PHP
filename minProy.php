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