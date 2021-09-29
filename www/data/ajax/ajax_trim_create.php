<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$lineupcode = json_decode($_POST['lineupIdx']);

$sql1 = "select count(*) from trim
         where 
            trimname='{$_POST['newtrimname']}' and
            lineupcode='{$lineupcode}'
         ";

// echo $sql1;
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

if($row1[0] > 0) {
    echo json_encode('exist_trimname_error');
    exit();
}

$sql2 = "insert into trim 
         (trimname, trimcode, usepart, price, lineupcode, created)
         values
         (
             '{$_POST['newtrimname']}',
             '{$_POST['newtrimcode']}',
             '{$_POST['newusepart']}',
             {$_POST['price']},
             '{$lineupcode}',
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