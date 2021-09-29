<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    // var_dump($_POST); echo 1;echo "<br>";

    $a = json_decode($_POST['brand']);
    $b = json_decode($_POST['model']);

    // print_r($a);echo "<br>";
    // print_r($b);echo "<br>";

    // $sql = '';

    if($a == "brandall" && $b == "modelall"){
        $sql = "select 
                    brand.name, lineup.id, lineup.modelcode, modelname, lineupname, lineupcode, usepart,
                    date_format(lineup.created, '%Y-%c-%e %H:%i:%s') as created, date_format(lineup.updated, '%Y-%c-%e %H:%i:%s') as updated
                from lineup
                left join model on lineup.modelcode = model.modelcode 
                left join brand on model.brandcode = brand.brandcode
                ";
    } else {
        if($b==='modelall'){
            $sql = "select 
                brand.name, lineup.id,  lineup.modelcode,modelname, lineupname, lineupcode, usepart,
                date_format(lineup.created, '%Y-%c-%e %H:%i:%s') as created, date_format(lineup.updated, '%Y-%c-%e %H:%i:%s') as updated
            from lineup
            left join model on lineup.modelcode = model.modelcode 
            left join brand on model.brandcode = brand.brandcode
            where brand.brandcode = '{$a}'
            ";
        } else {
            $sql = "select 
                brand.name, lineup.id,  lineup.modelcode,modelname, lineupname, lineupcode, usepart,
                date_format(lineup.created, '%Y-%c-%e %H:%i:%s') as created, date_format(lineup.updated, '%Y-%c-%e %H:%i:%s') as updated
            from lineup
            left join model on lineup.modelcode = model.modelcode 
            left join brand on model.brandcode = brand.brandcode
            where brand.brandcode = '{$a}' and
                  model.modelcode = '{$b}'
            ";
        }
    }
    // echo $sql;
            
    $result = mysqli_query($conn, $sql);

    $allRows = array();
    while($row = mysqli_fetch_array($result)){
        $allRows[] = $row;
    }

    echo json_encode($allRows);
    
?>