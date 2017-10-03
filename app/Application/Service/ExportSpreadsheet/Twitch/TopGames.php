<?php
namespace Streaming\Application\Service\ExportSpreadsheet\Twitch;
use \Streaming\Application\Base\ExportSpreadsheet as Base;

class TopGames extends Base\AbstractFSpreadsheet {

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
        $this->se->setCellValue('A'.$this->k, 'Top Games');
        $this->se->setCellValue('B'.$this->k, 'Game Name');
        $this->se->setCellValue('C'.$this->k, 'Game Id');
        $this->se->setCellValue('D'.$this->k, 'View count');
        $this->se->setCellValue('E'.$this->k, 'Channel count');
        $this->se->setCellValue('F'.$this->k, 'As for');
        $this->se->getStyle("A".$this->k.":"."G".$this->k)->applyFromArray($styleArray);
        $this->k++;
    }

    public function createBody($o) : void {
        $this->se->setCellValue('B'.$this->k, $o->getDisplayName());
        $this->se->setCellValue('C'.$this->k, $o->getGameId());
        $this->se->setCellValue('D'.$this->k, $o->getViewCount());
        $this->se->setCellValue('E'.$this->k, $o->getChannelCount());
        $this->se->setCellValue('F'.$this->k, $o->getDate());
    }
}
