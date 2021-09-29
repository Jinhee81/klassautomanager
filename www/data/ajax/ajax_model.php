<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    // var_dump($_POST['brand']); echo 1;

    $a = json_decode($_POST['brand']);

    // print_r($a);

    $sql = '';

    if($a == "all"){
        $sql = "select 
                    model.id, modelcode, modelname, danawacode, model.brandcode, brand.name, model.etc,
                    date_format(model.created, '%Y-%c-%e %H:%i:%s') as created, date_format(model.updated, '%Y-%c-%e %H:%i:%s') as updated
                from model
                left join brand
                    on model.brandcode = brand.brandcode
                ";
    } else {
        $sql = "
        select 
            model.id, modelcode, modelname, danawacode, model.brandcode, brand.name, model.etc,
            date_format(model.created, '%Y-%c-%e %H:%i:%s') as created, date_format(model.updated, '%Y-%c-%e %H:%i:%s') as updated
        from model
        left join brand on model.brandcode = brand.brandcode
        where brand.brandcode = '{$a}'
        ";
    }
    // echo $sql;
            
    $result = mysqli_query($conn, $sql);

    $allRows = array();
    while($row = mysqli_fetch_array($result)){
        $allRows[] = $row;
    }

    echo json_encode($allRows);
    
?>