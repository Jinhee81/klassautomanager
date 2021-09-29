<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// var_dump($_POST['etc']);echo "<br>";

$sql1 = "select modelname, danawacode, etc from model where id={$_POST['modelid']}";

$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);

// var_dump($row['etc']);echo "<br>";


if($row[0]===$_POST['modelname'] && $row[1]===$_POST['danawacode']){
    if(strlen($_POST['etc'])===0 && $row[2]===null)
        echo json_encode('none_change');
        exit();

    if($_POST['etc']===$row[2]) {
        echo json_encode('none_change');
        exit();
    }
} else {
    $sql2 = "update model 
             set
                modelname = '{$_POST['modelname']}',
                danawacode = '{$_POST['danawacode']}',
                etc = '{$_POST['etc']}',
                updated = now()
             where id={$_POST['modelid']}
             ";
    // echo $sql2;
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