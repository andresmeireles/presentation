<?php declare(strict_types=1);

use App\Controller\HomeController;

/** @var \Slim\App */
$app->get("/", [HomeController::class, 'home']);
$app->get("/create", array(HomeController::class, 'presentation'));
