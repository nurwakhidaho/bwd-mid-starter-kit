<?php
session_start();

// DATA DUMMY (Seharusnya di Model)
$products = [
    ['id' => 1, 'name' => 'Laptop Pro', 'price' => 15000000, 'stock' => 10],
    ['id' => 2, 'name' => 'Smartphone X', 'price' => 8000000, 'stock' => 25],
];

// LOGIKA LOGIN (Seharusnya di Controller)
$error = '';
if (isset($_POST['login'])) {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'bisnis123') {
        $_SESSION['isLoggedIn'] = true;
    } else {
        $error = 'Login Gagal!';
    }
}
if (isset($_GET['logout'])) { session_destroy(); header("Location: spaghetti.php"); exit; }
?>

<!DOCTYPE html>
<html>
<body>
    <?php if (!isset($_SESSION['isLoggedIn'])): ?>
        <h2>Login Spaghetti</h2>
        <p style="color:red;"><?= $error ?></p>
        <form method="POST">
            User: <input type="text" name="username"><br>
            Pass: <input type="password" name="password"><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <h2>Dashboard Spaghetti</h2>
        <a href="?logout=true">Logout</a>
        <table border="1">
            <tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr>
            <?php foreach($products as $p): ?>
            <tr>
                <td><?= $p['name'] ?></td>
                <td><?= $p['price'] ?></td>
                <td><button>Beli</button></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>