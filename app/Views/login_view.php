<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazaar - Belanja Berkah</title>
    
    <!-- Link Bootstrap & Font Premium Asli Milikmu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-green: #1B4332;
            --accent-gold: #D4AF37;
            --soft-green: #2D6A4F;
            --bg-light: #F8FAF9;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-light);
        }

        /* ==========================================
           1. STYLING HALAMAN LOGIN (PREMIUM)
           ========================================== */
        #login-page {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--soft-green) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
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
            transition: all 0.3s ease;
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

        /* ==========================================
           2. STYLING HALAMAN DASHBOARD (PREMIUM)
           ========================================== */
        #dashboard-page {
            display: none; /* Awalnya disembunyikan */
            min-height: 100vh;
        }
        .navbar {
            background-color: var(--primary-green) !important;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: white !important;
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
        .table {
            margin-bottom: 0;
            color: var(--primary-green);
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
            transition: background-color 0.3s ease;
        }
        .btn-buy {
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-weight: 600;
            transition: 0.3s;
            white-space: nowrap;
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
            white-space: nowrap;
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

        /* ==========================================
           3. KODE RESPONSIF (UNTUK HP & TABLET)
           ========================================== */
        @media (max-width: 768px) {
            /* Responsif Login */
            .login-card {
                padding: 40px 24px;
            }
            .brand-logo {
                font-size: 2.2rem;
            }
            .brand-subtitle {
                margin-bottom: 25px;
            }
            
            /* Responsif Dashboard */
            .main-container {
                margin: 20px auto;
                padding: 0 15px;
            }
            .welcome-section {
                flex-direction: column;
                align-items: flex-start !important;
                padding: 20px;
                gap: 15px;
            }
            .btn-add {
                width: 100%;
                text-align: center;
            }
            .card-pro-header {
                padding: 15px 20px;
            }
            .table thead th, .table tbody td {
                padding: 12px 15px;
                white-space: nowrap; /* Mencegah teks patah di tabel */
            }
            #form-tambah {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- ==============================================================
         HALAMAN 1: LOGIN (PREMIUM BOOTSTRAP)
         ============================================================== -->
    <div id="login-page">
        <div class="login-card">
            <div class="brand-logo">Bazaar</div>
            <div class="brand-subtitle">Belanja Berkah</div>

            <div class="mb-3 text-start">
                <label class="form-label">Identitas Pengguna</label>
                <input type="text" class="form-control" value="admin" readonly>
            </div>
            <div class="mb-4 text-start">
                <label class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" value="••••••••" readonly>
            </div>
            
            <!-- Tombol navigasi (Simulasi) -->
            <button onclick="masukDashboard()" class="btn btn-login">Masuk ke Ekosistem</button>

            <div class="footer-text">
                &copy; 2026 Bazaar Indonesia. <br> Seluruh transaksi diawasi Dewan Syariah.
            </div>
        </div>
    </div>


    <!-- ==============================================================
         HALAMAN 2: DASHBOARD (PREMIUM BOOTSTRAP)
         ============================================================== -->
    <div id="dashboard-page">
        
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#"> BAZAAR</a>
                <div class="ms-auto d-flex align-items-center">
                    <span class="text-white-50 small me-3">Role: <strong class="text-white">Admin</strong></span>
                    <button onclick="keluarDashboard()" class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold">Logout</button>
                </div>
            </div>
        </nav>

        <div class="main-container">
            <div class="welcome-section d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1 fw-bold" style="color: var(--primary-green);">Ahlan wa Sahlan, admin!</h4>
                    <p class="text-muted mb-0 small">Sistem inventaris startup <strong>Bazaar</strong> sudah aktif.</p>
                </div>
                <!-- Tombol untuk fitur CREATE -->
                <button class="btn-add" onclick="toggleForm()">+ Produk Baru</button>
            </div>

            <!-- FITUR CRUD: CREATE FORM -->
            <div id="form-tambah">
                <h6 class="fw-bold mb-3 text-uppercase small" style="letter-spacing: 1px; color: var(--primary-green);">Input Inventaris Baru</h6>
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
                    <span id="total-sku" class="badge bg-white text-dark rounded-pill px-3">4 SKU</span>
                </div>
                <!-- Wrapper Tabel Responsif -->
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
                            <tr>
                                <td class="fw-bold">Mukena Silk Premium</td>
                                <td>Rp 350.000</td>
                                <td><span class="stok-barang stok-badge">15</span></td>
                                <td class="text-end">
                                    <button class="btn-buy btn-beli">🛒 Beli</button>
                                    <button class="btn btn-sm btn-outline-danger ms-1 btn-hapus"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kurma Ajwa 1kg</td>
                                <td>Rp 180.000</td>
                                <td><span class="stok-barang stok-badge">40</span></td>
                                <td class="text-end">
                                    <button class="btn-buy btn-beli">🛒 Beli</button>
                                    <button class="btn btn-sm btn-outline-danger ms-1 btn-hapus"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Madu Murni Al-Barokah</td>
                                <td>Rp 125.000</td>
                                <td><span class="stok-barang stok-badge">20</span></td>
                                <td class="text-end">
                                    <button class="btn-buy btn-beli">🛒 Beli</button>
                                    <button class="btn btn-sm btn-outline-danger ms-1 btn-hapus"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">E-Book Fiqih Muamalah</td>
                                <td>Rp 50.000</td>
                                <td><span class="stok-barang stok-badge">999</span></td>
                                <td class="text-end">
                                    <button class="btn-buy btn-beli">🛒 Beli</button>
                                    <button class="btn btn-sm btn-outline-danger ms-1 btn-hapus"><i class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================================
         SCRIPT JAVASCRIPT (DOM MANIPULATION & SIMULASI HALAMAN)
         ============================================================== -->
    <script>
        // --- 1. SIMULASI PINDAH HALAMAN (UNTUK PREVIEW) ---
        function masukDashboard() {
            document.getElementById('login-page').style.display = 'none';
            document.getElementById('dashboard-page').style.display = 'block';
        }

        function keluarDashboard() {
            document.getElementById('dashboard-page').style.display = 'none';
            document.getElementById('login-page').style.display = 'flex';
        }

        // --- 2. MANIPULASI DOM (DASHBOARD) ---
        function toggleForm() {
            const f = document.getElementById('form-tambah');
            f.style.display = (f.style.display === 'block') ? 'none' : 'block';
        }

        function updateSKU() {
            const count = document.querySelectorAll('#tabel-bazaar tbody tr').length;
            document.getElementById('total-sku').innerText = count + " SKU";
        }

        // CREATE: Tambah Produk
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
                <td class="text-end">
                    <button class="btn-buy btn-beli">🛒 Beli</button>
                    <button class="btn btn-sm btn-outline-danger ms-1 btn-hapus"><i class="fas fa-trash"></i> Hapus</button>
                </td>
            `;
            toggleForm();
            attachEvent(); // Pasang event untuk tombol baru
            updateSKU();
            
            // Kosongkan form
            document.getElementById('nama').value = '';
            document.getElementById('harga').value = '';
            document.getElementById('stok').value = '';
        }

        // UPDATE (Beli) & DELETE (Hapus)
        function attachEvent() {
            // Event Beli (Kurangi Stok)
            document.querySelectorAll('.btn-beli').forEach(btn => {
                btn.onclick = function() {
                    const row = this.closest('tr');
                    const stokEl = row.querySelector('.stok-barang');
                    let jml = parseInt(stokEl.innerText);
                    
                    if(jml > 0) {
                        stokEl.innerText = jml - 1;
                        stokEl.style.backgroundColor = "#fff3cd";
                        setTimeout(() => stokEl.style.backgroundColor = "#e7f3ee", 500);
                    } else {
                        alert("Persediaan sudah habis!");
                    }
                };
            });

            // Event Hapus Produk
            document.querySelectorAll('.btn-hapus').forEach(btn => {
                btn.onclick = function() {
                    this.closest('tr').remove();
                    updateSKU();
                }
            });
        }

        // Inisialisasi event pertama kali
        attachEvent();
    </script>
</body>
</html>