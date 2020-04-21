# pppinfo
It's my first packagist package, so please be nice. :) 
TODO: better readme.md file

PPPInfo (Polish Post Package Info) will help you to get informations from Polish Post tracking system, and gives you an easier
access method to get information about your stuff.

For documentation of PP system, please check (in Polish) http://www.poczta-polska.pl/pliki/webservices/Metody%20i%20struktury%20uslugi%20sieciowej%20Poczty%20Polskiej%20SA.pdf

## requirements

PHP 7.0. If you are brave enough, you can check PackageInfo.php, remove some php7's stuff, and it should work fine on PHP 5 too.

## how to use?

Run the command below to install via Composer

```shell
composer require teslax93/pppinfo 
```

Add this to your project

```php
<?php 

use TeslaX93\pppinfo\PackageInfo;
```

and now, you can test your connection with PP servers using

```php
$pkgInfo = new PackageInfo();
echo $pkgInfo->hello("Your name");
```

or you can use one of these functions:

```php
$pkgInfo->getPackageStatus("NUMBER"); //your package number, you can use testp0 as test value. Should return 0 if everything is ok.
$pkgInfo->getPackageInfo("NUMBER"); //as above, but should return array with useful package information.
$pkgInfo->addChecksum("NUMBER"); //if you provide 8-digit number, it calculates checksum and returns 9-digit number. 
```