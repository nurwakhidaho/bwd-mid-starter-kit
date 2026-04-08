<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Kontrol | <?= $nama_startup ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1B4332;
            --accent-gold: #D4AF37;
            --bg-light: #F8FAF9;
        }
        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--primary-green);
        }
        .navbar {
            background-color: var(--primary-green) !important;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .main-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-bottom: 30px;
            border-left: 5px solid var(--accent-gold);
        }
        .card-pro {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .card-pro-header {
            background: var(--primary-green);
            color: white;
            padding: 20px 25px;
            font-weight: 700;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table thead th {
            background: #f8f9fa;
            color: #6c757d;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px 25px;
            border: none;
        }
        .table tbody td {
            padding: 18px 25px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f3;
        }
        .stok-badge {
            background: #e7f3ee;
            color: var(--primary-green);
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: 700;
        }
        .btn-buy {
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-buy:hover {
            background: var(--accent-gold);
            color: white;
            transform: scale(1.05);
        }
        .btn-add {
            background: var(--accent-gold);
            color: var(--primary-green);
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 700;
            transition: 0.3s;
        }
        .btn-add:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        #form-tambah {
            display: none;
            background: #fff;
            padding: 25px;
            border-radius: 20px;
            margin-bottom: 25px;
            border: 2px dashed var(--accent-gold);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#"> BAZAAR</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white-50 small me-3">Role: <strong>Admin</strong></span>
            <a href="auth/logout" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold">Logout</a>
        </div>
    </div>
</nav>

<div class="main-container">
    <div class="welcome-section d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1 fw-bold">Ahlan wa Sahlan, <?= $username ?>!</h4>
            <p class="text-muted mb-0 small">Sistem inventaris startup <strong>Bazaar</strong> sudah aktif.</p>
        </div>
        <!-- Tombol untuk fitur CREATE -->
        <button class="btn-add" onclick="toggleForm()">+ Produk Baru</button>
    </div>

    <!-- FITUR CRUD: CREATE FORM -->
    <div id="form-tambah">
        <h6 class="fw-bold mb-3 text-uppercase small" style="letter-spacing: 1px;">Input Inventaris Baru</h6>
        <div class="row g-3">
            <div class="col-md-4"><input type="text" id="nama" class="form-control" placeholder="Nama Produk"></div>
            <div class="col-md-3"><input type="number" id="harga" class="form-control" placeholder="Harga (Rp)"></div>
            <div class="col-md-2"><input type="number" id="stok" class="form-control" placeholder="Stok"></div>
            <div class="col-md-3"><button class="btn btn-success w-100 fw-bold rounded-3 py-2" onclick="tambahData()">Simpan</button></div>
        </div>
    </div>

    <div class="card-pro">
        <div class="card-pro-header">
            <span>Katalog Produk Aktif</span>
            <span class="badge bg-white text-dark rounded-pill px-3"><?= count($products) ?> SKU</span>
        </div>
        <div class="table-responsive">
            <table class="table" id="tabel-bazaar">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $p): ?>
                    <tr>
                        <td class="fw-bold"><?= $p['name'] ?></td>
                        <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                        <td><span class="stok-barang stok-badge"><?= $p['stock'] ?></span></td>
                        <td class="text-end">
                            <button class="btn-buy btn-beli">🛒 Beli</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // MANIPULASI DOM (LANGKAH 5)
    
    function toggleForm() {
        const f = document.getElementById('form-tambah');
        f.style.display = (f.style.display === 'block') ? 'none' : 'block';
    }

    // CREATE: Fungsi menambah data ke tabel secara real-time
    function tambahData() {
        const n = document.getElementById('nama').value;
        const h = document.getElementById('harga').value;
        const s = document.getElementById('stok').value;

        if(!n || !h || !s) return alert("Mohon lengkapi data produk.");

        const tbody = document.querySelector('#tabel-bazaar tbody');
        const row = tbody.insertRow();
        row.innerHTML = `
            <td class="fw-bold">${n}</td>
            <td>Rp ${parseInt(h).toLocaleString('id-ID')}</td>
            <td><span class="stok-barang stok-badge">${s}</span></td>
            <td class="text-end"><button class="btn-buy btn-beli">🛒 Beli</button></td>
        `;
        toggleForm();
        attachEvent(); // Pasang ulang event listener untuk tombol baru
    }

    // UPDATE: Fungsi kurangi stok (Fitur interaktif utama)
    function attachEvent() {
        document.querySelectorAll('.btn-beli').forEach(btn => {
            btn.onclick = function() {
                const row = this.closest('tr');
                const stokEl = row.querySelector('.stok-barang');
                let jml = parseInt(stokEl.innerText);
                
                if(jml > 0) {
                    stokEl.innerText = jml - 1;
                    // Beri efek visual sedikit
                    stokEl.style.backgroundColor = "#fff3cd";
                    setTimeout(() => stokEl.style.backgroundColor = "#e7f3ee", 500);
                } else {
                    alert("Persediaan sudah habis!");
                }
            };
        });
    }

    // Inisialisasi awal
    attachEvent();
</script>

</body>
</html>