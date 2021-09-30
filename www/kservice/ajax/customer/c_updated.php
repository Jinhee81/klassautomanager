<?php
// print_r($_POST);echo "<br>";

session_start();

include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$fil = array(
    'id_cn' => mysqli_real_escape_string($conn, $_POST['id_cn']),
    'cn_div' => mysqli_real_escape_string($conn, $_POST['cn_div']),
    'cn_name' => mysqli_real_escape_string($conn, $_POST['cn_name']),
    'cn_contact' => mysqli_real_escape_string($conn, $_POST['cn_contact']),
    'cn_email' => mysqli_real_escape_string($conn, $_POST['cn_email']),
    'cn_birthday' => mysqli_real_escape_string($conn, $_POST['cn_birthday']),
    'cn_companyname' => mysqli_real_escape_string($conn, $_POST['cn_companyname']),
    'cn_company_number' => mysqli_real_escape_string($conn, $_POST['cn_company_number']),
    'cn_company_number2' => mysqli_real_escape_string($conn, $_POST['cn_company_number2'])
);

// print_r($fil);echo "<br>";

$sql = "update customer
        set
            cn_div = '{$fil['cn_div']}',
            cn_name = '{$fil['cn_name']}', 
            cn_contact = '{$fil['cn_contact']}', 
            cn_email = '{$fil['cn_email']}', 
            cn_birthday = '{$fil['cn_birthday']}',
            cn_companyname = '{$fil['cn_companyname']}', 
            cn_company_number = '{$fil['cn_company_number']}', 
            cn_company_number2 = '{$fil['cn_company_number2']}',
            updated = now()
        where id_cn = {$fil['id_cn']}
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);

if($result) {
    echo json_encode('success');
} else {
    echo json_encode('error_occuered');
}

?>