<?php

//$spreadsheet_url="https://docs.google.com/spreadsheet/pub?key=<somecode>&single=true&gid=0&output=csv";
$spreadsheet_url="https://docs.google.com/spreadsheet/ccc?key=0Ahq3wr_ujYJXdEF5Z3JjQ1ZuaXFIYWRZNnd5Y0Z4RkE";

if(!ini_set('default_socket_timeout',    15))
	echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
$row = 1;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//            $spreadsheet_data[]=$data;
		$num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    echo $spreadsheet_data;

    fclose($handle);
}
else
    die("Problem reading csv");?>

