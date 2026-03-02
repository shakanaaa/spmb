<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - SPMB Universitas Hijau</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --hijau-utama: #2E8B57;
            --hijau-gelap: #1F5F3F;
            --hijau-terang: #E8F5E9;
            --hijau-pudar: #C8E6C9;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }

        /* Navbar Styling (sama dengan halaman utama) */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-link {
            font-weight: 500;
            color: var(--hijau-gelap) !important;
            margin: 0 10px;
        }
        .nav-link:hover {
            color: var(--hijau-utama) !important;
        }
        .btn-kembali {
            background-color: var(--hijau-utama);
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .btn-kembali:hover {
            background-color: var(--hijau-gelap);
            color: white;
        }
        
        /* Form Container */
        .form-container {
            margin-top: 100px;
            margin-bottom: 50px;
        }
        .form-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .form-card h2 {
            font-weight: 600;
            color: var(--hijau-gelap);
            margin-bottom: 30px;
        }

        /* Progress Bar */
        .progress-bar-container {
            list-style: none;
            display: flex;
            justify-content: space-between;
            padding: 0;
            margin-bottom: 50px;
            position: relative;
        }
        .progress-bar-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            height: 4px;
            width: 100%;
            background-color: #e0e0e0;
            z-index: 0;
        }
        .progress-step {
            position: relative;
            z-index: 1;
            text-align: center;
            flex: 1;
        }
        .progress-step .step-icon {
            width: 40px;
            height: 40px;
            background-color: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: white;
            font-weight: 600;
            transition: background-color 0.4s;
        }
        .progress-step.active .step-icon {
            background-color: var(--hijau-utama);
        }
        .progress-step.completed .step-icon {
            background-color: var(--hijau-gelap);
        }
        .progress-step p {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 500;
            color: #aaa;
            transition: color 0.4s;
        }
        .progress-step.active p {
            color: var(--hijau-utama);
        }
        .progress-step.completed p {
            color: var(--hijau-gelap);
        }

        /* Form Step */
        .form-step {
            display: none;
        }
        .form-step.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--hijau-utama);
            box-shadow: 0 0 0 0.2rem rgba(46, 139, 87, 0.25);
        }
        .btn-prev, .btn-next {
            padding: 10px 25px;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-next {
            background-color: var(--hijau-utama);
            border-color: var(--hijau-utama);
        }
        .btn-next:hover {
            background-color: var(--hijau-gelap);
            border-color: var(--hijau-gelap);
        }
        .btn-prev {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-submit {
            background-color: var(--hijau-gelap);
            border-color: var(--hijau-gelap);
            padding: 12px 30px;
            font-size: 1.1rem;
        }
        .btn-submit:hover {
            background-color: #163a28;
            border-color: #163a28;
        }

        /* File Upload Styling */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }
        .file-upload-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }
        .file-upload-label {
            display: block;
            padding: 10px 15px;
            border: 1px dashed #ced4da;
            border-radius: 8px;
            background-color: #f8f9fa;
            text-align: center;
            color: #495057;
            transition: all 0.3s;
        }
        .file-upload-label:hover {
            background-color: var(--hijau-terang);
            border-color: var(--hijau-pudar);
        }
        .file-upload-filename {
            margin-top: 5px;
            font-size: 0.9rem;
            color: var(--hijau-gelap);
            font-weight: 500;
        }

        /* Review Table */
        .review-table th {
            font-weight: 600;
            color: var(--hijau-gelap);
            width: 30%;
        }
        .review-table td {
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.html"><i class="bi bi-mortarboard-fill"></i> Universitas Hijau</a>
                <div class="ms-auto">
                    <a href="index.html" class="btn btn-kembali"><i class="bi bi-arrow-left"></i> Kembali ke Halaman Utama</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="form-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="form-card">
                        <h2 class="text-center">Formulir Pendaftaran Mahasiswa Baru</h2>
                        
                        <!-- Progress Bar -->
                        <ul class="progress-bar-container">
                            <li class="progress-step active" data-step="1">
                                <div class="step-icon">1</div>
                                <p>Data Diri</p>
                            </li>
                            <li class="progress-step" data-step="2">
                                <div class="step-icon">2</div>
                                <p>Data Akademik</p>
                            </li>
                            <li class="progress-step" data-step="3">
                                <div class="step-icon">3</div>
                                <p>Pilihan Program</p>
                            </li>
                            <li class="progress-step" data-step="4">
                                <div class="step-icon">4</div>
                                <p>Upload Dokumen</p>
                            </li>
                            <li class="progress-step" data-step="5">
                                <div class="step-icon">5</div>
                                <p>Konfirmasi</p>
                            </li>
                        </ul>

                        <!-- Multi-Step Form -->
                        <form id="regForm">
                            <!-- Step 1: Data Diri -->
                            <div class="form-step active" id="step1">
                                <h4>Langkah 1: Data Diri</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="namaLengkap" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="namaLengkap" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK) *</label>
                                        <input type="text" class="form-control" id="nik" pattern="[0-9]{16}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tempatLahir" class="form-label">Tempat Lahir *</label>
                                        <input type="text" class="form-control" id="tempatLahir" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggalLahir" class="form-label">Tanggal Lahir *</label>
                                        <input type="date" class="form-control" id="tanggalLahir" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jenisKelamin" class="form-label">Jenis Kelamin *</label>
                                        <select class="form-select" id="jenisKelamin" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="agama" class="form-label">Agama *</label>
                                        <select class="form-select" id="agama" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan *</label>
                                        <input type="text" class="form-control" id="kewarganegaraan" value="WNI" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="alamat" class="form-label">Alamat Lengkap *</label>
                                        <textarea class="form-control" id="alamat" rows="2" required></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email Aktif *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="noHp" class="form-label">No. HP (WhatsApp) *</label>
                                        <input type="tel" class="form-control" id="noHp" pattern="[0-9]{10,13}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Data Akademik -->
                            <div class="form-step" id="step2">
                                <h4>Langkah 2: Data Akademik</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="namaSekolah" class="form-label">Nama Asal Sekolah *</label>
                                        <input type="text" class="form-control" id="namaSekolah" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jenisSekolah" class="form-label">Jenis Sekolah *</label>
                                        <select class="form-select" id="jenisSekolah" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="MA">MA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jurusanSekolah" class="form-label">Jurusan *</label>
                                        <input type="text" class="form-control" id="jurusanSekolah" placeholder="Contoh: IPA, IPS, TKJ, Akuntansi" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahunLulus" class="form-label">Tahun Lulus *</label>
                                        <select class="form-select" id="tahunLulus" required>
                                            <option value="" selected disabled>Pilih...</option>
                                            <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nilaiRata" class="form-label">Nilai Rata-Rata Rapor (Semester 5-6) *</label>
                                        <input type="number" class="form-control" id="nilaiRata" step="0.01" min="0" max="100" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Pilihan Program -->
                            <div class="form-step" id="step3">
                                <h4>Langkah 3: Pilihan Program Studi</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="pilihan1" class="form-label">Pilihan 1 *</label>
                                        <select class="form-select" id="pilihan1" required>
                                            <option value="" selected disabled>-- Pilih Program Studi --</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Psikologi">Psikologi</option>
                                            <option value="Agroteknologi">Agroteknologi</option>
                                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                            <option value="Ilmu Hukum">Ilmu Hukum</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pilihan2" class="form-label">Pilihan 2</label>
                                        <select class="form-select" id="pilihan2">
                                            <option value="" selected disabled>-- Pilih Program Studi --</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Psikologi">Psikologi</option>
                                            <option value="Agroteknologi">Agroteknologi</option>
                                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                            <option value="Ilmu Hukum">Ilmu Hukum</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Upload Dokumen -->
                            <div class="form-step" id="step4">
                                <h4>Langkah 4: Upload Dokumen</h4>
                                <p class="text-muted">Silakan unggah dokumen-dokumen yang diperlukan dalam format PDF atau JPG (Maks. 2MB per file).</p>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="pasFoto" class="form-label">Pas Foto 3x4 (berwarna)</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" id="pasFoto" class="form-control" accept="image/jpeg,image/png" required>
                                            <label for="pasFoto" class="file-upload-label">
                                                <i class="bi bi-cloud-upload"></i> Klik untuk unggah file
                                            </label>
                                            <div class="file-upload-filename"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ijazah" class="form-label">Ijazah / SKL</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" id="ijazah" class="form-control" accept="application/pdf,image/jpeg,image/png" required>
                                            <label for="ijazah" class="file-upload-label">
                                                <i class="bi bi-cloud-upload"></i> Klik untuk unggah file
                                            </label>
                                            <div class="file-upload-filename"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="aktaKelahiran" class="form-label">Akta Kelahiran</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" id="aktaKelahiran" class="form-control" accept="application/pdf,image/jpeg,image/png" required>
                                            <label for="aktaKelahiran" class="file-upload-label">
                                                <i class="bi bi-cloud-upload"></i> Klik untuk unggah file
                                            </label>
                                            <div class="file-upload-filename"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rapor" class="form-label">Rapor (Semester 1-6)</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" id="rapor" class="form-control" accept="application/pdf" required>
                                            <label for="rapor" class="file-upload-label">
                                                <i class="bi bi-cloud-upload"></i> Klik untuk unggah file
                                            </label>
                                            <div class="file-upload-filename"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Konfirmasi -->
                            <div class="form-step" id="step5">
                                <h4>Langkah 5: Konfirmasi Data</h4>
                                <p>Mohon periksa kembali data yang Anda masukkan sebelum mengirimkan formulir.</p>
                                <table class="table review-table">
                                    <tbody>
                                        <tr><th>Nama Lengkap</th><td id="reviewNama"></td></tr>
                                        <tr><th>Email</th><td id="reviewEmail"></td></tr>
                                        <tr><th>No. HP</th><td id="reviewNoHp"></td></tr>
                                        <tr><th>Asal Sekolah</th><td id="reviewSekolah"></td></tr>
                                        <tr><th>Pilihan 1</th><td id="reviewPilihan1"></td></tr>
                                        <tr><th>Pilihan 2</th><td id="reviewPilihan2"></td></tr>
                                    </tbody>
                                </table>
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                        Saya menyatakan bahwa data yang diisi adalah benar dan bersedia mematuhi semua peraturan pendaftaran. *
                                    </label>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-prev" id="prevBtn" style="display:none;">Sebelumnya</button>
                                <button type="button" class="btn btn-next ms-auto" id="nextBtn">Selanjutnya</button>
                                <button type="submit" class="btn btn-primary btn-submit ms-auto" id="submitBtn" style="display:none;">Kirim Pendaftaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-5">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Pendaftaran Berhasil!</h4>
                    <p>Terima kasih, data Anda telah kami terima. Silakan cek email Anda secara berkala untuk informasi selanjutnya.</p>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        const form = document.getElementById('regForm');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const steps = Array.from(document.querySelectorAll('.form-step'));
        const progressSteps = Array.from(document.querySelectorAll('.progress-step'));
        let currentStep = 1;

        // --- FILE UPLOAD HANDLING ---
        document.querySelectorAll('input[type="file"]').forEach(input => {
            const label = input.nextElementSibling;
            const filenameDiv = label.nextElementSibling;
            
            input.addEventListener('change', (e) => {
                const fileName = e.target.files[0]?.name;
                if (fileName) {
                    filenameDiv.textContent = fileName;
                    label.innerHTML = `<i class="bi bi-check-circle-fill text-success"></i> ${fileName}`;
                } else {
                    filenameDiv.textContent = '';
                    label.innerHTML = `<i class="bi bi-cloud-upload"></i> Klik untuk unggah file`;
                }
            });
        });

        // --- MULTI-STEP FORM LOGIC ---
        function showStep(step) {
            steps.forEach((s, index) => {
                s.classList.toggle('active', index + 1 === step);
            });
            progressSteps.forEach((p, index) => {
                if (index + 1 < step) {
                    p.classList.add('completed');
                    p.classList.remove('active');
                } else if (index + 1 === step) {
                    p.classList.add('active');
                    p.classList.remove('completed');
                } else {
                    p.classList.remove('active', 'completed');
                }
            });

            // Update buttons
            prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
            nextBtn.style.display = step === steps.length ? 'none' : 'inline-block';
            submitBtn.style.display = step === steps.length ? 'inline-block' : 'none';

            // Populate review data on last step
            if (step === steps.length) {
                populateReview();
            }
        }

        function validateCurrentStep() {
            const currentStepElement = steps[currentStep - 1];
            const inputs = currentStepElement.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
                 // Special check for select
                 if (input.tagName === 'SELECT' && input.value === "") {
                    input.classList.add('is-invalid');
                    isValid = false;
                }
            });

            // Check for agreement checkbox on the last step
            if (currentStep === steps.length) {
                const agreeCheckbox = document.getElementById('agreeTerms');
                if (!agreeCheckbox.checked) {
                    agreeCheckbox.classList.add('is-invalid');
                    isValid = false;
                } else {
                    agreeCheckbox.classList.remove('is-invalid');
                }
            }

            if (!isValid) {
                alert('Harap lengkapi semua field yang wajib diisi.');
            }
            return isValid;
        }

        function populateReview() {
            document.getElementById('reviewNama').textContent = document.getElementById('namaLengkap').value;
            document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
            document.getElementById('reviewNoHp').textContent = document.getElementById('noHp').value;
            document.getElementById('reviewSekolah').textContent = document.getElementById('namaSekolah').value;
            document.getElementById('reviewPilihan1').textContent = document.getElementById('pilihan1').value;
            document.getElementById('reviewPilihan2').textContent = document.getElementById('pilihan2').value || '-';
        }

        nextBtn.addEventListener('click', () => {
            if (validateCurrentStep()) {
                currentStep++;
                showStep(currentStep);
            }
        });

        prevBtn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (validateCurrentStep()) {
                // In a real application, you would submit the form data to a server here.
                // For this demo, we'll just show a success modal.
                const modal = new bootstrap.Modal(document.getElementById('successModal'));
                modal.show();
                
                // Optionally, reset the form after successful submission
                form.reset();
                currentStep = 1;
                showStep(currentStep);
            }
        });

        // Initial display
        showStep(currentStep);
    </script>
</body>
</html>