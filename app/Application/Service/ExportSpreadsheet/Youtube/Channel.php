<?php
namespace Streaming\Application\Service\ExportSpreadsheet\Youtube;
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
        $this->se->setCellValue('A'.$this->k, 'Youtube Channel');
        $this->se->setCellValue('B'.$this->k, 'Youtube ID');
        $this->se->setCellValue('C'.$this->k, 'View count');
        $this->se->setCellValue('D'.$this->k, 'Subscriber count');
        $this->se->setCellValue('E'.$this->k, 'Video count');
        $this->se->setCellValue('F'.$this->k, 'Comment count');
        $this->se->setCellValue('G'.$this->k, 'As for');
        $this->se->getStyle("A".$this->k.":"."G".$this->k)->applyFromArray($styleArray);
        $this->k++;
    }

    public function createBody($o) : void {
        $this->se->setCellValue('B'.$this->k, $o->getYoutubeid());
        $this->se->setCellValue('C'.$this->k, $o->getViewCount());
        $this->se->setCellValue('D'.$this->k, $o->getSubscriberCount());
        $this->se->setCellValue('E'.$this->k, $o->getVideoCount());
        $this->se->setCellValue('F'.$this->k, $o->getCommentCount());
        $this->se->setCellValue('G'.$this->k, $o->getDate());
    }
}
