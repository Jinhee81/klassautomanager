<?php
session_start();

include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

// print_r($_POST['cars']);

$fil = array(
    'brandcode' => mysqli_real_escape_string($conn, $_POST['cars']['brandcode']),
    'brandname' => mysqli_real_escape_string($conn, $_POST['cars']['brandname']),
    'modelcode' => mysqli_real_escape_string($conn, $_POST['cars']['modelcode']),
    'modelname' => mysqli_real_escape_string($conn, $_POST['cars']['modelname']),
    'lineupcode' => mysqli_real_escape_string($conn, $_POST['cars']['lineupcode']),
    'lineupname' => mysqli_real_escape_string($conn, $_POST['cars']['lineupname']),
    'trimcode' => mysqli_real_escape_string($conn, $_POST['cars']['trimcode']),
    'trimname' => mysqli_real_escape_string($conn, $_POST['cars']['trimname']),
    'price' => mysqli_real_escape_string($conn, $_POST['cars']['price']),
    'optionTotalPrice' => mysqli_real_escape_string($conn, $_POST['cars']['optionTotalPrice']),
    'carPrice1' => mysqli_real_escape_string($conn, $_POST['cars']['carPrice1']),
    'carPrice2' => mysqli_real_escape_string($conn, $_POST['cars']['carPrice2']),
    'carPrice3' => mysqli_real_escape_string($conn, $_POST['cars']['carPrice3']),
    'excolor' => mysqli_real_escape_string($conn, $_POST['cars']['excolor']),
    'incolor' => mysqli_real_escape_string($conn, $_POST['cars']['incolor']),
    'cc' => mysqli_real_escape_string($conn, $_POST['cars']['cc']),
    'fuel' => mysqli_real_escape_string($conn, $_POST['cars']['fuel']),
    'sun_front' => mysqli_real_escape_string($conn, $_POST['cars']['sun_front']),
    'sun_back' => mysqli_real_escape_string($conn, $_POST['cars']['sun_back']),
    'blackbox' => mysqli_real_escape_string($conn, $_POST['cars']['blackbox']),
    'c_etc_items' => mysqli_real_escape_string($conn, $_POST['cars']['c_etc_items']),
    'idnote' => mysqli_real_escape_string($conn, $_POST['cars']['idnote'])
);

$sql = "insert into note_2_car
        (brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, c_price_basic, c_price_option,  c_price_boption, c_price_discount, c_price_result, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items, idnote, car_created)
        values
        (
            '{$fil['brandcode']}',
            '{$fil['brandname']}',
            '{$fil['modelcode']}',
            '{$fil['modelname']}',
            '{$fil['lineupcode']}',
            '{$fil['lineupname']}',
            '{$fil['trimcode']}',
            '{$fil['trimname']}',
            {$fil['price']},
            {$fil['optionTotalPrice']},
            {$fil['carPrice1']},
            {$fil['carPrice2']},
            {$fil['carPrice3']},
            '{$fil['excolor']}',
            '{$fil['incolor']}',
            '{$fil['cc']}',
            '{$fil['fuel']}',
            '{$fil['sun_front']}',
            '{$fil['sun_back']}',
            '{$fil['blackbox']}',
            '{$fil['c_etc_items']}',
            {$fil['idnote']},
            now()
        )";

// echo $sql;

$result = mysqli_query($conn, $sql);

if ($result) {
    $id_n_car = mysqli_insert_id($conn);

    $sql2 = "
            update note 
            set 
                id_n_car = {$id_n_car} 
            where idnote={$fil['idnote']}
            ";
    // echo $sql2;
    $result2 = mysqli_query($conn, $sql2);

    if($result2) {
        echo json_encode($id_n_car);
    } else {
        echo json_encode('error_occuered');
    }
} else {
    echo json_encode('error_occuered');
}
?>