## Application 
### 1. Clone Project
```bash
git clone https://github.com/Faiznurullah/lindungihutan-test-challange.git
```
### 2. Composer Install
```bash
composer install
```
### 3. Copy Enviroment
```bash
cp .env.example .env
```
### 4. Generate Key Apps
```bash
php artisan key:generate
```
### 5. Connect database mysql 
```bash
DB_CONNECTION=mysql
DB_HOST=your_database_host
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
### 6. Migration Database
```bash
php artisan migrate
```
### 7. Seed Database
```bash
php artisan db:seed
```
### 6. Enjoy Apss
```bash
php artisan ser
```
