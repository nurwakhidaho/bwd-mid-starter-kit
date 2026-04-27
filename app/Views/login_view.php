<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Bazaar Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --p-green: #1B4332; --a-gold: #D4AF37; }
        body {
            background: linear-gradient(135deg, var(--p-green) 0%, #081c15 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .login-card {
            background: white; border-radius: 24px; padding: 45px; width: 100%; max-width: 400px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4); border-top: 6px solid var(--a-gold);
        }
        .brand { font-size: 2.5rem; font-weight: 800; color: var(--p-green); letter-spacing: -1px; }
        .tagline { color: var(--a-gold); font-size: 0.75rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 30px; }
        .btn-login {
            background: var(--a-gold); color: white; border: none; border-radius: 12px;
            padding: 14px; font-weight: 800; width: 100%; transition: 0.3s;
        }
        .btn-login:hover { background: #b5952f; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="login-card text-center">
        <div class="brand">Bazaar</div>
        <div class="tagline">Marketplace Berkah</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2 small fw-bold"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('index.php/auth/process') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3 text-start">
                <label class="form-label fw-bold small text-muted">USERNAME</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Pengguna" required>
            </div>
            <div class="mb-4 text-start">
                <label class="form-label fw-bold small text-muted">PASSWORD</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn btn-login shadow">MASUK KE DASHBOARD</button>
        </form>
    </div>
</body>
</html>