<?php
session_start();
if(!isset($_SESSION['is_login'])){
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$fil = array(
    'firstDate' => mysqli_real_escape_string($conn, $_POST['firstDate']),
    'channel' => mysqli_real_escape_string($conn, $_POST['channel']),
    'danawaNumber' => mysqli_real_escape_string($conn, $_POST['danawaNumber']),
    'customerName' => mysqli_real_escape_string($conn, $_POST['customerName']),
    'customerContact' => mysqli_real_escape_string($conn, $_POST['customerContact']),
    'customerLocation' => mysqli_real_escape_string($conn, $_POST['customerLocation']),
    'rentlease' => mysqli_real_escape_string($conn, $_POST['rentlease']),
    'customerContent' => mysqli_real_escape_string($conn, $_POST['customerContent']),
    'salesContent' => mysqli_real_escape_string($conn, $_POST['salesContent']),
    'usercode' => mysqli_real_escape_string($conn, $_POST['usercode'])
);

$sql = "insert into note
        (firstDate, channel, danawaNumber, c_name, c_contact, c_location, rentlease, c_content, sales_content, usercode)
        values
        (
            '{$fil['firstDate']}',
            '{$fil['channel']}',
            '{$fil['danawaNumber']}',
            '{$fil['customerName']}',
            '{$fil['customerContact']}',
            '{$fil['customerLocation']}',
            '{$fil['rentlease']}',
            '{$fil['customerContent']}',
            '{$fil['salesContent']}',
            {$fil['usercode']}
        )
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);

if($result){
    echo json_encode('success');
} else {
    echo json_encode('fail');
}

?>