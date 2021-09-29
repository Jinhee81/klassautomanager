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
    'customerName' => mysqli_real_escape_string($conn, $_POST['c_name']),
    'customerContact' => mysqli_real_escape_string($conn, $_POST['c_contact']),
    'c_location' => mysqli_real_escape_string($conn, $_POST['c_location']),
    'rentlease' => mysqli_real_escape_string($conn, $_POST['rentlease']),
    'customerContent' =>
    mysqli_real_escape_string($conn, $_POST['c_content']),
    's_status' =>
    mysqli_real_escape_string($conn, $_POST['s_status']),
    'c_status' => mysqli_real_escape_string($conn, $_POST['c_status']),
    'idnote' => mysqli_real_escape_string($conn, $_POST['idnote'])
);

// print_r($fil);

$sql2 = "update note
         set
            firstDate = '{$fil['firstDate']}',
            channel = '{$fil['channel']}',
            danawaNumber = '{$fil['danawaNumber']}',
            c_name = '{$fil['customerName']}',
            c_contact = '{$fil['customerContact']}',
            c_location = '{$fil['c_location']}',
            rentlease = '{$fil['rentlease']}',
            c_content = '{$fil['customerContent']}',
            s_status = '{$fil['s_status']}',
            c_status = '{$fil['c_status']}'
          where idnote = {$fil['idnote']}
        ";
// echo $sql2;

$result2 = mysqli_query($conn, $sql2);

if (!$result2) {
    echo json_encode('save_error');
    exit();
} else {
    echo json_encode('success');
}
