<?php
declare(strict_types=1);

use App\Presentation;

require __DIR__.'/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'dev';

$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();

$obj = new Presentation;

echo $obj->execute();