<?php declare(strict_types=1);

use Slim\App;

require __DIR__.'/../vendor/autoload.php';

// config files
include(__DIR__.'/../config/config.php');

$app = new App(
    array(
        'settings' => $config
    )
);

// dependency container
include __DIR__.'/../src/container.php';

// include routes after app variables
include __DIR__."/../src/routes.php";

$app->run();
