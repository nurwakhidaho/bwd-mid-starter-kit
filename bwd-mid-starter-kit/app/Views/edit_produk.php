<?php
/** @var array  $produk */
/** @var string $nama_startup */
/** @var string $username */
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Bazaar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --p-green: #1B4332;
            --accent-gold: #D4AF37;
            --bg: #F8FAF9;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: #333; }
        .navbar { background: white !important; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .navbar-brand { font-weight: 800; color: var(--p-green) !important; font-size: 1.5rem; letter-spacing: -1px; }
        .form-card {
            background: white; border-radius: 24px; padding: 45px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.04);
            max-width: 680px; margin: 50px auto;
        }
        .form-label { font-weight: 700; font-size: 0.85rem; color: #444; text-transform: uppercase; letter-spacing: 0.8px; }
        .form-control, .form-select {
            border: 1.5px solid #e8e8e8; border-radius: 14px;
            padding: 14px 18px; font-size: 0.95rem;
            transition: 0.3s; background: #fafafa;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--p-green);
            box-shadow: 0 0 0 3px rgba(27,67,50,0.08);
            background: white;
        }
        .btn-simpan {
            background: linear-gradient(135deg, var(--p-green) 0%, #2D6A4F 100%);
            color: white; border: none; border-radius: 14px;
            padding: 14px 40px; font-weight: 700; font-size: 1rem;
            transition: 0.3s; box-shadow: 0 6px 20px rgba(27,67,50,0.2);
            width: 100%;
        }
        .btn-simpan:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(27,67,50,0.3); }
        .btn-batal {
            background: white; color: #666; border: 1.5px solid #e8e8e8;
            border-radius: 14px; padding: 14px 40px; font-weight: 600;
            font-size: 1rem; transition: 0.3s; width: 100%;
            text-decoration: none; display: block; text-align: center;
        }
        .btn-batal:hover { border-color: #ccc; color: #333; }
        .page-title { font-weight: 800; color: var(--p-green); font-size: 1.5rem; margin-bottom: 6px; }
        .page-sub { color: #999; font-size: 0.9rem; margin-bottom: 35px; }
        .divider { border: none; border-top: 1.5px dashed #eee; margin: 30px 0; }
        .badge-id {
            background: #f0faf4; color: var(--p-green);
            border-radius: 10px; padding: 6px 14px;
            font-size: 0.8rem; font-weight: 700;
            border: 1px solid #d4f0e0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('index.php/dashboard') ?>">
            <i class="fas fa-gem me-2" style="color: var(--accent-gold);"></i> BAZAAR
        </a>
        <div class="ms-auto">
            <a href="<?= base_url('index.php/dashboard') ?>" class="btn btn-sm btn-outline-success px-4 rounded-pill fw-bold border-2">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="form-card">
        <div class="d-flex align-items-center justify-content-between mb-1">
            <p class="page-title mb-0"><i class="fas fa-pen me-2" style="color: var(--accent-gold);"></i> Edit Produk</p>
            <span class="badge-id">ID #<?= $produk['id']; ?></span>
        </div>
        <p class="page-sub">Ubah detail produk yang sudah terdaftar di katalog Bazaar.</p>

        <form action="<?= base_url('index.php/update/' . $produk['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name" class="form-control"
                       value="<?= $produk['name']; ?>" required>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control"
                           value="<?= $produk['price']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stock" class="form-control"
                           value="<?= $produk['stock']; ?>" required>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="category" class="form-control"
                           value="<?= $produk['category']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Akad</label>
                    <select name="akad" class="form-select">
                        <option value="Murabahah" <?= $produk['akad'] === 'Murabahah' ? 'selected' : ''; ?>>Murabahah</option>
                        <option value="Ijarah"    <?= $produk['akad'] === 'Ijarah'    ? 'selected' : ''; ?>>Ijarah</option>
                    </select>
                </div>
            </div>

            <hr class="divider">

            <div class="row g-3">
                <div class="col-md-8">
                    <button type="submit" class="btn-simpan">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
                <div class="col-md-4">
                    <a href="<?= base_url('index.php/dashboard') ?>" class="btn-batal">Batal</a>
                </div>
            </div>

        </form>
    </div>
</div>

</body>
</html>