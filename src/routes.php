<?php declare(strict_types=1);

use App\Controller\HomeController;

$app->get("/", HomeController::class.':home');
//$app->get("/{name}", HomeController::class.':template');