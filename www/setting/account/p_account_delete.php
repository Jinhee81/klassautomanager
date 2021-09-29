<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);
// echo "<br>";

$usercode = mysqli_real_escape_string($conn, $_POST['usercode']);

$sql = "delete from user where usercode = {$usercode}";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('삭제하였습니다.');</script>";
    echo "<script>location.href = 'account.php';</script>";
} else {
    echo "<script>alert('삭제과정에 문제 생겼습니다. 관리자에게 문의하세요.');</script>";
    echo "<script>history.back();</script>";
    error_log(mysqli_error($conn));
    exit();
}
