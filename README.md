<p align="center"><img src="./public/assets/images/svg/default-monochrome.svg" width="400" alt="Laravel Logo"></p>


## Instalasi

1. Clone repository

```bash
git clone https://github.com/riakgu/GasstuGas.git
cd GasstuGas
composer install
cp .env.example .env
php artisan key:generate
```
2. Konfigurasi database di file .env

```conf
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gasstugas
DB_USERNAME=username
DB_PASSWORD=password
```

3. Konfigurasi API untuk fitur Chatbot dan Notifikasi

```conf
OPENAI_API_KEY=
FONNTE_TOKEN=
```

4. Migrasi database

```bash
php artisan migrate --seed
```

5. Jalankan server

```bash
php artisan schedule:work
php artisan serve
```
