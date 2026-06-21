# Mini Project — Laravel 11 + PHP 8.4 + MySQL

### A mini project for SugarTech Assessment
    
#### Create a PHP + MySQL Web Application using Laravel with the following requirements:

1. Login with username & password

2. CRUD (create, read, update, delete) for Employee records with the following fields:

   * First Name
   * Last Name
   * Gender
   * Birthday
   * Monthly Salary

3. A summary of page with the following details:

   * Count of Male & Female employees
   * Average age of all employees
   * Total monthly salary of all employees


## Install PHP 8.4, MySQL, Composer

### Windows
1. Install PHP 8.4 via [Laragon](https://laragon.org/) (easiest — bundles PHP, MySQL, Composer in one installer) **or** manually:
   - Download PHP 8.4 (Thread Safe, x64) from https://windows.php.net/download/
   - Extract to `C:\php`, add it to your `PATH`
   - Copy `php.ini-development` to `php.ini`, enable `extension=pdo_mysql`, `extension=mbstring`, `extension=fileinfo`, `extension=openssl`
2. Install MySQL via [MySQL Installer](https://dev.mysql.com/downloads/installer/) (Community Server 8.x)
3. Install Composer: https://getcomposer.org/Composer-Setup.exe

## Getting Started — Option A: Docker (recommended)
 
**Requirements:** Docker Desktop
 
```bash
# 1. Clone the repo
git clone <your-repo-url>
cd <project-folder>
 
# 2. Set up environment
cp .env.example .env
 
# 3. Build & start the stack
docker compose up -d --build
 
# 4. Generate app key, run migrations & seed
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```
 
- App: **http://localhost:8080**
- phpMyAdmin: **http://localhost:8081** (server: `db`, user: `root`, password: `root_pass`)
> **Port conflict?** If `3306` is already used by a local MySQL install, edit `docker-compose.yml` and remap the `db` service's host port, e.g. `"3307:3306"`. Laravel's `.env` doesn't need to change — containers still talk to each other over the internal Docker network on port `3306`.

## Getting Started — Option B: Native (no Docker)
 
**Requirements:** PHP 8.4, Composer, MySQL 8
 
```bash
git clone <your-repo-url>
cd <project-folder>
 
composer install
cp .env.example .env
php artisan key:generate
 
# Create the database
mysql -u root -p -e "CREATE DATABASE mini_project;"
 
# Edit .env:
#   DB_HOST=127.0.0.1
#   DB_DATABASE=mini_project
#   DB_USERNAME=root
#   DB_PASSWORD=yourpassword
 
php artisan migrate --seed
php artisan serve
```
 
Visit **http://127.0.0.1:8000**