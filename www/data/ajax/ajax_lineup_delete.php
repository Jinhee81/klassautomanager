<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$sql1 = "delete from lineup 
         where id = {$_POST['lineupid']} and 
         lineupcode = '{$_POST['lineupcode']}'
         ";
// echo $sql1;
$result1 = mysqli_query($conn, $sql1);

if(!$result1){
    echo json_encode('delete_error');
    error_log(mysqli_error($conn));
    exit();
} else {
    echo json_encode('success');
}




?>