<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

// print_r($_POST);

$fil = array(
    'usercode' => mysqli_real_escape_string($conn, $_POST['usercode'])
);

$sql = "select 
            id_cn,
            idnote,
            cn_div,
            cn_name,
            cn_contact,
            cn_email,
            cn_birthday,
            customer.usercode,
            user.name,
            user.department
         from customer
         left join user on customer.usercode = user.usercode
         where customer.usercode = {$fil['usercode']}
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);


if($result){
    $allRows = array();

    while($row = mysqli_fetch_array($result)){
        $allRows[] = $row;
    }
    
    echo json_encode($allRows);
} else {
    $count = mysqli_num_rows($result);
    echo json_encode($count);
}