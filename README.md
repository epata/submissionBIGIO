## Deskripsi aplikasi web
---
### Deskripsi Website
Aplikasi web ini merupakan aplikasi web pengelolaan guru dan siswa sederhana sebagai submisi internship BIGIO.

### Pengguna
Pada aplikasi ini, terdapat 3 macam pengguna, yaitu
- ADMIN
- GURU
- SISWA

## Daftar requirement
---
lingkungan perangkat lunak :
- PHP
- Apache 
- HTML 5
- CSS
- MySql

Tool  : 
- Visual studio code (Text editor)
- PHPMyAdmin

kami menyarankan untuk PHP dan Apache dengan instalasi menggunakan stack XAMPP.

## Cara instalasi
---
Berikut cara instalasi requirement : 
1. Download XAMPP pada laman https://www.apachefriends.org/index.html sesuai dengan OS yang dipakai
2. Download Visual Studio Code pada laman https://code.visualstudio.com/download sesuai OS yang dipakai 
4. Download ekstensial terkait php pada text editor VSCode

Setelah XAMPP didownload, akses PHPMyAdmin dapat dilakukan melalui http://localhost/phpmyadmin/index.php pada windows.

## Cara menjalankan server
---

Prerequirement : 
- Import database school_db ke localhost melalui PHPMyAdmin
- Source Code diletakkan pada directory htdocs XAMPP
- Ubah terlebih dahulu path database.db pada file dbconnect.php sesuai dengan letak database.db pada directory local Anda
- Jika ada username/password khusus terhadap database mysql di localhost, ubah pada parameter kedua ('root') sebagai parameter username dan parameter ketiga ('') sebagai parameter password di line 2 (mysqli_connect('localhost', 'root', '', 'school_db');) pada dbconnect.php

Langkah-langkah :
1. Buat database baru bernama 'school_db' pada PHPMyAdmin
1. Import database school_db pada folder database ke localhost melalui PHPMyAdmin > Import
2. Nyalakan Apache Web Server pada perkakas XAMPP
2. Buka browser 
3. Ketik alamat directory dari login.php (sebagai halaman utama) pada htdocs 
4. Enter alamat directory tersebut
5. Server berjalan dengan halaman pertama login.php. Berikut daftar username, password, beserta role yang dapat digunakan

No | Username | Password | role
--- | --- | --- | ---
1 | epatatuah | 1234 | ADMIN
2 | guru1 | guru1 | GURU
3 | siswa1 | siswa1 | SISWA






