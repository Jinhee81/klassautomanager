<?php
//이건 db로부터 데이터를 만드는 파일, 이건 spec파일에서 필요한 것
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/view/conn.php';

$sql_brand = "select brandcode, name from brand";
$result_b = mysqli_query($conn, $sql_brand);

$brand_array = array();

while($row_b = mysqli_fetch_array($result_b)){
    array_push($brand_array, $row_b);
}

// print_r($brand_array[0]);echo "<br>";

$sql_model = "select modelcode, modelname, danawacode, brandcode from model";
$result_m = mysqli_query($conn, $sql_model);

$model_array = array();

while($row_m = mysqli_fetch_array($result_m)){
    array_push($model_array, $row_m);
}

// print_r($model_array[0]);echo "<br>";


$sql_lineup = "select lineupcode, lineupname, modelcode, usepart from lineup";
$result_l = mysqli_query($conn, $sql_lineup);

$lineup_array = array();

while($row_l = mysqli_fetch_array($result_l)){
    array_push($lineup_array, $row_l);
}

// print_r($lineup_array[0]);echo "<br>";

$sql_trim = "select trimcode, trimname, lineupcode, usepart from trim";
$result_t = mysqli_query($conn, $sql_trim);

$trim_array = array();

while($row_t = mysqli_fetch_array($result_t)){
    array_push($trim_array, $row_t);
}

// print_r($trim_array[0]);echo "<br>";
?>