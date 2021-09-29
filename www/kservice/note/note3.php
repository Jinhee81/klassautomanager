<!DOCTYPE html>
<!-- flexbox 적용g하려다가 안함. 너무 복잡해서 ㅠㅠ -->
<html lang="en" dir="ltr">

<head>
    <title>상담노트</title>
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

    // print_r($_SESSION);

    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class="">상담목록이에요.</h3>
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
            <a class="btn btn-primary btn-sm" href="note_add.php" role="button">상담등록</a>
        </div>
    </section>

    <section class="container">
        <div class="title">
            <ul class="table_title">
                <li class="table_item table_item_a">순번</li>
                <li class="table_item table_item_b">상담일</li>
                <li class="table_item table_item_b">유입경로</li>
                <li class="table_item table_item_b">고객명</li>
                <li class="table_item table_item_c">연락처</li>
                <li class="table_item table_item_c">위치</li>
                <li class="table_item table_item_b">렌트/리스</li>
                <li class="table_item table_item_c">고객요청사항</li>
                <li class="table_item table_item_c">상담내용</li>
                <li class="table_item table_item_b">담당자명</li>
                <li class="table_item table_item_b">부서명</li>
            </ul>
        </div>
        <div id="table__rows">
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
    let department = '<?= $_SESSION['department'] ?>';
    console.log(department);

    function outsideTable() {
        let outsideTable = $.ajax({
            url: '../ajax/ajax_notelist_load.php',
            method: 'post',
            data: {
                'department': department
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                let returns = '';
                let i = 1;

                $.each(data, function(key, value) {
                    returns += `<ul class=rows>
                <li class="rowsli rowsli_a">${i}</li>
                <li class="rowsli rowsli_b"><a href=note_edit4.php?page=carInfo&id=${value.idnote}>${value.firstDate}</a></li>
                <li class="rowsli rowsli_b">${value.channel}</li>
                <li class="rowsli rowsli_b">${value.c_name}</li>
                <li class="rowsli rowsli_c">${value.c_contact}</li>
                <li class="rowsli rowsli_c">${value.c_location}</li>
                <li class="rowsli rowsli_b">${value.rentlease}</li>
                <li class="rowsli rowsli_c">
                <p class="abc mb-0" data-toggle=tooltip placement=top title='${value.c_content}'>${value.c_content.substr(0,10)}</p>
                </li>
                <li class="rowsli rowsli_c">${value.sales_content}</li>
                <li class="rowsli rowsli_b">${value.name}</li>
                <li class="rowsli rowsli_b">${value.department}</li>
                </ul>`;
                    i++;
                })

                $('#table__rows').html(returns);
            }
        })

        return outsideTable;
    }

    outsideTable();

    $(document).ready(function() {
        $('.abc').mouseover(function() {
            console.log('solmi');
        })
        // $('.abc').tooltip('show');
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    })
    </script>
</body>

</html>