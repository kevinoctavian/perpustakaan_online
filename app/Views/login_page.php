<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <title>Login Perpustakaan Online</title>
    <link rel="stylesheet" href="/loginform.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <form onsubmit="validateForm(); return false;">
                <img class="gambar-depan" src="/photo/library.png">
                <h2>Selamat Datang di Perpustakaan Online</h2>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button class="tombol-register" type="submit">Login</button>
            </form>
            <div class="switch">
                <h5>Belum punya akun?</h5>
                <a href="register">Daftar</a>
            </div>
        </div>
    </div>
</body>
</html>