<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>고객목록</title>
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
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav__condition.php";

    // print_r($_SESSION);

    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class="">고객목록이에요.</h3>
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
            <!-- <a class="btn btn-primary btn-sm" href="customer_add.php" role="button">고객등록</a> -->
        </div>
    </section>

    <section class="container">
        <table class="table table-sm table-hover text-center">
            <thead class="">
                <tr class="table-primary">
                    <td class="">순번</td>
                    <td class="">등록일</td>
                    <td class="">구분</td>
                    <td class="">성명</td>
                    <td class="">연락처</td>
                    <td class="">담당자명</td>
                    <td class="">부서명</td>
                </tr>
            </thead>
            <tbody class="" id=tbodyArea>
            </tbody>
        </table>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
    let usercode = '<?= $_SESSION['usercode'] ?>';
    console.log(usercode);

    function outsideTable() {
        let outsideTable = $.ajax({
            url: '../ajax/customer/clist_load.php',
            method: 'post',
            data: {
                'usercode': usercode
            },
            success: function(data) {
                data = JSON.parse(data);

                let count = data.length;

                if (count === 0) {
                    let returns = `<tr><td colspan=8>조회값이 없어요. 상담에서 등록해주세요^^</td></tr>`;
                    $('#tbodyArea').html(returns);
                } else {
                    let returns = '';
                    let i = 1;

                    $.each(data, function(key, value) {
                        returns += `<tr>
                    <td>${i}</td>
                    <td><a href=customer_edit.php?&id_cn=${value.id_cn}>${value.firstDate}</a></td>
                    <td>${value.cn_div}</td>
                    <td>${value.cn_name}</td>
                    <td>${value.cn_contact}</td>
                    <td>${value.name}</td>
                    <td>${value.department}</td>
                    </tr>`;
                        i++;
                    })

                    $('#tbodyArea').html(returns);
                }
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