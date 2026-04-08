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
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: #333; }
        
        .navbar { background: white !important; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .navbar-brand { font-weight: 800; color: var(--p-green) !important; font-size: 1.5rem; letter-spacing: -1px; }
        
        .hero { 
            background: linear-gradient(135deg, var(--p-green) 0%, #081c15 100%); 
            border-radius: 24px; padding: 45px; color: white; margin: 30px 0; 
            box-shadow: 0 15px 35px rgba(27,67,50,0.2);
            position: relative; overflow: hidden;
        }
        
        .card-shopee { 
            background: white; border-radius: 20px; border: 1px solid rgba(0,0,0,0.03); overflow: hidden; 
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); height: 100%; display: flex; flex-direction: column; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }
        .card-shopee:hover { 
            transform: translateY(-12px); 
            box-shadow: 0 25px 50px rgba(0,0,0,0.1); 
            border-color: var(--accent-gold); 
        }
        
        .img-box { 
            height: 220px; overflow: hidden; position: relative; 
            background: radial-gradient(circle at center, #ffffff 0%, #f1f5f3 100%); 
            display: flex; align-items: center; justify-content: center;
            padding: 40px;
        }
        .luxury-vector { 
            width: 100%; height: 100%; max-width: 120px;
            filter: drop-shadow(0 10px 15px rgba(212,175,55,0.3));
            transition: all 0.6s ease;
        }
        .card-shopee:hover .luxury-vector { 
            transform: scale(1.15) rotate(5deg); 
            filter: drop-shadow(0 15px 25px rgba(212,175,55,0.5));
        }
        
        .badge-akad { 
            position: absolute; top: 15px; right: 15px; background: var(--glass); 
            backdrop-filter: blur(8px); color: var(--p-green); font-size: 0.65rem; 
            font-weight: 800; padding: 6px 12px; border-radius: 30px; 
            border: 1px solid var(--accent-gold); box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            z-index: 2;
        }

        .p-content { padding: 20px; flex-grow: 1; text-align: center; }
        .p-cat { font-size: 0.65rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 8px; }
        .p-title { font-size: 0.95rem; font-weight: 700; color: #1a1a1a; height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin-bottom: 12px; line-height: 1.4; }
        .p-price { font-size: 1.2rem; font-weight: 800; color: var(--p-green); }
        
        .card-footer-shopee { padding: 15px 20px 25px; background: #fff; display: flex; gap: 10px; }
        .btn-beli { 
            background: linear-gradient(135deg, var(--p-green) 0%, #2D6A4F 100%); color: white; border: none; flex-grow: 1; 
            border-radius: 12px; font-weight: 700; font-size: 0.85rem; padding: 12px;
            transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(27,67,50,0.15);
        }
        .btn-beli:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(27,67,50,0.25); }
        .btn-beli:active { transform: scale(0.95); }

        .btn-hapus { 
            background: #fff; color: #ff4d4d; border: 1px solid #ffeded; 
            padding: 12px 15px; border-radius: 12px; transition: 0.3s; 
        }
        .btn-hapus:hover { background: #ff4d4d; color: white; }

        #form-box { display: none; background: white; padding: 35px; border-radius: 24px; margin-bottom: 40px; border: 2px dashed var(--accent-gold); box-shadow: 0 20px 50px rgba(0,0,0,0.05); }
        
        .btn-success-feedback { background: var(--accent-gold) !important; color: var(--p-green) !important; }
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
            <button class="btn btn-light fw-bold text-success rounded-pill px-5 py-3 shadow-lg border-0" onclick="toggleForm()">
                <i class="fas fa-plus-circle me-2"></i> Tambah Koleksi Baru
            </button>
        </div>

        <div id="form-box">
            <h5 class="fw-bold text-success mb-4"><i class="fas fa-edit me-2"></i>Daftarkan Produk Baru</h5>
            <div class="row g-3">
                <div class="col-md-4"><input type="text" id="nama" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fs-6" placeholder="Nama Koleksi"></div>
                <div class="col-md-2"><input type="text" id="kategori" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fs-6" placeholder="Kategori"></div>
                <div class="col-md-2">
                    <select id="akad" class="form-select form-select-lg border-0 bg-light rounded-4 px-4 fs-6">
                        <option value="Murabahah">Murabahah</option>
                        <option value="Ijarah">Ijarah</option>
                    </select>
                </div>
                <div class="col-md-2"><input type="number" id="harga" class="form-control form-control-lg border-0 bg-light rounded-4 px-4 fs-6" placeholder="Nilai (Rp)"></div>
                <div class="col-md-2"><button class="btn btn-success btn-lg w-100 fw-bold rounded-4 shadow-sm" onclick="tambahData()">Simpan Data</button></div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0 text-uppercase small letter-spacing-2" style="color: #666;">Katalog Koleksi Bazaar</h5>
            <span class="badge bg-white text-dark border-0 py-2 px-4 rounded-pill shadow-sm">
                <i class="fas fa-crown text-warning me-2"></i> <span id="sku-count" class="fw-bold text-success">0</span> SKU Premium
            </span>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4" id="gridKatalog">
            <?php foreach ($products as $p): ?>
            <div class="col product-item">
                <div class="card-shopee">
                    <div class="img-box">
                        <div class="badge-akad"><?= $p['akad']; ?></div>
                        <svg class="luxury-vector" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 6H21" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="p-content">
                        <div class="p-cat"><?= $p['category']; ?></div>
                        <div class="p-title"><?= $p['name']; ?></div>
                        <div class="p-price">Rp <?= number_format($p['price'], 0, ',', '.'); ?></div>
                        <div class="mt-3 text-muted small">
                            Persediaan: <strong class="stok-val text-dark"><?= $p['stock'] ?? 10; ?></strong> Unit
                        </div>
                    </div>
                    <div class="card-footer-shopee">
                        <button class="btn-beli"><i class="fas fa-shopping-bag me-2"></i> Beli</button>
                        <button class="btn-hapus"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function toggleForm() {
            const f = document.getElementById('form-box');
            f.style.display = (f.style.display === 'block') ? 'none' : 'block';
        }

        function updateSKU() {
            document.getElementById('sku-count').innerText = document.querySelectorAll('.product-item').length;
        }

        updateSKU();

        const luxuryGoldBasket = `
            <svg class="luxury-vector" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 2L3 6V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V6L18 2H6Z" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3 6H21" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14C10.9391 14 9.92172 13.5786 9.17157 12.8284C8.42143 12.0783 8 11.0609 8 10" stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        `;

        function tambahData() {
            const n = document.getElementById('nama').value;
            const k = document.getElementById('kategori').value || 'Koleksi';
            const a = document.getElementById('akad').value;
            const h = document.getElementById('harga').value;

            if(!n || !h) return alert("Harap isi nama koleksi dan nilainya.");

            const grid = document.getElementById('gridKatalog');
            const col = document.createElement('div');
            col.className = 'col product-item';
            
            col.innerHTML = `
                <div class="card-shopee" style="opacity:0; transform:translateY(30px); transition:0.7s ease">
                    <div class="img-box">
                        <div class="badge-akad">${a}</div>
                        ${luxuryGoldBasket}
                    </div>
                    <div class="p-content">
                        <div class="p-cat">${k}</div>
                        <div class="p-title">${n}</div>
                        <div class="p-price">Rp ${parseInt(h).toLocaleString('id-ID')}</div>
                        <div class="mt-3 text-muted small">Persediaan: <strong class="stok-val text-dark">10</strong> Unit</div>
                    </div>
                    <div class="card-footer-shopee">
                        <button class="btn-beli"><i class="fas fa-shopping-bag me-2"></i> Beli</button>
                        <button class="btn-hapus"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            `;
            grid.prepend(col);
            attachEvents(); updateSKU(); toggleForm();
            
            setTimeout(() => {
                col.querySelector('.card-shopee').style.opacity = '1';
                col.querySelector('.card-shopee').style.transform = 'translateY(0)';
            }, 50);

            document.getElementById('nama').value = '';
            document.getElementById('harga').value = '';
        }

        function attachEvents() {
            document.querySelectorAll('.btn-beli').forEach(btn => {
                btn.onclick = function() {
                    const card = this.closest('.card-shopee');
                    const stokEl = card.querySelector('.stok-val');
                    let val = parseInt(stokEl.innerText);
                    
                    if(val > 0) {
                        stokEl.innerText = val - 1;
                        this.classList.add('btn-success-feedback');
                        const oldHTML = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check me-2"></i> Berhasil';
                        
                        setTimeout(() => {
                            this.classList.remove('btn-success-feedback');
                            this.innerHTML = oldHTML;
                        }, 1200);
                    } else {
                        this.innerHTML = 'Habis';
                        this.disabled = true;
                        this.style.background = '#e0e0e0';
                    }
                };
            });

            document.querySelectorAll('.btn-hapus').forEach(btn => {
                btn.onclick = function() {
                    if(confirm("Hapus koleksi ini secara permanen?")) {
                        const item = this.closest('.product-item');
                        item.style.transform = 'scale(0.8)';
                        item.style.opacity = '0';
                        setTimeout(() => {
                            item.remove();
                            updateSKU();
                        }, 400);
                    }
                };
            });
        }
        attachEvents();
    </script>
</body>
</html>