<?php
declare(strict_types=1);

namespace App;

use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Alignment;

class Presentation
{
    public function execute()
    {
        $objPresentation = new PhpPresentation();
        
        /** @var PhpOffice\PhpPresentation\Slide */
        $currentSlide = $objPresentation->getActiveSlide();

        $slide = $currentSlide->createRichTextShape()
                ->setHeight(300)
                ->setWidth(600)
                ->setOffsetX(170)
                ->setOffsetY(180);
        $slide->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $text = $slide->createTextRun('Presentation slide.');
        $text->getFont()->setBold(true)->setSize(60)->setColor(new Color('FFE06B20'));

        $otherSlide = $objPresentation->createSlide();

        $slide2 = $otherSlide->createRichTextShape()
                ->setHeight(600)
                ->setWidth(1200)
                ->setOffsetX(170)
                ->setOffsetY(180);
        $slide2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $text2 = $slide2->createTextRun('Presentation slide.');
        $text2->getFont()->setBold(true)->setSize(60)->setColor(new Color('FFE06B20'));

        $fileName = sprintf('presentation%s.pptx', rand(0, 300));
        $presentationFile = IOFactory::createWriter($objPresentation, 'PowerPoint2007');
        $presentationFile->save(__DIR__.'/../'.$fileName);

        return $fileName.' criado com sucesso.';
    }
}
