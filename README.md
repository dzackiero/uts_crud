# UTS CRUD

## Instalasi

Untuk meng-clone project ini, jalankan ini di direktori tujuan anda:
```
git clone https://github.com/dzackiero/uts_crud.githttps://github.com/dzackiero/uts_crud.git
```
Lalu, duplikat `env` menjadi `.env` dan hapus '#' CI_ENVIRONMENT dan database.default.xxx

nyalakan Database anda di XAMPP, atau development environment lainnya.

buat database uts-crud dan jalankan script ini di terminal.

```
php spark migrate:refresh
```

anda bisa menjalankan anda di lokal menggunakan

```
php spark serve
```

anda bisa login menggunakan akun admin dengan
username: admin
password: admin