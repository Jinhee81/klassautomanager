<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'idcar' => mysqli_real_escape_string($conn, $_POST['idcar'])
);

$sql = "select 
            *
        from note_2_car
        where id_n_car = {$fil['idcar']}";
// echo $sql;

$result = mysqli_query($conn, $sql);

// $allrows = array();

if ($result) {
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
} else {
    echo json_encode('error_occured');
}
