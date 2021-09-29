<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// var_dump($_POST['price']);

$price = str_replace(',', '', $_POST['price']);

// var_dump($price);

$sql1 = "select trimname, usepart, price from trim where id={$_POST['trimid']}";

$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

// echo $sql1;

if($row1[0]===$_POST['trimname'] && $row1[1]===$_POST['usepart'] && $row1[2]===$price){
    echo json_encode('none_change');
    exit();
} else {
    $sql3 = "update trim 
             set
                trimname = '{$_POST['trimname']}',
                usepart = '{$_POST['usepart']}',
                price = {$price},
                updated = now()
             where id={$_POST['trimid']}
             ";
    // echo $sql3;
    $result3 = mysqli_query($conn, $sql3);
    
    if(!$result3){
        echo json_encode('save_error');
        error_log(mysqli_error($conn));
        exit();
    } else {
        echo json_encode('success');
    }
}
?>