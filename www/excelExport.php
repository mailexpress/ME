<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 */

function writeExelFile($filename,$ar_data){
    require_once (Classes/PHPExcel.php);
    $Excelobj = new PHPExcel();
    $Excelobj->setActiveSheetIndex(0);
    $aSheet = $Excelobj->getActiveSheet();

   /*
    *
    *
    */

    $Writer = new PHPExcel_Writer_Excel5($Excelobj); // создаем объект для записи excel в файл
    header(‘Content-Type: application/vnd.ms-excel’); // посылаем браузеру нужные заголовки для сохранения файла
    header(‘Content-Disposition: attachment;filename=»‘.$filename.’»‘);
    header(‘Cache-Control: max-age=0′);
    $Writer->save(‘php://output’); // выводим данные в excel формате
}
?>