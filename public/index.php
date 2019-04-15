<?php declare(strict_types=1);

/* use Slim\App; */
use DI\ContainerBuilder;
use Slim\Http\Request;

require __DIR__.'/../vendor/autoload.php';

// config files
include(__DIR__.'/../config/config.php');

/* $app = new App(
    array(
        'settings' => $config
    )
); */

$app = new class() extends \DI\Bridge\Slim\App {
    protected function configureContainer(ContainerBuilder $builder)
    {
        $definitions = include __DIR__.'/../src/di.php';

        $builder->addDefinitions($definitions);
    }
};

//include __DIR__.'/../src/middlewares.php';

// include routes after app variables
include __DIR__."/../src/routes.php";


$app->run();
