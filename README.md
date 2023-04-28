# cek-pajak-esamsat
Unofficial API cek pajak esamsat jateng

![image](https://user-images.githubusercontent.com/16686825/234086044-10b56c4f-439b-4ef1-a6a5-894ab1c45515.png)

## Installation
-----

Require this package with composer using the following command:

```bash
composer require lintangtimur/cek-pajak-api
```

## Example
----

#### Register
```php
<?php
use Stelin\CekPajakApi\CekPajak;

$form = [
    'name'=> 'lintang',
    'email'=> 'lintang@gmail.com',
    'password'=>'123456'
];

$reg = new CekPajak();
$reg = (new CekPajak)->register($form);
```

#### Login
```php
<?php
use Stelin\CekPajakApi\CekPajak;

$form = [
    'name'=> 'lintang',
    'email'=> 'lintang@gmail.com',
    'password'=>'123456'
];

$login = new CekPajak();
$login = (new CekPajak)->login($form)->accessToken;
```

#### Check Pajak
```php
<?php
use Stelin\CekPajakApi\CekPajak;

$cp = new CekPajak($accessToken);
$cp->cekPajak('H','1234','AA')->totalPkbPokok;

//Melihat rincian akhir pajak
$a->cekPajak('H','1234','AA')->rincian->masaAkhirBerlakuPajak;
```

#### Contoh menggunakan SSL
Menambah option penggunaan ssl untuk endpoint api untuk user yang mengalami error ```SSL certificate problem```
```php
$form = [
    'name'=> 'lintang',
    'email'=> 'lintang@gmail.com',
    'password'=>'123456'
];

$login = new CekPajak();
$accessToken = $login->ssl(true)->login($form)->accessToken; //registrasi terlebih dahulu sebelum login
$accsess = new CekPajak($accessToken);
$total_pokok = $accsess->ssl(true)->cekPajak('H','1234','AA')->totalPkbPokok;
echo $total_pokok;
```