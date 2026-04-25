## 📝 LEMBAR JAWABAN (WAJIB DIISI)

*Nama:* Nurwakhidah Oktaviani

*NIM:* 25120100061

### 1. Profil Startup
•⁠  ⁠*Nama Startup:* Bazaar.

•⁠  ⁠*Problem yang Diselesaikan:* Memberikan rasa aman dan keberkahan bagi konsumen Muslim melalui marketplace yang 100% terverifikasi halal dan sistem transaksi yang bebas dari unsur riba (bunga).

•⁠  ⁠*Target Pengguna:* Masyarakat Muslim Indonesia usia 18-45 tahun yang melek digital dan mencari produk serta layanan (seperti umrah) yang sesuai syari'at.

### 2. Penjelasan Fitur JavaScript (DOM)
•⁠  ⁠*Apa yang Anda buat?* Saya fokus mengembangkan fitur yang interaktif pada halaman dashboard agar manajemen barang jadi lebih efisien dan responsif. Beberapa hal yang saya implementasikan adalah:

* Fitur Transaksi Real-Time:
    Saya membuat fitur manipulasi DOM pada halaman dashboard. Ketika pengguna mengklik tombol "Beli", fungsi javascript akan menangkap ID produk tersebut dan secara otomatis mengurangi angka stok di tabel secara real-time tanpa perlu refresh halaman. Hal ini memastikan proses belanja di Bazaar terasa lancar bagi pengguna.

* Input Produk Dinamis: 
    Saya juga menambahkan fitur untuk menambah inventaris baru secara instan. Melalui form yang disediakan, Admin dapat memasukkan produk baru ke dalam tabel katalog tanpa jeda waktu, sehingga update barang bisa dilakukan dengan lebih fleksibel sesuai kebutuhan pasar.

* Manajemen Katalog: 
    Terdapat fitur hapus baris yang memudahkan pengelola untuk merapikan daftar inventaris. Jika ada produk yang sudah tidak relevan atau habis, Admin bisa langsung menghilangkannya dari tampilan antarmuka secara praktis.

*Tujuan:* Memastikan dashboard Bazaar memiliki performa yang cepat dan pengalaman pengguna yang modern, di mana setiap perubahan data bisa langsung terlihat tanpa hambatan loading halaman.

### 3. Entity Relationship Diagram (ERD)
*ERD Bazaar*
![ERD Bazaar](erd-bazaar-updated.png)
*Halaman Login*
![Halaman Login](tampilan1.png)
*Halaman Dashboard*
![Halaman Dashboard](tampilan2.png)
![Halaman Dashboard](tampilan3.png)
![Halaman Dashboard](tampilan4.png)
*Halaman Form Tambah Produk*
![Halaman Form Tambah Produk](tampilan5.png)
*Halaman Dashboard - Edit Produk*
![Halaman Dashboard - Edit Produk](tampilan6.png)
*Halaman Dashboard - Delete Produk*
![Halaman Dashboard - Delete Produk](tampilan7.png)
*Halaman Dashboard - Cari Produk*
![Halaman Dashboard - Cari Produk](tampilan8.png)
*Halaman Database PhpMyAdmin*
![Halaman Database PhpMyAdmin](tampilan9.png)


### 4. Refleksi Refactoring
•⁠  ⁠*Pertanyaan:* Kenapa kita harus memisahkan kode menjadi Model, View, dan Controller (MVC)? Kenapa tidak pakai cara lama seperti di ⁠ spaghetti.php ⁠ saja?

•⁠  ⁠*Jawaban:* Menurut saya memisahkan kode dengan pola MVC ini agar tugas-tugas lebih terorganisir dan tidak terjadi tumpang tindih. Kalau tetap pakai cara lama (spaghetti code), semua kodenya akan menumpuk di satu tempat dan itu sangat membingungkan saat aplikasi mulai besar atau bisnis mulai scale up. Bisa diibaratkan seperti kita mencari satu barang di gudang yang berantakan. Dengan memakai pola MVC, maka setiap bagian punya tanggungjawab masing-masing. Pimisahan ini juga membuat code lebih rapi, mudah diperbaiki jika ada error dan pastinya lebih siap untuk dikembangkan lebih besar.
