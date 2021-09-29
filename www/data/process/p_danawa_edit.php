<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

print_r($_POST);echo "<br>";

$sql1 = "select 
            name, code, usepart, etc 
         from danawa 
         where id={$_POST['id']}";
echo $sql1;

$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);


if($row[0]===$_POST['name'] && $row[1]===$_POST['danawacode'] && $row[2]===$_POST['usepart'] && $row[3]===$_POST['etc']){
    echo "<script>alert('변경내역이 없어요. 다시 확인해주세요.');</script>";
    echo "<script>history.back();</script>";
    exit();
} else {
    $sql2 = "update danawa 
             set
                name = '{$_POST['name']}',
                code = '{$_POST['danawacode']}',
                usepart = '{$_POST['usepart']}',
                etc = '{$_POST['etc']}',
                updated = now()
             where id={$_POST['id']}
             ";
    // echo $sql2;
    $result2 = mysqli_query($conn, $sql2);
    
    if(!$result2){
        echo "<script>alert('수정과정에 문제생겼습니다. 관리자에게 문의하세요.');</script>";
        echo "<script>history.back();</script>";
        error_log(mysqli_error($conn));
        exit();
    } else {
        echo "<script>alert('수정하였습니다^^');</script>";
        echo "<script>history.back();</script>";
    }
}




?>