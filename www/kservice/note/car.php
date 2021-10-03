<?php
//차종코드 라인업, 트림화면에서 필요한 파일
// include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

$sql = "select brandcode, name from brand";
$result = mysqli_query($conn, $sql);

$brandArray = array();
while ($row = mysqli_fetch_array($result)) {
    $brandArray[$row['brandcode']] = $row['name'];
}

// print_r($brandArray);echo "<br>";

foreach ($brandArray as $key => $value) {
    $sql2 = "select modelcode, modelname
    from model
    where brandcode = '{$key}'
    ";
    $result2 = mysqli_query($conn, $sql2);

    $modelArray[$key] = array();
    while ($row2 = mysqli_fetch_array($result2)) {

        $sql3 = "select lineupcode, lineupname
                 from lineup
                 where modelcode = '{$row2['modelcode']}'
                ";
        // echo $sql3."<br>";
        $modelArray[$key][$row2['modelcode']] = $row2['modelname'];
        $result3 = mysqli_query($conn, $sql3);

        $lineupArray[$row2['modelcode']] = array();
        while ($row3 = mysqli_fetch_array($result3)) {
            $lineupArray[$row2['modelcode']][$row3['lineupcode']] = $row3['lineupname'];

            $sql4 = "select trimcode, trimname, price
                     from trim
                     where lineupcode='{$row3['lineupcode']}'
                    ";
            $result4 = mysqli_query($conn, $sql4);

            $trimArray[$row3['lineupcode']] = array();

            while ($row4 = mysqli_fetch_array($result4)) {
                array_push($trimArray[$row3['lineupcode']], $row4);
            }
        }
    }
}

// print_r($modelArray);echo "<br>";
// print_r($lineupArray);echo "<br>";
// print_r($trimArray);echo "<br>";
