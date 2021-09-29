<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include "view/conn.php";

$id = $_POST['id'];
$password = $_POST['password'];

$check = "SELECT * from user WHERE id = '{$id}' LIMIT 1";
$result = mysqli_query($conn, $check);
$row = mysqli_fetch_array($result);

// print_r($row);

if (!$row) {
    echo "<script>
  alert('이메일아이디가 조회되지 않습니다. 관리자에게 문의하세요.');
  history.back();
  </script>";
} else {
    if ($id === $row['id'] && $password === $row['password']) {
        $_SESSION['is_login'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['position'] = $row['position'];
        $_SESSION['system_position'] = $row['system_position'];
        $_SESSION['usercode'] = $row['usercode'];
        header('Location: kservice/note/note2.php');
        exit();
    } else {
        echo "<script>
    alert('아이디 또는 비밀번호가 일치하지 않습니다.');
    location.href='index.php';
    </script>";
    }
}

// print_r($_SESSION);
