<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Bazaar Marketplace</title>
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
            margin: 0;
        }

        .register-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
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
            color: #555;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: var(--p-green);
            box-shadow: 0 0 0 0.25rem rgba(27, 67, 50, 0.1);
        }

        .btn-register {
            background: var(--p-green);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 800;
            width: 100%;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #2d5a47;
            transform: translateY(-2px);
            color: white;
        }

        .login-link {
            color: var(--a-gold);
            font-weight: 700;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-card text-center">
        <div class="brand">
            <i class="fas fa-gem"></i> BAZAAR
        </div>
        <div class="tagline">Pendaftaran Mitra</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small fw-bold mb-3"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('index.php/auth/register_process') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">USERNAME BARU</label>
                <input type="text" name="username" class="form-control" placeholder="Buat Nama Pengguna" required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">ALAMAT EMAIL</label>
                <input type="email" name="email" class="form-control" placeholder="masukkan@email.com" required>
            </div>

            <div class="mb-4 text-start">
                <label class="form-label fw-bold small text-muted">PASSWORD</label>
                <input type="password" name="password" class="form-control" placeholder="Buat Password Kuat" required>
            </div>

            <button type="submit" class="btn btn-register shadow mb-3">DAFTAR SEKARANG</button>
        </form>

        <div class="mt-2 small">
            <span class="text-muted">Sudah punya akun?</span>
            <a href="<?= base_url('index.php/') ?>" class="login-link">Kembali ke Login</a>
        </div>
    </div>
</body>

</html>