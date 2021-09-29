<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'id_cn' => mysqli_real_escape_string($conn, $_POST['id_cn'])
);

$sql = "select 
            *
         from customer
         where id_cn = {$fil['id_cn']}
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);

if($result) {
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
} else {
    echo json_encode('error_occured');
}