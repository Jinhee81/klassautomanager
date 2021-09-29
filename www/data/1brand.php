<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    $sql = "select brandcode, name, part from brand";
    $result = mysqli_query($conn, $sql);

    $allRows = array();
    while($row = mysqli_fetch_array($result)){
        $allRows[] = $row;
    }
?>

<style>
td.primary {
    background-color: #CEF6F5;
}
</style>

<header class="container jumbotron pt-3 pb-3 mb-2">
    <div class="row">
        <h3 class="">브랜드코드입니다.</h3>
    </div>
    <p class="lead">
        <!-- (1) 정확한 표현은 이해관계자리스트라고 보아도 무방합니다. 세입자(고객) 뿐만 아니라, 문의하는 사람 및 자주 거래하는 거래처도 저장할 수 있어요.<br> -->
        <!-- (1) 임대계약이 발생하면 숫자가 표시됩니다. (2)'기타' 분류는 임대계약 외의 일회성매출에 대한 고객을 분류할 수 있습니다.<br>
    (3) 등록해야할 세입자(임차인)가 많으면 고객센터로 연락주세요. 대신 등록작업 해드립니다. (1년계약시 유효 ^_^) -->
    </p>
</header>

<section class="container" style="width:400px">
    <table class="table table-sm table-hover text-center">
        <tr class="table-primary">
            <td class="">코드</td>
            <td class="">브랜드명</td>
            <td class="">구분</td>
        </tr>

        <?php
        for($i=0; $i < count($allRows); $i++) { ?>
        <tr class="">
            <td class="primary"><?=$allRows[$i]['brandcode']?></td>
            <td class=""><?=$allRows[$i]['name']?></td>
            <td class=""><?=$allRows[$i]['part']?></td>
        </tr>
        <?php }
        ?>
    </table>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/view/footer.php";
?>

</body>

</html>