<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$sql1 = "select lineupname, usepart from lineup where id={$_POST['lineupid']}";

$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);

// echo $sql1;

if($row[0]===$_POST['lineupname'] && $row[1]===$_POST['usepart']){
    echo json_encode('none_change');
    exit();
} else {
    $sql3 = "update lineup 
             set
                lineupname = '{$_POST['lineupname']}',
                usepart = '{$_POST['usepart']}',
                updated = now()
             where id={$_POST['lineupid']}
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