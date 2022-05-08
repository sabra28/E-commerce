# E-commerce projet
========================
E-commerce web application.

Requirements
------------

  * PHP 7.1.3 ;
  * Symfony 5 ;
  * Wamp (PHPMYADMIN)

Installation
------------

```bash
git clone https://github.com/sabra28/E-commerce.git
cd symfony-ecommerce
Modifier le .env root:@127.
composer install
php bin/console doctrine:database:import symfonyecommerce.sql
```


Usage
-----

```bash
php bin/console server:start
```

[1]: https://symfony.com/doc/current/reference/requirements.html
