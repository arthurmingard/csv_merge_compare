<?php 

fileCheck("csv-file");

function fileCheck($filename) {
	if($_FILES[$filename]['name']) {
		if ($_FILES[$filename]["error"] > 0)
		  {
		  echo "Error";
		  }
		else
		  {
		  echo contentToJSON($_FILES[$filename]["tmp_name"]);
		  }
		} else
		echo "Error";
}

function contentToJSON($fileData) {
	$rawContent = file_get_contents($fileData);
	$array = array_map("str_getcsv", explode("\n", $rawContent));
	return json_encode($array);
}


/*#!/bin/php
<?
$strFile1 = $argv[1];
$strFile2 = $argv[2];

function parseData($strFilename) {
  $strAllData = file($strFilename);
  foreach($strAllData as $intLineNum => $strLineData) {
    $arrLineData = explode(',',$strLineData);
  }
  return $arrLineData;
}

$arrFile1 = parseData($strFile1);
$arrFile2 = parseData($strFile2);

$intRow = 0;
foreach($arrFile1 as $intKey => $strVal) {
  if(!isset($arrFile2[$intKey]) || ($arrFile2[$intKey] != $strVal)) {
    exit("Column $intKey, row $intRow of $strFile1 doesn't match\n");
  }
  $intRow++;
}
print "All rows match fine.\n";

?>
 */

?>

