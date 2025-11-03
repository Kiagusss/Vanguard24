# 🚀 Setup Vanguard24 Project

Panduan lengkap untuk menjalankan project ini di Windows atau Linux.

## 📋 Requirements

-   **Docker Desktop** (Windows/Mac) atau **Docker** (Linux)
-   **Git**
-   Internet connection untuk download dependencies

## 🔧 Setup untuk Teman (Windows)

### 1. Install Docker Desktop

1. Download dari: https://www.docker.com/products/docker-desktop/
2. Install dan restart komputer
3. Buka Docker Desktop, tunggu sampai status "Running"

### 2. Clone Project

```bash
git clone https://github.com/Kiagusss/Vanguard24.git
cd Vanguard24
```

### 3. Copy Environment File

```bash
copy .env.example .env
```

**ATAU** buat file `.env` manual dengan isi:

```env
APP_NAME=Vanguard24
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=vanguard24
DB_USERNAME=sail
DB_PASSWORD=password

SESSION_DRIVER=database
SESSION_LIFETIME=120

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
```

### 4. Install Dependencies & Start Docker

**Command Prompt atau PowerShell:**

```bash
# Install Composer dependencies
docker run --rm -v ${PWD}:/var/www/html -w /var/www/html laravelsail/php84-composer:latest composer install --ignore-platform-reqs

# Start Laravel Sail
./vendor/bin/sail up -d

# Generate App Key
./vendor/bin/sail artisan key:generate

# Run Migration & Seeder
./vendor/bin/sail artisan migrate:fresh --seed

# Create Admin User
./vendor/bin/sail artisan make:filament-user

# Link Storage
./vendor/bin/sail artisan storage:link
```

### 5. Copy Landing Page Assets

```bash
# PowerShell
Copy-Item -Path "landing-page" -Destination "public\landing-page" -Recurse -Force

# Command Prompt
xcopy /E /I /Y landing-page public\landing-page
```

### 6. Akses Aplikasi

-   **Landing Page:** http://localhost
-   **Admin Panel:** http://localhost/admin

---

## 🐧 Setup untuk Linux (Arch/Ubuntu)

### 1. Install Docker

**Arch Linux:**

```bash
sudo pacman -S docker docker-compose
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
```

**Ubuntu:**

```bash
sudo apt update
sudo apt install docker.io docker-compose
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
```

**Logout dan login lagi** atau jalankan:

```bash
newgrp docker
```

### 2. Clone Project

```bash
git clone https://github.com/Kiagusss/Vanguard24.git
cd Vanguard24
git checkout new-landing
```

### 3. Copy Environment File

```bash
cp .env.example .env
```

### 4. Install & Start

```bash
# Install dependencies
docker run --rm -v $(pwd):/var/www/html -w /var/www/html laravelsail/php84-composer:latest composer install --ignore-platform-reqs

# Stop MySQL lokal (kalau ada)
sudo systemctl stop mysql

# Start Sail
./vendor/bin/sail up -d

# Setup
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail artisan make:filament-user
./vendor/bin/sail artisan storage:link
```

### 5. Akses Aplikasi

-   **Landing Page:** http://localhost
-   **Admin Panel:** http://localhost/admin

---

## 📝 Command yang Sering Dipakai

### Start/Stop Application

```bash
# Start semua container
./vendor/bin/sail up -d

# Stop semua container
./vendor/bin/sail down

# Restart
./vendor/bin/sail restart

# Lihat logs
./vendor/bin/sail logs
```

### Development

```bash
# Artisan commands
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan make:model Product

# Composer
./vendor/bin/sail composer install
./vendor/bin/sail composer require package/name

# NPM (kalau pakai Vite/frontend build)
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev

# Masuk ke container
./vendor/bin/sail shell

# MySQL CLI
./vendor/bin/sail mysql
```

### Alias (Optional - Linux/Mac)

Tambahkan ke `~/.bashrc` atau `~/.zshrc`:

```bash
alias sail='./vendor/bin/sail'
```

Setelah itu bisa pakai:

```bash
sail up -d
sail artisan migrate
```

---

## 🐛 Troubleshooting

### Port 3306 already in use (MySQL lokal bentrok)

**Windows:**

```bash
# Stop MySQL service
net stop MySQL80
```

**Linux:**

```bash
sudo systemctl stop mysql
```

### Permission denied (Linux)

```bash
# Pastikan user ada di grup docker
sudo usermod -aG docker $USER
newgrp docker
```

### Docker is not running

-   **Windows:** Buka Docker Desktop, tunggu sampai status "Running"
-   **Linux:** `sudo systemctl start docker`

### CSS tidak load

Pastikan folder `landing-page` sudah di-copy ke `public/landing-page`:

**Windows PowerShell:**

```powershell
Copy-Item -Path "landing-page" -Destination "public\landing-page" -Recurse -Force
```

**Linux:**

```bash
cp -r landing-page public/landing-page
```

---

## 📚 Dokumentasi

-   Laravel Sail: https://laravel.com/docs/sail
-   Filament Admin: https://filamentphp.com/docs
-   Docker: https://docs.docker.com/

---

## 👥 Contributors

-   Faried (Developer)
-   Team Vanguard 24

---

**Enjoy coding! 🚀**
