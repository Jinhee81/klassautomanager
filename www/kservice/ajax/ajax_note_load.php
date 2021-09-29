<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "select 
            firstDate, channel, danawaNumber,
            c_name, c_contact, c_location, 
            rentlease, 
            brand, model,
            c_content,
            user.usercode,
            user.name,
            user.department,
            c_status,
            s_status,
            brand.name as brandname,
            model.modelname,
            id_n_csting,
            id_cn,
            id_n_car,
            id_n_contract,
            id_n_insurance,
            id_n_lease
         from note
         join user 
            on note.usercode = user.usercode
         join brand 
            on note.brand = brand.brandcode
         join model 
            on note.model = model.modelcode
         where idnote = {$fil['id']}";
// echo $sql;

$result = mysqli_query($conn, $sql);

// $allrows = array();

if($result) {
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
} else {
    echo json_encode('error_occured');
}