<?php declare(strict_types=1);

use Slim\Http\Uri;
use Monolog\Logger;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Monolog\Handler\StreamHandler;
use Psr\Container\ContainerInterface;

return array(

    \Slim\Views\Twig::class => function (ContainerInterface $c) {
        $twig = new Twig(__DIR__."/Templates", array(
            'cache' => false
        ));
        $route = $c->get('router');
        $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    
        $twig->addExtension(new TwigExtension($route, $uri));
    
        return $twig;
    },

    \Monolog\Logger::class => function (ContainerInterface $c) {
        $logger = new Logger('my_logger');
        $fileHandler = new StreamHandler(__DIR__."/../var/app.log");

        if (!$fileHandler instanceof \Monolog\Handler\HandlerInterface) {
            throw new \Exception('Não é a instancia correta.');
        }

        $logger->pushHandler($fileHandler);

        return $logger;
    },

    'settings.responseChunkSize' => 4096,
    'settings.outputBuffering' => 'append',
    'settings.determineRouteBeforeAppMiddleware' => false,
    'settings.displayErrorDetails' => true,

);
