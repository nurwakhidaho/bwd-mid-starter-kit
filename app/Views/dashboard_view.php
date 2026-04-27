<?php

/** @var string $nama_startup */
/** @var string $tagline */
/** @var string $username */
/** @var array  $products */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nama_startup; ?> - Marketplace Mewah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --p-green: #1B4332;
            --accent-gold: #D4AF37;
            --bg: #F8FAF9;
            --glass: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: #333;
        }

        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--p-green) !important;
            font-size: 1.5rem;
            letter-spacing: -1px;
        }

        .hero {
            background: linear-gradient(135deg, var(--p-green) 0%, #081c15 100%);
            border-radius: 24px;
            padding: 45px;
            color: white;
            margin: 30px 0;
            box-shadow: 0 15px 35px rgba(27, 67, 50, 0.2);
            position: relative;
            overflow: hidden;
        }

        .card-shopee {
            background: white;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
        }

        .card-shopee:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-gold);
        }

        .img-box {
            height: 220px;
            overflow: hidden;
            position: relative;
            background: radial-gradient(circle at center, #ffffff 0%, #f1f5f3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.6s ease;
        }

        .luxury-vector {
            width: 100px;
            height: 100px;
            filter: drop-shadow(0 10px 15px rgba(212, 175, 55, 0.3));
        }

        .card-shopee:hover .product-img {
            transform: scale(1.1);
        }

        .badge-akad {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--glass);
            backdrop-filter: blur(8px);
            color: var(--p-green);
            font-size: 0.65rem;
            font-weight: 800;
            padding: 6px 12px;
            border-radius: 30px;
            border: 1px solid var(--accent-gold);
            z-index: 2;
        }

        .p-content {
            padding: 20px;
            flex-grow: 1;
            text-align: center;
        }

        .p-cat {
            font-size: 0.65rem;
            font-weight: 800;
            color: var(--accent-gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        .p-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #1a1a1a;
            height: 2.8em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .p-price {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--p-green);
        }

        .card-footer-shopee {
            padding: 15px 20px 25px;
            background: #fff;
            display: flex;
            gap: 10px;
        }

        .btn-lihat {
            background: linear-gradient(135deg, var(--p-green) 0%, #2D6A4F 100%);
            color: white;
            border: none;
            flex-grow: 1;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            padding: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit,
        .btn-hapus {
            padding: 12px 15px;
            border-radius: 12px;
            transition: 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .btn-edit {
            background: #fff;
            color: #1B4332;
            border: 1px solid #d4f0e0;
        }

        .btn-edit:hover {
            background: #1B4332;
            color: white;
        }

        .btn-hapus {
            background: #fff;
            color: #ff4d4d;
            border: 1px solid #ffeded;
        }

        .btn-hapus:hover {
            background: #ff4d4d;
            color: white;
        }

        .stat-badge {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            padding: 16px 24px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        .stat-badge .num {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
        }

        .stat-badge .lbl {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
        }

        .search-box {
            background: white;
            border: 1.5px solid #eee;
            border-radius: 14px;
            padding: 12px 20px;
            font-size: 0.9rem;
            width: 100%;
            max-width: 300px;
        }

        .flash-msg {
            position: fixed;
            top: 80px;
            right: 24px;
            z-index: 9999;
            background: white;
            border-left: 4px solid #1B4332;
            border-radius: 14px;
            padding: 16px 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-gem me-2" style="color: var(--accent-gold);"></i> BAZAAR</a>
            <div class="ms-auto d-flex align-items-center">
                <span class="small me-4 d-none d-md-inline">Admin Resmi: <strong class="text-success"><?= $username; ?></strong></span>
                <a href="<?= base_url('index.php/auth/logout') ?>" class="btn btn-sm btn-outline-danger px-4 rounded-pill fw-bold border-2">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="hero d-flex justify-content-between align-items-center flex-wrap gap-4">
            <div>
                <h2 class="fw-800 mb-2">Manajemen Inventaris</h2>
                <p class="mb-0 opacity-75 fs-6"><?= $tagline; ?></p>
            </div>
            <div class="d-flex gap-3 flex-wrap align-items-center">
                <div class="stat-badge">
                    <div class="num"><?= count($products); ?></div>
                    <div class="lbl">Total Produk</div>
                </div>
                <div class="stat-badge">
                    <div class="num"><?= array_sum(array_column($products, 'stock')); ?></div>
                    <div class="lbl">Total Stok</div>
                </div>
                <a href="<?= base_url('index.php/tambah') ?>" class="btn btn-light fw-bold text-success rounded-pill px-5 py-3 shadow-lg border-0">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Koleksi Baru
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h5 class="fw-bold m-0 text-uppercase small" style="color: #666; letter-spacing: 2px;">Katalog Koleksi Bazaar</h5>
            <div class="d-flex align-items-center gap-3">
                <input type="text" id="searchInput" class="search-box" placeholder="🔍 Cari produk...">
                <span class="badge bg-white text-dark border-0 py-2 px-4 rounded-pill shadow-sm">
                    <i class="fas fa-crown text-warning me-2"></i>
                    <span id="sku-count" class="fw-bold text-success">0</span> SKU Premium
                </span>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4" id="gridKatalog">
            <?php foreach ($products as $p): ?>
                <div class="col product-item">
                    <div class="card-shopee">
                        <div class="img-box">
                            <div class="badge-akad"><?= $p['akad']; ?></div>
                            <?php if (!empty($p['image']) && file_exists('uploads/produk/' . $p['image'])): ?>
                                <img src="<?= base_url('uploads/produk/' . $p['image']) ?>" class="product-img" alt="<?= $p['name']; ?>">
                            <?php else: ?>
                                <svg class="luxury-vector" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 6H21" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            <?php endif; ?>
                        </div>
                        <div class="p-content">
                            <div class="p-cat"><?= $p['category']; ?></div>
                            <div class="p-title"><?= $p['name']; ?></div>
                            <div class="p-price">Rp <?= number_format($p['price'], 0, ',', '.'); ?></div>
                            <div class="mt-3 text-muted small">
                                Stok: <strong class="text-dark"><?= $p['stock'] ?? 0; ?></strong>
                            </div>
                        </div>
                        <div class="card-footer-shopee">
                            <button class="btn-lihat" data-bs-toggle="modal" data-bs-target="#modalProduk"
                                data-name="<?= $p['name']; ?>" data-category="<?= $p['category']; ?>"
                                data-akad="<?= $p['akad']; ?>" data-price="<?= $p['price']; ?>"
                                data-stock="<?= $p['stock'] ?? 0; ?>">
                                <i class="fas fa-eye me-2"></i> Detail
                            </button>
                            <a href="<?= base_url('index.php/edit/' . $p['id']) ?>" class="btn-edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('index.php/hapus/' . $p['id']) ?>" class="btn-hapus" onclick="return confirm('Hapus?')"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="modal fade" id="modalProduk" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="border-radius: 20px;">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span id="m-category" class="badge bg-light text-success text-uppercase"></span>
                        <span id="m-akad" class="fw-bold text-warning"></span>
                    </div>
                    <h4 id="m-name" class="fw-800 mb-2"></h4>
                    <h3 id="m-price" class="text-success fw-800 mb-4"></h3>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-muted">Jumlah Stok:</span>
                        <span id="m-stock" class="badge bg-dark px-3 py-2"></span>
                    </div>
                    <button type="button" class="btn btn-success w-100 mt-4 py-3 fw-bold rounded-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi update angka SKU
        function updateSKU() {
            const visibleItems = [...document.querySelectorAll('.product-item')].filter(i => i.style.display !== 'none').length;
            document.getElementById('sku-count').innerText = visibleItems;
        }

        updateSKU();

        // Logika Modal
        document.getElementById('modalProduk').addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget;
            document.getElementById('m-akad').innerText = btn.dataset.akad;
            document.getElementById('m-name').innerText = btn.dataset.name;
            document.getElementById('m-category').innerText = btn.dataset.category;
            document.getElementById('m-price').innerText = 'Rp ' + parseInt(btn.dataset.price).toLocaleString('id-ID');
            // PERUBAHAN 3: Hapus teks '+ Unit' di JavaScript modal
            document.getElementById('m-stock').innerText = btn.dataset.stock;
        });

        // Logika Pencarian (Filter)
        document.getElementById('searchInput').addEventListener('input', function() {
            const keyword = this.value.toLowerCase().trim();
            document.querySelectorAll('.product-item').forEach(item => {
                const nama = item.querySelector('.p-title').innerText.toLowerCase();
                const kat = item.querySelector('.p-cat').innerText.toLowerCase();

                if (nama.includes(keyword) || kat.includes(keyword)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
            updateSKU();
        });
    </script>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-msg" id="flashMsg">
            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success'); ?>
        </div>
        <script>
            setTimeout(() => {
                const el = document.getElementById('flashMsg');
                if (el) {
                    el.style.opacity = '0';
                    el.style.transition = '0.5s';
                    setTimeout(() => el.remove(), 500);
                }
            }, 3000);
        </script>
    <?php endif; ?>
</body>

</html>