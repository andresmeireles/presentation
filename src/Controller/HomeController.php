<?php declare(strict_types=1);

namespace App\Controller;

use Slim\Container;

class HomeController
{
    private $logger;

    public function __construct(Container $container)
    {
        $this->logger = $container->logger;
    }

    public function home()
    {
        $this->logger->addInfo("Ticket list");
        echo 'crazy repos';
    }

    public function template($response, $args)
    {
        $this->logger->addInfo("Ticket list");
        return $this->twig->render($response, '/index.twig', array(
            'name' => $args['name']
        ));
    }
}