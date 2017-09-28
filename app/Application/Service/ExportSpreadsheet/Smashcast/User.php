<?php
namespace Streaming\Application\Service\ExportSpreadsheet\Smashcast;
use \Streaming\Application\Base\ExportSpreadsheet as Base;

class User extends Base\AbstractFSpreadsheet {

    public function createHeader($styleArray = false) : void {
        if(!$styleArray) {
            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ];
        }
        $this->se->setCellValue('A'.$this->k, 'Smashcast User');
        $this->se->setCellValue('B'.$this->k, 'Name');
        $this->se->setCellValue('C'.$this->k, 'Followers count');
        $this->se->setCellValue('D'.$this->k, 'As for');
        $this->se->getStyle("A".$this->k.":"."G".$this->k)->applyFromArray($styleArray);
        $this->k++;
    }

    public function createBody($o) : void {
        $this->se->setCellValue('B'.$this->k, $o->getName());
        $this->se->setCellValue('C'.$this->k, $o->getFollowers());
        $this->se->setCellValue('D'.$this->k, $o->getDate());
    }
}
