# 📦 Sistem Informasi Produksi MBG

Sistem Informasi Produksi MBG merupakan aplikasi berbasis web yang digunakan untuk membantu proses pengelolaan data produksi secara lebih efektif, terstruktur, dan mudah digunakan. Sistem ini menyediakan fitur autentikasi admin serta pengelolaan data produksi mulai dari penambahan, perubahan, pencarian hingga penghapusan data.

---

## ✨ Fitur Utama

- 🔐 Login Admin
- 📋 Menampilkan Data Produksi
- ➕ Menambah Data Produksi
- ✏️ Mengubah Data Produksi
- 🗑️ Menghapus Data Produksi
- 🔍 Pencarian Data Produksi
- 📌 Status Produksi
  - Planning
  - On Progress
  - Done

---

# 📸 Tampilan Sistem

## 1. Halaman Login

Halaman login digunakan oleh administrator untuk masuk ke dalam sistem menggunakan email dan password yang telah terdaftar.

![Login](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/login.png.jpeg)

---

## 2. Halaman Data Produksi

Halaman utama yang menampilkan seluruh data produksi. Admin dapat melakukan pencarian data, menambah data baru, mengedit maupun menghapus data produksi.

![Data Produksi](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/status%20data%20planning.png.jpeg)

---

## 3. Form Tambah Data Produksi

Form digunakan untuk memasukkan data produksi baru yang terdiri dari:

- Kode Produksi
- Nama Barang
- Jumlah Produksi
- Tanggal Produksi
- Status Produksi

Sistem juga memberikan saran kode produksi secara otomatis agar kode yang dibuat tetap unik.

![Tambah Data](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/form%20tambah%20data.png.jpeg)

---

## 4. Status Produksi - Planning

Status **Planning** menunjukkan bahwa proses produksi masih berada pada tahap perencanaan dan belum dimulai.

![Planning](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/status%20data%20planning.png.jpeg)

---

## 5. Status Produksi - On Progress

Status **On Progress** menunjukkan bahwa proses produksi sedang berlangsung dan masih dalam tahap pengerjaan.

![On Progress](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/status%20data%20om%20progress.png.jpeg)

---

## 6. Status Produksi - Done

Status **Done** menunjukkan bahwa seluruh proses produksi telah selesai dikerjakan.

![Done](https://raw.githubusercontent.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri/main/status%20data%20produksi%20done.png.jpeg)

---

# 🛠️ Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- Bootstrap 5
- HTML5
- CSS3
- JavaScript

---

# 🚀 Cara Menjalankan Project

Clone repository

```bash
git clone https://github.com/ptriw/sistem-informasi-produksi-MBG---UAS-Proyek-Perangkat-Lunak-Amanda-Putri.git
```

Masuk ke folder project

```bash
cd distribusi-mbg
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`.

Jalankan migrasi

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

Akses aplikasi melalui browser

```
http://127.0.0.1:8000
```

---

# 👤 Akun Login Default

| Email | Password |
|--------|----------|
| admin@mbg.com | admin123 |

---

# 📚 Deskripsi Sistem

Sistem Informasi Produksi MBG dirancang untuk membantu administrator dalam mengelola data produksi secara terpusat. Dengan adanya fitur CRUD, pencarian data, serta pengelompokan status produksi (Planning, On Progress, dan Done), proses monitoring produksi menjadi lebih mudah, cepat, dan efisien.

---

# 👩‍💻 Developer

**Amanda Putri**

UAS Proyek Perangkat Lunak

2026
