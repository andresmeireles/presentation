<?php declare(strict_types=1);

namespace App\Utils;

use PhpOffice\PhpPresentation\PhpPresentation;

class PresentationMaker
{
    public function createSlide(string $type, array $data)
    {
        $presentationObject = new PhpPresentation();

        switch ($$type) {
            case 'textOnly':
                $this->createTextOnlySlide($presentationObject, $data);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function createTextOnlySlide(PhpPresentation $pObj, array $data)
    {
        
    }
}
