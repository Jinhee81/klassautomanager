<?php
// print_r($_POST);echo "<br>";

session_start();

include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST);

$fil = array(
    'idnote' => mysqli_real_escape_string($conn, $_POST['idnote']),
    'cn_div' => mysqli_real_escape_string($conn, $_POST['cn_div']),
    'cn_name' => mysqli_real_escape_string($conn, $_POST['cn_name']),
    'cn_contact' => mysqli_real_escape_string($conn, $_POST['cn_contact']),
    'cn_email' => mysqli_real_escape_string($conn, $_POST['cn_email']),
    'cn_birthday' => mysqli_real_escape_string($conn, $_POST['cn_birthday']),
    'cn_companyname' => mysqli_real_escape_string($conn, $_POST['cn_companyname']),
    'cn_company_number' => mysqli_real_escape_string($conn, $_POST['cn_company_number']),
    'cn_company_number2' => mysqli_real_escape_string($conn, $_POST['cn_company_number2']),
    'usercode' => mysqli_real_escape_string($conn, $_POST['usercode'])
);

// print_r($fil);echo "<br>";

$sql = "insert into customer
        (idnote, cn_div,
         cn_name, 
         cn_contact, cn_email, cn_birthday,
         cn_companyname, cn_company_number, cn_company_number2,
         usercode
        ) 
        values
        (
            {$fil['idnote']},
            '{$fil['cn_div']}',
            '{$fil['cn_name']}',
            '{$fil['cn_contact']}',
            '{$fil['cn_email']}',
            '{$fil['cn_birthday']}',
            '{$fil['cn_companyname']}',
            '{$fil['cn_company_number']}',
            '{$fil['cn_company_number2']}',
            {$fil['usercode']}
        )
        ";
// echo $sql;

$result = mysqli_query($conn, $sql);

if ($result) {
    $id_cn = mysqli_insert_id($conn);

    $sql2 = "
            update note 
            set 
                id_cn = {$id_cn} 
            where idnote={$fil['idnote']}
            ";
    // echo $sql2;
    $result2 = mysqli_query($conn, $sql2);

    if($result2) {
        echo json_encode('success');
    } else {
        echo json_encode('error_occuered');
    }
} else {
    echo json_encode('error_occuered');
}

?>