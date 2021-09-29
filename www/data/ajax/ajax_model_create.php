<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// var_dump($_POST['etc']);echo "<br>";

$sql1 = "select count(*) 
         from model 
         where modelname='{$_POST['newmodelname']}'";

$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

// echo $sql1;echo "<br>";


if($row1[0] > 0){
    echo json_encode('already_exist');
    exit();
} else {
    $sql2 = "insert into model
             (modelname, modelcode, danawacode, brandcode, etc, created)
             values
             (
                '{$_POST['newmodelname']}',
                '{$_POST['newmodelcode']}',
                '{$_POST['danawacode']}',
                '{$_POST['brandIdx']}',
                '{$_POST['etc']}',
                now()
             )
             ";
    // echo $sql2;echo "<br>";
    $result2 = mysqli_query($conn, $sql2);
    
    if(!$result2){
        echo json_encode('save_error');
        error_log(mysqli_error($conn));
        exit();
    } else {
        echo json_encode('success');
    }
}




?>