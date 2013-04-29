<?php

if (isset($_POST['datatype'])) {
	fileCheck('source');
	fileCheck('contrast');
} else
echo 'Failed to retrieve all post data';


//Check all aspects of uploaded files
function fileCheck($filename) {
	echo '<p>';
	if($_FILES[$filename]['name']) {
		if ($_FILES[$filename]["error"] > 0)
		  {
		  echo "Error: " . $_FILES[$filename]["error"] . "<br>";
		  }
		else
		  {
		  echo "Upload: " . $_FILES[$filename]["name"] . "<br>";
		  echo "Type: " . $_FILES[$filename]["type"] . "<br>";
		  echo "Size: " . ($_FILES[$filename]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES[$filename]["tmp_name"];
		  }
		} else
		echo 'File name not set';
	echo '</p>';
}

?>
