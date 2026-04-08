<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Bazaar - Marketplace Syariah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1B4332;
            --accent-gold: #D4AF37;
            --soft-green: #2D6A4F;
        }
        body {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            padding: 50px 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            text-align: center;
        }
        .brand-logo {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-bottom: 5px;
            letter-spacing: -1px;
        }
        .brand-subtitle {
            color: var(--accent-gold);
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 35px;
        }
        .form-label {
            font-weight: 600;
            color: var(--primary-green);
            font-size: 0.85rem;
        }
        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: var(--soft-green);
            box-shadow: 0 0 0 0.25rem rgba(45, 106, 79, 0.1);
        }
        .btn-login {
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: var(--soft-green);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(27, 67, 50, 0.3);
            color: white;
        }
        .footer-text {
            margin-top: 30px;
            font-size: 0.8rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand-logo">Bazaar</div>
        <div class="brand-subtitle">Belanja Berkah</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger border-0 rounded-3 small py-2">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Perhatikan action diarahkan ke auth/process sesuai routes kamu -->
        <form action="auth/process" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3 text-start">
                <label class="form-label">Identitas Pengguna</label>
                <input type="text" name="username" class="form-control" placeholder="admin" required>
            </div>
            <div class="mb-4 text-start">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-login">Masuk ke Ekosistem</button>
        </form>

        <div class="footer-text">
            &copy; 2026 Bazaar Indonesia. <br> Seluruh transaksi diawasi Dewan Syariah.
        </div>
    </div>
</body>
</html>