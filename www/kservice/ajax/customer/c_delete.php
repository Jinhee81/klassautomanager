<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'id_cn' => mysqli_real_escape_string($conn, $_POST['id_cn']),
    'id' => mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "delete 
         from customer
         where id_cn = {$fil['id_cn']}
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);

if($result) {
    $sql2 = "update note set id_cn=null where idnote={$fil['id']}";

    $result2 = mysqli_query($conn, $sql2);

    if($result2) {
        echo json_encode('success');
    } else {
        echo json_encode('error_occured');
        error_log(mysqli_error($conn));
        exit();
    }
} else {
    echo json_encode('error_occured');
    error_log(mysqli_error($conn));
    exit();
}