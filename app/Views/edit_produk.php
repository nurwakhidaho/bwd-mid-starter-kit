<?php

/** @var array  $produk */
/** @var string $nama_startup */
/** @var string $username */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
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

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 45px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
            max-width: 680px;
            margin: 50px auto;
        }

        .btn-simpan {
            background: linear-gradient(135deg, var(--p-green), #2D6A4F);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 40px;
            font-weight: 700;
            width: 100%;
            transition: 0.3s;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(27, 67, 50, 0.2);
        }

        .img-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 15px;
            border: 2px solid var(--accent-gold);
            padding: 3px;
        }

        .upload-box {
            background: #fdfdfd;
            border: 2px dashed #e0e0e0;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top" style="background:white;box-shadow:0 2px 10px rgba(0,0,0,0.05);">
        <div class="container">
            <a class="navbar-brand fw-800" style="color:var(--p-green);" href="<?= base_url('index.php/dashboard') ?>">
                <i class="fas fa-gem me-2" style="color:var(--accent-gold);"></i> BAZAAR
            </a>
            <div class="ms-auto">
                <a href="<?= base_url('index.php/dashboard') ?>" class="btn btn-sm btn-outline-success px-4 rounded-pill fw-bold">
                    Kembali
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <p class="fw-800 text-success fs-5 mb-1">
                <i class="fas fa-pen me-2"></i> Edit Produk
                <span class="badge bg-light text-success ms-2">ID #<?= $produk['id']; ?></span>
            </p>
            <p class="text-muted small mb-4">Ubah detail produk yang sudah terdaftar.</p>

            <form action="<?= base_url('index.php/update/' . $produk['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="<?= $produk['name']; ?>" required>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control" value="<?= $produk['price']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Stok</label>
                        <input type="number" name="stock" class="form-control" value="<?= $produk['stock']; ?>" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Kategori</label>
                        <input type="text" name="category" class="form-control" value="<?= $produk['category']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-uppercase">Akad</label>
                        <select name="akad" class="form-select">
                            <option value="Murabahah" <?= $produk['akad'] === "Murabahah" ? "selected" : "" ?>>Murabahah</option>
                            <option value="Ijarah" <?= $produk['akad'] === "Ijarah" ? "selected" : "" ?>>Ijarah</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Foto Produk</label>
                    <div class="upload-box">
                        <div class="mb-3">
                            <?php if (!empty($produk['image'])): ?>
                                <img src="<?= base_url('uploads/produk/' . $produk['image']) ?>" class="img-preview" alt="Foto Lama">
                                <p class="text-muted tiny mt-2" style="font-size: 0.7rem;">File saat ini: <?= $produk['image']; ?></p>
                            <?php else: ?>
                                <div class="text-muted small py-3">
                                    <i class="fas fa-image fa-2x mb-2 d-block"></i>
                                    Belum ada foto produk
                                </div>
                            <?php endif; ?>
                        </div>

                        <input type="file" name="gambar" class="form-control form-control-sm" accept="image/*">
                        <div class="form-text small text-start">Pilih file baru jika ingin mengganti foto (JPG/PNG, Max 2MB).</div>
                    </div>
                </div>

                <hr class="my-4">
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</body>

</html>