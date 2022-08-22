<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/
session_start();
set_time_limit(0);
$filename = filter_var(strip_tags($_REQUEST['filename']), FILTER_SANITIZE_STRING);
$data = $_SESSION['export_array'];

if(!isset($filename) or !isset($data) or !$filename or !$data)
   exit;

$export='';
foreach($data as $t => $v)
{
   for($j=0; $j < count($v); $j++)
   {
      $val = str_replace(',','',$v[$j]);
      $export .= '"'.$val.'",';
   }
   $export = rtrim($export,',');
   $export .= "\n";
}

$export = rtrim($export,"\n");
$mm_type="application/octet-stream";
header("Cache-Control: public, must-revalidate");
header("Pragma: hack");
header("Content-Type: " . $mm_type);
header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
header("Content-Description: File Transfer"); 
header("Content-Transfer-Encoding: binary\n");
echo $export;

?>
