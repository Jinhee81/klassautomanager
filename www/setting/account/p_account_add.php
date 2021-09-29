<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);
echo "<br>";

$fil = array(
    'department' => mysqli_real_escape_string($conn, $_POST['department']),
    'position' => mysqli_real_escape_string($conn, $_POST['position']),
    'system_position' => mysqli_real_escape_string($conn, $_POST['system_position']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'phone' => mysqli_real_escape_string($conn, $_POST['phone']),
    'email' => mysqli_real_escape_string($conn, $_POST['email']),
    'start_work' => mysqli_real_escape_string($conn, $_POST['start_work']),
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
    'etc' => mysqli_real_escape_string($conn, $_POST['etc'])
);

$sql = "insert into user
        (department, position, system_position, name, phone, email, start_work, id, password, etc)
        values
        (
            '{$fil['department']}',
            '{$fil['position']}',
            '{$fil['system_position']}',
            '{$fil['name']}',
            '{$fil['phone']}',
            '{$fil['email']}',
            '{$fil['start_work']}',
            '{$fil['id']}',
            '{$fil['password']}',
            '{$fil['etc']}'
        )
        ";

// echo $sql;

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<script>alert('저장과정에 문제 생겼습니다. 관리자에게 문의하세요.');</script>";
    echo "<script>history.back();</script>";
    error_log(mysqli_error($conn));
    exit();
} else {
    echo "<script>alert('저장하였습니다.');</script>";
    echo "<script>location.href = 'account.php';</script>";
}
