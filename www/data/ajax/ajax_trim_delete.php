<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$sql = "delete from trim
        where id={$_POST['trimid']} and
              trimcode = '{$_POST['trimcode']}'
        ";

$result = mysqli_query($conn, $sql);

if($result){
    echo json_encode('success');
} else {
    echo json_encode('fail');
}

?>