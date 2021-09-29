<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>상담목록</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/inc.php";
    ?>
</head>

<body>
    <?php
    session_start();

    // print_r($_SESSION);
    // echo "<br>";

    if (!isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav__condition.php";

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
            <a class="btn btn-primary btn-sm" href="note_add0.php" role="button">상담접수</a>
        </div>
    </section>

    <section class="container">
        <table class="table table-sm table-hover text-center">
            <thead class="">
                <tr class="table-primary">
                    <td class="">순번</td>
                    <td class="">접수일</td>
                    <td class="">영업상태</td>
                    <td class="">계약상태</td>
                    <td class="">유입경로</td>
                    <td class="">고객명</td>
                    <td class="">연락처</td>
                    <td class="">위치</td>
                    <td class="">렌트/리스</td>
                    <td class="">고객요청사항</td>
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
                // console.log(data);
                console.log(data.length);
                let returns = '';


                if (data.length === 0) {
                    returns = `<tr><td colspan=11>아직 접수된 상담이 없네요. 서둘러 등록해주세요~^^</td></tr>`;
                } else {
                    let i = 1;
                    $.each(data, function(key, value) {
                        returns += `<tr>
                            <td>${i}</td>
                            <td><a href=note_edit4.php?page=carInfo&id=${value.idnote}&id_cn=${value.id_cn}>${value.firstDate}</a></td>
                            <td>${value.s_status}</td>
                            <td>${value.c_status}</td>
                            <td>${value.channel}</td>
                            <td>${value.c_name}</td>
                            <td>${value.c_contact}</td>
                            <td>${value.c_location}</td>
                            <td>${value.rentlease}</td>
                            <td class=>
                            <p class=abc data-toggle=tooltip placement=top title='${value.c_content}'>${value.c_content.substr(0,10)}</p>
                            </td>
                            <td>${value.name}</td>
                            <td>${value.department}</td>
                            </tr>`;
                        i++;
                    })
                }
                $('#tbodyArea').html(returns);

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