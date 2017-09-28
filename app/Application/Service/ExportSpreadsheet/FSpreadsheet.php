<?php
namespace Streaming\Application\Service\ExportSpreadsheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use \Exception;

class FSpreadsheet {

    public $sp;
    public $sh;
    public $iter = 0;

    public function __construct(){
        $this->sp = new Spreadsheet();
        $this->sh = $this->sp->getActiveSheet();
    }

    public function prepareFrom(array $data, $headerStyle = false) : void {
        $headers = [];
        foreach ($data as $key => $o) {
            $cl = get_class($o);
            $class = __NAMESPACE__.substr($cl, strpos($cl, "\Entity")+7);
            $instance = new $class($this->sh, $this->iter+1);

            if(!array_key_exists($cl, $headers)) {
                $instance->createHeader($headerStyle);
                $this->iter++;
            }

            $instance->createBody($o);

            $headers[$cl] = true;
            $this->iter++;
        }
    }

    public function createFile(string $file_name, string $extension) : void {
        //https://phpspreadsheet.readthedocs.io/en/develop/ *supported write formats
        $supported = ["xls", "ods", "xlsx"];
        $extension = strtolower($extension);
        if(in_array($extension, $supported)) {
            $class = "PhpOffice\PhpSpreadsheet\Writer\\".ucfirst($extension);
            $writer = new $class($this->sp);
            $writer->save($file_name.".".$extension);
        } else {
            throw new Exception("File format not supported.", 1);
        }

    }

    public function autoSetColumns($cols = ["A", "B", "C", "D", "E", "F", "G", "H"]) : void{
        foreach ($cols as $v) {
            $this->sh->getColumnDimension($v)->setAutoSize(true);
        }
    }
}
