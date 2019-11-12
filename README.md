# Currency
Synchronization service for currencies

## Getting Started
This instruction explains steps for deployment and using this application
### Installing
Clone code from repository:
```
git clone https://github.com/computools/currency.git
```
Run composer:
```
sudo composer install
```
Create .env file and configure:
- set database settings
- set APP_AUTH_TOKEN

run migrations:
```
php artisan migrate
```

## Usage

Run command to fill database with currencies or update existing currencies
```
php artisan currencies:update
```
## Routes
Getting currency by id, example:
```
/api/currency/036
```
Getting slice of currencies, example:
```
/api/currencies?take=20&skip=20
```
### Tests
Running tests:
```
./vendor/bin/phpunit
```
