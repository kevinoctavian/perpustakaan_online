#Instalation

Pastikan punya **Git** dan **Composer** didalam system operasi kamu, untuk cara cek apakah git sudah terinstall atau belum ketik

```bash
git --version
```

kalo **"git version x.xx.x"** (x.xx.x merupakan versi dari git) tidak muncul silahkan download git [disini](https://git-scm.com/downloads) download dan install

kalo mun muncul **"git version x.xx.x"** (x.xx.x merupakan versi dari git)

kalo sudah clone project ini dengan
```bash
git clone https://github.com/kevinoctavian/perpustakaan_online
```

dan untuk cek composer sudah terinstall atau belum ketik

```bash
composer --version
```

kalo **"Composer version 2.6.5"** tidak muncul silahkan download composer [disini](https://getcomposer.org/download/) download dan install

kalo mun muncul **"Composer version 2.6.5"** dan project ini sudah di clone tinggal ketik 

```bash
composer install
```

maka file vendor dan dependency codeigniter4 akan terdownload otomatis oleh `composer`

jangan lupa untuk ubah env menjadi .env dan masukan username password untuk database mysql sesuai yang telah terinstall disystem yang kamu miliki 

sebelum migrate database pastikan dulu mysql yang ada di xampp itu hidup baru kamu bisa menjalankan

```bash
php spark migrate -all && php spark db:seed BooksSeeder
```

jika `php spark migrate` error pastikan database dengan nama perpustakaan sudah dibuat,atau jika database perpustakaan sudah ada maka hapus terlebih dahulu semua table didalamnya

lalu tinggal

```bash 
php spark serve
```

maka local server akan berjalan di http:/localhost:8080/