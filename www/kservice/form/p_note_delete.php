<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$idnote = mysqli_real_escape_string($conn, $_POST['idnote']);



$sql = "delete from note where idnote = {$idnote}
        ";
// echo $sql;
// echo 'solmi';

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('삭제했습니다.');</script>";
    echo "<script>location.href='../note/note2.php';</script>";
} else {
    echo "<script>alert('삭제에 문제가 발생했습니다. 관리자에게 문의하세요.');</script>";
    echo "<script>location.href(history.back)</script>";
}
