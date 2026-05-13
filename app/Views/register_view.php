<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | Bazaar Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --p-green: #1B4332;
            --a-gold: #D4AF37;
        }

        body {
            background: linear-gradient(135deg, var(--p-green) 0%, #081c15 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            padding: 45px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            border-top: 6px solid var(--a-gold);
        }

        .brand {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--p-green);
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand i {
            color: var(--a-gold);
            font-size: 2rem;
            margin-right: 10px;
        }

        .tagline {
            color: var(--a-gold);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #555;
            transition: 0.3s;
            font-weight: 900 !important;
            font-size: 1.1rem;
        }

        .toggle-password:hover {
            color: var(--p-green);
        }

        .btn-login {
            background: var(--a-gold);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 800;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #b5952f;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="login-card text-center">
        <div class="brand">
            <i class="fas fa-gem"></i> BAZAAR
        </div>
        <div class="tagline">Marketplace Berkah</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small fw-bold"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('index.php/auth/register/process') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">NAMA LENGKAP</label>
                <!-- value dipertahankan agar tidak kosong saat validasi gagal -->
                <input type="text"
                       name="nama"
                       class="form-control"
                       placeholder="Masukkan Nama Lengkap"
                       value="<?= old('nama') ?>"
                       required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">USERNAME</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Buat Nama Pengguna"
                       value="<?= old('username') ?>"
                       required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">PASSWORD</label>
                <div class="password-container">
                    <input type="password"
                           name="password"
                           id="passwordInput"
                           class="form-control"
                           placeholder="Buat Password (min. 6 karakter)"
                           required
                           style="padding-right: 45px;">
                    <i class="fas fa-eye toggle-password"
                       id="toggleIcon"
                       onclick="togglePassword('passwordInput', 'toggleIcon')"></i>
                </div>
            </div>

            <div class="mb-4 text-start">
                <label class="form-label fw-bold small text-muted">KONFIRMASI PASSWORD</label>
                <div class="password-container">
                    <input type="password"
                           name="konfirmasi_password"
                           id="konfirmasiInput"
                           class="form-control"
                           placeholder="Ulangi Password"
                           required
                           style="padding-right: 45px;">
                    <i class="fas fa-eye toggle-password"
                       id="toggleIconKonfirmasi"
                       onclick="togglePassword('konfirmasiInput', 'toggleIconKonfirmasi')"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-login shadow">BUAT AKUN</button>
        </form>

        <div class="mt-4">
            <p class="text-muted small mb-0">Sudah punya akun?
                <a href="<?= base_url('index.php/') ?>"
                   class="fw-bold text-decoration-none"
                   style="color: var(--p-green);">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>

    <script>
        // Fungsi toggle password diparameterisasi agar bisa dipakai
        // untuk dua field sekaligus tanpa duplikasi kode
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>