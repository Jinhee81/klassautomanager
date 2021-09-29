<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'firstDate' => mysqli_real_escape_string($conn, $_POST['firstDate']),
    'channel' => mysqli_real_escape_string($conn, $_POST['channel']),
    'danawaNumber' => mysqli_real_escape_string($conn, $_POST['danawaNumber']),
    'customerName' => mysqli_real_escape_string($conn, $_POST['customerName']),
    'customerContact' => mysqli_real_escape_string($conn, $_POST['customerContact']),
    'customerLocation' => mysqli_real_escape_string($conn, $_POST['c_location']),
    'rentlease' => mysqli_real_escape_string($conn, $_POST['rentlease']),
    'customerContent' => mysqli_real_escape_string($conn, $_POST['customerContent']),
    'salesContent' => mysqli_real_escape_string($conn, $_POST['salesContent']),
    'brand' => mysqli_real_escape_string($conn, $_POST['brand']),
    'model' => mysqli_real_escape_string($conn, $_POST['model']),
    'usercode' => mysqli_real_escape_string($conn, $_POST['usercode'])
);

// echo "<br>";
// var_dump($fil['brand']);echo "<br>";

if ($fil['brand'] == 'brandall') {
    $fil['brand'] = '';
}

if ($fil['model'] == 'modelall') {
    $fil['model'] = '';
}

$sql = "insert into note
        (firstDate, channel, danawaNumber, c_name, c_contact, c_location, rentlease, brand, model, c_content, sales_content, usercode)
        values
        (
            '{$fil['firstDate']}',
            '{$fil['channel']}',
            '{$fil['danawaNumber']}',
            '{$fil['customerName']}',
            '{$fil['customerContact']}',
            '{$fil['customerLocation']}',
            '{$fil['rentlease']}',
            '{$fil['brand']}',
            '{$fil['model']}',
            '{$fil['customerContent']}',
            '{$fil['salesContent']}',
            {$fil['usercode']}
        )
        ";
// echo $sql; echo 'solmi';

$result = mysqli_query($conn, $sql);

if ($result) {
    $id = mysqli_insert_id($conn);
    echo "<script>alert('등록했습니다.');</script>";
    echo "<script>location.href='../note/note_edit4.php?id=" . $id . "';</script>";
} else {
    echo "<script>alert('저장에 문제가 발생했습니다. 관리자에게 문의하세요.');</script>";
    echo "<script>location.href(history.back)</script>";
}
