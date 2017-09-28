<?php
namespace Streaming\Application\Service\ExportSpreadsheet\Youtube;
use \Streaming\Application\Base\ExportSpreadsheet as Base;

class Video extends Base\AbstractFSpreadsheet {

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
        $this->se->setCellValue('A'.$this->k, 'Youtube Video');
        $this->se->setCellValue('B'.$this->k, 'Youtube ID');
        $this->se->setCellValue('C'.$this->k, 'View count');
        $this->se->setCellValue('D'.$this->k, 'Like count');
        $this->se->setCellValue('E'.$this->k, 'Dislike count');
        $this->se->setCellValue('F'.$this->k, 'Favorite count');
        $this->se->setCellValue('G'.$this->k, 'Comment count');
        $this->se->setCellValue('H'.$this->k, 'As for');
        $this->se->getStyle("A".$this->k.":"."H".$this->k)->applyFromArray($styleArray);
        $this->k++;
    }

    public function createBody($o) : void {
        $this->se->setCellValue('B'.$this->k, $o->getYoutubeid());
        $this->se->setCellValue('C'.$this->k, $o->getViewCount());
        $this->se->setCellValue('D'.$this->k, $o->getLikeCount());
        $this->se->setCellValue('E'.$this->k, $o->getDislikeCount());
        $this->se->setCellValue('F'.$this->k, $o->getFavoriteCount());
        $this->se->setCellValue('G'.$this->k, $o->getCommentCount());
        $this->se->setCellValue('H'.$this->k, $o->getDate());
    }
}
