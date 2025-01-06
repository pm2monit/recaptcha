# Recaptcha Package

Paket ini menyediakan layanan untuk menghasilkan dan memverifikasi **CAPTCHA** berbasis teks dan angka. Anda dapat menggunakan paket ini untuk melindungi formulir dan halaman web Anda dari bot dan skrip otomatis.

## Fitur

- Menghasilkan CAPTCHA berbasis **teks alfanumerik** (huruf dan angka).
- Menghasilkan CAPTCHA berbasis **angka**.
- Memverifikasi CAPTCHA yang dimasukkan oleh pengguna.
- Menyimpan CAPTCHA dalam sesi untuk memverifikasi input pengguna.

## Instalasi

1. **Unduh atau Salin Kode:**
   Pastikan Anda memiliki kode sumber paket ini di dalam proyek Anda. Anda bisa mengunduhnya atau menyalin folder `Recaptcha` ke dalam proyek Anda.

2. **Autoloading (Opsional, jika menggunakan Composer):**
   Jika Anda menggunakan Composer untuk autoloading, pastikan kelas `Recaptcha` dapat ditemukan dengan menambahkan namespace-nya di `composer.json`.

   ```json
   "autoload": {
       "psr-4": {
           "Recaptcha\\": "path/to/recaptcha/"
       }
   }



### 1. **Jika Menggunakan Composer (Dari Packagist)**

Anda bisa menambahkannya sebagai dependensi:

```bash
composer require pm2monit/recaptcha
