<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

//print_r($_POST);
echo "<br>";

$fil = array(
    'department' => mysqli_real_escape_string($conn, $_POST['department']),
    'position' => mysqli_real_escape_string($conn, $_POST['position']),
    'system_position' => mysqli_real_escape_string($conn, $_POST['system_position']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'phone' => mysqli_real_escape_string($conn, $_POST['phone']),
    'email' => mysqli_real_escape_string($conn, $_POST['email']),
    'start_work' =>
    mysqli_real_escape_string($conn, $_POST['start_work']),
    'end_work' => mysqli_real_escape_string($conn, $_POST['end_work']),
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
    'etc' => mysqli_real_escape_string($conn, $_POST['etc']),
    'usercode' => mysqli_real_escape_string($conn, $_POST['usercode'])
);

$sql = "update user
        set
            department = '{$fil['department']}',
            position = '{$fil['position']}',
            system_position = '{$fil['system_position']}',
            name = '{$fil['name']}',
            phone = '{$fil['phone']}',
            email = '{$fil['email']}',
            start_work = '{$fil['start_work']}',
            end_work = '{$fil['end_work']}',
            id = '{$fil['id']}',
            password = '{$fil['password']}',
            etc = '{$fil['etc']}'
        where usercode = {$fil['usercode']}
                ";

// echo $sql;

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<script>alert('수정과정에 문제 생겼습니다. 관리자에게 문의하세요.');</script>";
    echo "<script>history.back();</script>";
    error_log(mysqli_error($conn));
    exit();
} else {
    echo "<script>alert('수정하였습니다.');</script>";
    echo "<script>location.href = 'account.php';</script>";
}
