<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$modelcode = json_decode($_POST['modelIdx']);

$sql1 = "select count(*) from lineup
         where 
            lineupname='{$_POST['newlineupname']}' and
            modelcode='{$modelcode}'
         ";

// echo $sql1;
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

if($row1[0] > 0) {
    echo json_encode('alreay_exist');
    exit();
}

$sql2 = "insert into lineup 
         (lineupname, lineupcode, usepart, modelcode, created)
         values
         (
             '{$_POST['newlineupname']}',
             '{$_POST['newlineupcode']}',
             '{$_POST['newusepart']}',
             '{$modelcode}',
             now()
         )";
// echo $sql2;
$result2 = mysqli_query($conn, $sql2);

if(!$result2){
    echo json_encode('save_error');
    error_log(mysqli_error($conn));
    exit();
} else {
    echo json_encode('success');
}


?>