<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Bazaar</title>
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

        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--p-green) !important;
            font-size: 1.5rem;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 45px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
            max-width: 680px;
            margin: 50px auto;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .form-control,
        .form-select {
            border: 1.5px solid #e8e8e8;
            border-radius: 14px;
            padding: 14px 18px;
            background: #fafafa;
        }

        .btn-simpan {
            background: linear-gradient(135deg, var(--p-green), #2D6A4F);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 40px;
            font-weight: 700;
            width: 100%;
        }

        /* Preview Gambar Style */
        #imgPreview {
            width: 100%;
            max-height: 250px;
            object-fit: contain;
            border-radius: 14px;
            display: none;
            margin-top: 15px;
            border: 1px dashed #ddd;
            padding: 10px;
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
                <a href="<?= base_url('index.php/dashboard') ?>"
                    class="btn btn-sm btn-outline-success px-4 rounded-pill fw-bold">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <p class="fw-800 text-success fs-5 mb-1">
                <i class="fas fa-plus-circle me-2"></i> Tambah Produk Baru
            </p>
            <p class="text-muted small mb-4">Isi detail produk yang ingin didaftarkan.</p>

            <form action="<?= base_url('index.php/simpan') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control"
                        placeholder="cth. Mukena Silk Premium" required>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control"
                            placeholder="cth. 250000" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stock" class="form-control"
                            placeholder="cth. 10" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="category" class="form-control"
                            placeholder="cth. Busana" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Akad</label>
                        <select name="akad" class="form-select">
                            <option value="Murabahah">Murabahah</option>
                            <option value="Ijarah">Ijarah</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                    <p class="text-muted small mt-2">Format: JPG, PNG, atau WEBP. Maks 2MB.</p>
                    <img id="imgPreview" src="#" alt="Preview">
                </div>

                <hr>
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save me-2"></i> Simpan Produk
                </button>
            </form>
        </div>
    </div>

    <script>
        // Script untuk menampilkan preview gambar sebelum diupload
        const imageInput = document.getElementById('imageInput');
        const imgPreview = document.getElementById('imgPreview');

        imageInput.onchange = evt => {
            const [file] = imageInput.files;
            if (file) {
                imgPreview.src = URL.createObjectURL(file);
                imgPreview.style.display = 'block';
            }
        }
    </script>
</body>

</html>