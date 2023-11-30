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
            <form method="post" action=""> <!-- Menambahkan onsubmit dan return false -->
                <img class="gambar-depan" src="/photo/library.png">
                <h2 class="register">Register</h2>
                <p id="passwordError"></p>
                <input type="text" placeholder="Username" autocomplete="username">
                <input type="password" minlength="8" id="password" placeholder="Password" autocomplete="password" oninput="checkPasswords()">
                <input type="password" minlength="8"id="confirmPassword" placeholder="Konfirmasi Password" oninput="checkPasswords()">
                
                <input type="text" id="fullName" placeholder="Nama Lengkap">
                <input type="number" id="phoneNumber" placeholder="Nomor Handphone">

                <div class="mydict">
                    <h5 class="kelamin">Jenis kelamin</h5>
                    <div>
                        <label>
                            <input type="radio" name="radio" checked="">
                            <span>Laki-laki</span>
                        </label>
                        <label>
                            <input type="radio" name="radio">
                            <span>Perempuan</span>
                        </label>
                    </div>
                </div>
                <button class="tombol-register" type="submit" id="registerButton" disabled onclick="redirectToLogin()">Register</button>
            </form>
            <div class="switch">
                <h5>Sudah punya akun?</h5>
                <a href="login">Login</a>
            </div>
        </div>
    </div>

    <script>
function checkForm() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var fullName = document.getElementById('fullName').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var errorElement = document.getElementById('passwordError');
    var registerButton = document.getElementById('registerButton');

    // Check if passwords match
    if (password !== confirmPassword) {
        errorElement.textContent = 'Password tidak sama.';
        errorElement.style.textAlign= 'center';
        errorElement.style.backgroundColor= 'red';
        errorElement.style.padding= '10px';
        errorElement.style.color= '#fff';
        disableButton();
        return;
    } else if(password.length && confirmPassword.length) {
        errorElement.textContent = 'Formulir sudah siap';
        errorElement.style.textAlign= 'center';
        errorElement.style.backgroundColor= 'green';
        errorElement.style.padding= '10px';
        errorElement.style.color= '#fff';
    }

    // Check if full name and phone number are empty
    if (fullName.trim() === '' || phoneNumber.trim() === '') {
        errorElement.textContent = 'Formulir masih kosong.';
        errorElement.style.textAlign= 'center';
        errorElement.style.backgroundColor= 'red';
        errorElement.style.padding= '10px';
        errorElement.style.color= '#fff';
        disableButton();
        return;
    } else {
        //errorElement.textContent = '';
        //errorElement.style.backgroundColor= '';
    }

    // If all checks pass, enable the register button
    enableButton();
}

function disableButton() {
    var registerButton = document.getElementById('registerButton');
    registerButton.disabled = true;
}

function enableButton() {
    var registerButton = document.getElementById('registerButton');
    registerButton.disabled = false;
}

function redirectToLogin() {
    // Mengarahkan pengguna ke halaman index.html
    window.location.href = '#';
}

// Call checkForm on input events
document.getElementById('password').addEventListener('input', checkForm);
document.getElementById('confirmPassword').addEventListener('input', checkForm);
document.getElementById('fullName').addEventListener('input', checkForm);
document.getElementById('phoneNumber').addEventListener('input', checkForm);

// Call checkForm on page load to handle initial state
document.addEventListener('DOMContentLoaded', checkForm);
    </script>
</body>
</html>