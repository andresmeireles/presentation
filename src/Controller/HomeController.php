<?php declare(strict_types=1);

namespace App\Controller;

use Monolog\Logger;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Alignment;

class HomeController
{
    public function home(ResponseInterface $response, Twig $twig): ResponseInterface
    {
        return $twig->render($response, 'index.twig');
    }

    public function presentation()
    {
        $objPHPPresentation = new PhpPresentation();
        // Create slide
        $currentSlide = $objPHPPresentation->getActiveSlide();
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun('Thank you for using PHPPresentation!');
        $textRun->getFont()->setBold(true)
                        ->setSize(60)
                        ->setColor(new Color('FFE06B20'));

        $name = sprintf('/sample%s.pptx', rand(0, 999));
        $oWriterPPTX = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
        $oWriterPPTX->save(__DIR__.'/../../public'.$name);
    }
}
