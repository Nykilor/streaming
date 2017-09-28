<?php
namespace Streaming\Application\Service\ExportSpreadsheet\Twitch;
use \Streaming\Application\Base\ExportSpreadsheet as Base;

class Channel extends Base\AbstractFSpreadsheet {

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
        $this->se->setCellValue('A'.$this->k, 'Twitch Channel');
        $this->se->setCellValue('B'.$this->k, 'Display name');
        $this->se->setCellValue('C'.$this->k, 'View count');
        $this->se->setCellValue('D'.$this->k, 'As for');
        $this->se->getStyle("A".$this->k.":"."G".$this->k)->applyFromArray($styleArray);
        $this->k++;
    }

    public function createBody($o) : void {
        $this->se->setCellValue('B'.$this->k, $o->getDisplayName());
        $this->se->setCellValue('C'.$this->k, $o->getViewCount());
        $this->se->setCellValue('D'.$this->k, $o->getDate());
    }
}
