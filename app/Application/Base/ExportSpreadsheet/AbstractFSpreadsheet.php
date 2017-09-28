<?php
namespace Streaming\Application\Base\ExportSpreadsheet;

abstract class AbstractFSpreadsheet {
    public $se;
    public $k;

    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet $se, $k) {
        $this->se = $se;
        $this->k = $k;
    }

    abstract public function createHeader($styleArray = false) : void;
    abstract public function createBody($o) : void;
}
