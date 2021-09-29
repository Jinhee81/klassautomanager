<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";


$danawa_file = $_SERVER['DOCUMENT_ROOT'].'/data/raw/danawa.csv';

$danawa_array = array();

if(($h = fopen($danawa_file, 'r')) !== false) {
    while(($data = fgetcsv($h, 1000, ',')) !== false) {
        $danawa_array[] = $data;
    }

    fclose($h);
}

print_r($danawa_array);

$error = array();

for($i=0; $i < count($danawa_array); $i++) {
    $sql = "insert into danawa
                    (code, name, usepart, created)
                  values
                    ('{$danawa_array[$i][0]}',
                    '{$danawa_array[$i][1]}',
                    'Y',
                    now())
            ";

    // echo $sql."<br>";

    $result = mysqli_query($conn, $sql);

    if(!$result){
      array_push($error, $sql);
    }
}

// print_r(count($danawa_array));echo "<br>";

echo "2<br>";
print_r($error);
 ?>