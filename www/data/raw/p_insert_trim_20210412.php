<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";


$trim_file = $_SERVER['DOCUMENT_ROOT'].'/data/raw/trim20210427.csv';

$trim_array = array();

if(($h = fopen($trim_file, 'r')) !== false) {
    while(($data = fgetcsv($h, 1000, ',')) !== false) {
        $trim_array[] = $data;
    }

    fclose($h);
}

print_r($trim_array);

$error = array();

for($i=1; $i < count($trim_array); $i++) {
    $sql = "insert into trim
                    (trimcode, trimname, lineupcode, usepart, price)
                  values
                    ('{$trim_array[$i][1]}',
                    '{$trim_array[$i][0]}',
                    '{$trim_array[$i][2]}',
                    '{$trim_array[$i][3]}',
                    {$trim_array[$i][4]})";

    echo $sql."<br>";

    $result = mysqli_query($conn, $sql);

    if(!$result){
      array_push($error, $sql);
    }
}

print_r(count($trim_array));echo "<br>";

echo "7<br>";
print_r($error);
 ?>