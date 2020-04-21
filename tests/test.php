<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use pppinfo\PackageInfo;

$pkgInfo = new PackageInfo();
$name = 'test';
echo $pkgInfo->hello($name);
echo "\n";
echo $pkgInfo->getPackageStatus('testp0');
echo "\n";
var_dump($pkgInfo->getPackageInfo('testp0'));