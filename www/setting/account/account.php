<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>계정목록</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/inc.php";
    ?>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav2.php";


    $sql = "select * from user";
    $result = mysqli_query($conn, $sql);

    $allRows = array();
    while ($row = mysqli_fetch_array($result)) {
        $allRows[] = $row;
    }
    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class="">계정목록 화면이에요.</h3>
            <p class="lead">
                <!-- (1)'도레미고시원' 또는 '두드림센터' 등 평상시 관리하는 명칭을 적어주세요.<br>
            (2) 관리호수를 등록해야 리스맨 사용이 가능합니다. (관리호수란? '101호', '102호' 등의 명칭)<br> -->
                <!-- (2) 직원이 있는 경우 계정추가하여 직원을 등록하세요.  -->
            </p>
            <hr class="my-4">
            <!-- <p>리스맨 회원가입후 30일동안 무료이용 가능합니다. 30일 이후 요금은 <a href="../../main/payment.php" class="badge badge-warning">요금안내</a>
            페이지를 참조하세요.<br>
            <label class="red">반드시 물건등록을 해야 리스맨 사용 및 화면보기가 가능해요 ^__^</label>
        </p> -->
            <a class="btn btn-primary btn-sm" href="account_add.php" role="button">계정등록</a>
        </div>
    </section>

    <section class="container">
        <table class="table table-sm table-hover text-center">
            <tr class="table-primary">
                <td class="">순번</td>
                <td class="">부서명</td>
                <td class="">직책</td>
                <td class="">시스템권한</td>
                <td class="">성명</td>
                <td class="">연락처</td>
                <td class="">이메일</td>
                <td class="">입사일</td>
                <td class="">퇴사일</td>
                <td class="">특이사항</td>
                <td class="">아이디</td>
            </tr>

            <?php
            for ($i = 0; $i < count($allRows); $i++) { ?>
                <tr class="">
                    <td class="primary"><?= $i + 1 ?></td>
                    <td class=""><?= $allRows[$i]['department'] ?></td>
                    <td class=""><?= $allRows[$i]['position'] ?></td>
                    <td class=""><?= $allRows[$i]['system_position'] ?></td>
                    <td class="">
                        <a href="account_edit.php?usercode=<?= $allRows[$i]['usercode'] ?>" class=""><?= $allRows[$i]['name'] ?></a>
                    </td>
                    <td class=""><?= $allRows[$i]['phone'] ?></td>
                    <td class=""><?= $allRows[$i]['email'] ?></td>
                    <td class=""><?= $allRows[$i]['start_work'] ?></td>
                    <td class=""><?= $allRows[$i]['end_work'] ?></td>
                    <td class=""><?= $allRows[$i]['etc'] ?></td>
                    <td class="password"><?= $allRows[$i]['id'] ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>
    <!-- <script src="/inc/js/jquery-3.3.1.min.js"></script>
<script src="/inc/js/bootstrap.min.js"></script> -->


    <script class="">

    </script>
</body>

</html>