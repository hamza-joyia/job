<?php

namespace App\Http\Controllers;

use function foo\func;
use App\User;
use PHPExcel;
use PHPExcel_IOFactory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades;
class ExportController extends Controller
{
    //
    public function  makeArray($array)
    {
        $array=(array)$array;
        $converted_array=array();
        foreach($array["\x00*\x00attributes"] as $value)
        {
            array_push($converted_array,$value);
        }
        return $converted_array;
    }
    public function changeCellColor($conv_array,$row_count,$sheet)
    {

        return $sheet;
    }
    public function index()
    {

      $users=User::all();
      Facades\Excel::create('UserExcel',function ($excel) use ($users){
        $excel->sheet('Sheet1',function($sheet) use ($users){
            $var=array();
            $flag=0;
            $row_count=1;
           foreach ($users as $user)
           {
               if($row_count==1)
               {
                   $attributes=new User;
                   $sheet->row(1,$attributes->getFillable());

               }
               else
                   {

                   $conv_array = $this->makeArray($user);
                   $sheet->row($row_count, $conv_array);
                   for($i=0;$i<sizeof($conv_array);$i++)
                   {
                       $col_alphabet=chr(65+$i);
                       $column_name=$col_alphabet.strval($row_count);
                       $color = str_pad(dechex(mt_rand(0xab5f5f, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                       array_push($var,$column_name);
                       $sheet->getStyle($column_name)->applyFromArray(array('font' => array('size' => 10,'bold' => true,'color' => array('rgb' => $color))));
                       $data_type=gettype($conv_array[$i]);
                       if($data_type=='string')
                       {
                           $sheet->getCell($column_name)->setDataType(\PHPExcel_Cell_DataType::TYPE_STRING);

                       }
                       else if($data_type=='integer')
                       {
                           $sheet->getCell($column_name)->setDataType(\PHPExcel_Cell_DataType::TYPE_NUMERIC);
                            $flag=$column_name;

                       }else if($data_type=='date')
                       {
                           $sheet->getCell($column_name)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING);

                       }
                   }

               }
               $row_count += 1;
               }

           $column=chr(65+$flag);
           $column_name=$column.strval("2");
           $column_end=$column.strval(sizeof($users) );
           $total_column=$column.strval(sizeof($users)+1 );
           $sheet->setCellValue($total_column, "=SUM($column_name,$column_end)");

        });
      })->download('xlsx');

    }
}
