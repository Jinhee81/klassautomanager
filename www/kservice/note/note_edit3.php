<!-- css use bootstrap, form-group -->


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>상담노트</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
        shrink-to-fit=no">
    <!-- <meta property="og:image" content="https://www.instagram.com/"> -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:700|Nanum+Gothic" rel="stylesheet">

    <!-- 폰트어썸 css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- 달력 css -->
    <link rel="stylesheet" href="/inc/css/jquery-ui.min.css">

    <link rel="stylesheet" href="/inc/css/flexbox.css?<?= date('YmdHis') ?>">

    <!-- footer에 넣은거가 안좋아서 head로 옮김 21.5.12 -->
    <script src="/inc/js/jquery-3.3.1.min.js"></script>
    <script src="/inc/js/jquery-ui.min.js"></script>
    <script src="/inc/js/popper.min.js"></script>
    <script src="/inc/js/bootstrap-4.1.3.min.js"></script>
    <script src="/inc/js/datepicker-ko.js"></script>
    <script src="/inc/js/date.format.min.js"></script>
    <script src="/inc/js/jquery.number.min.js"></script>
    <script src="/inc/js/etc/form.js"></script>
</head>

<body>
    <?php include "/view/nav.php"; ?>

    <?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";

    $id = $_GET['id'];

    print_r($_SESSION);
    echo "<br>";
    print_r($id);
    ?>

    <section class="section1 container">
        <div class="jumbotron pt-3 pb-2">
            <h3 class=""> >> 상담 진행 화면이에요 :)</h3>
            <p class="lead">열심히 다가가면 언젠가 이루어진답니다. 희망을 잃지 마세요.^^ </p>
            <!-- <hr class="my-4"> -->
        </div>
    </section>

    <section class="section2 container">
        <div class="border border-info rounded mb-4 p-2">
            <div class="commandline">
                <button class="btn btn-danger mr-1 btn-sm" id=btnSave>저장</button>
                <a href='note.php'><button type='button' class='btn btn-secondary btn-sm'><i
                            class="fas fa-angle-double-right"></i> 상담목록</button></a>
            </div>

            <div class="row row1">
                <div class="item item1">
                    <label for="" class="left">부서명</label>
                    <input type="text" class="form-control right" name="department">
                </div>
                <div class="item item2">
                    <label for="" class="left">담당자명</label>
                    <input type="text" class="form-control right" name="salesman">
                </div>
                <div class="item item3">
                    <label for="" class="left">상담일</label>
                    <input type="text" class="form-control right" name="firstDate">
                </div>
            </div>
            <div class="row row2">
                <div class="item item1">
                    <label for="" class="left">유입경로</label>
                    <select name="channel" class="form-control">
                        <option value="다나와">다나와</option>
                        <option value="클라스오토홈페이지">클라스오토홈페이지</option>
                        <option value="기타">기타</option>
                    </select>
                </div>
                <div class="item item2">
                    <label for="" class="left">다나와번호</label>
                    <input type="text" class="form-control right" name="salesman">
                </div>
            </div>
            <div class="row row3">
                <div class="item item1">
                    <label for="" class="left">고객명</label>
                    <input type="text" class="form-control right" name="customerName">
                </div>
                <div class="item item2">
                    <label for="" class="left">연락처</label>
                    <input type="text" class="form-control right" name="customerContact">
                </div>
                <div class="item item3">
                    <label for="" class="left">위치</label>
                    <input type="text" class="form-control right" name="c_location">
                </div>
            </div>
            <div class="row row4">
                <div class="item item1">
                    <label for="" class="left">렌트/리스</label>
                    <select name="rentlease" class="form-control">
                        <option value="렌트">렌트</option>
                        <option value="리스">리스</option>
                        <option value="렌트+리스">렌트+리스</option>
                    </select>
                </div>
                <div class="item item2">
                    <label for="" class="left">브랜드</label>
                    <input type="text" class="form-control right" name="brand">
                </div>
                <div class="item item3">
                    <label for="" class="left">모델명</label>
                    <input type="text" class="form-control right" name="model">
                </div>
            </div>
            <div class="row row5">
                <div class="comment">
                    <label for="">고객요청사항</label>
                    <textarea name="customerContent" id="" cols="30" rows="6" class="form-control"></textarea>
                </div>
                <div class="comment">
                    <label for="">상담내용</label>
                    <textarea name="salesContent" id="" cols="30" rows="6" class="form-control"></textarea>
                </div>
            </div>

            <!-- <div class="commandline2 mt-2" name=commandline2>
                <button class="btn btn-primary btn-sm">등록하기</button>
                <div class="p-3 mb-2 text-dark border border-info rounded" id="below">
                    <button class="btn btn-sm btn-outline-info">고객정보</button>
                    <button class="btn btn-sm btn-outline-info">계약정보</button>
                    <button class="btn btn-sm btn-outline-info">보험정보</button>
                    <button class="btn btn-sm btn-outline-info">차량정보</button>
                    <button class="btn btn-sm btn-outline-info">차량공통</button>
                    <button class="btn btn-sm btn-outline-info">견적정보</button>
                    <button class="btn btn-sm btn-outline-info">리스정보</button>
                </div>
            </div> -->
        </div>
    </section>
    <!-- 하단 탭 -->
    <section class="section3 container">
        <!-- 진행사항탭 -->
        <!-- <div class="p-3 mb-2 text-dark border border-info rounded"> -->
        <!-- </div> -->
        <!-- 공통사항탭 -->
        <section class="section1">
            <div class="tab">
                <div class="tab1">
                    <div class="smalltab tab2">
                        <label for="" class="">고객정보</label>
                        <div class="tab2 command">
                            <small class=""><u>저장</u></small>
                            <small class=""><u>삭제</u></small>
                        </div>
                    </div>
                    <div class="p-3 mb-2 text-dark border border-info rounded">
                        <?php include "below/note_customer.php"; ?>
                    </div>
                </div>
                <div class="tab1">
                    <div class="smalltab tab2">
                        <label for="" class="">계약정보</label>
                        <div class="tab2 command">
                            <small class=""><u>저장</u></small>
                            <small class=""><u>삭제</u></small>
                        </div>
                    </div>
                    <div class="p-3 mb-2 text-dark border border-info rounded">
                        <?php include "below/note_contract.php"; ?>
                    </div>
                </div>
                <div class="tab1">
                    <div class="smalltab tab2">
                        <label for="" class="">보험정보</label>
                        <div class="tab2 command">
                            <small class=""><u>저장</u></small>
                            <small class=""><u>삭제</u></small>
                        </div>
                    </div>
                    <div class="p-3 mb-2 text-dark border border-info rounded">
                        <?php include "below/note_insurance.php"; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section2">
            <!-- 차량,견적사항탭 -->
            <div class="tab1">
                <div class="smalltab tab2">
                    <label for="" class="">차량정보</label>
                    <div class="tab2 command">
                        <small class=""><u>저장</u></small>
                        <small class=""><u>삭제</u></small>
                    </div>
                </div>
                <div class="p-3 mb-2 text-dark border border-info rounded">
                    <?php include "below/note_car1.php"; ?>
                </div>
            </div>
        </section>

        <!-- <div class="row">
        <table class="">
            <tr class="">
                <td class="">

                </td>
                <td class=""></td>
                <td class=""></td>
            </tr>
        </table>
    </div> -->
    </section>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script>
    function note(a) {
        let note = $.ajax({
            url: "../ajax/ajax_note_load.php",
            method: "post",
            data: {
                'id': a
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);

                $('input[name = department]').val(data.department);
                $('input[name = salesman]').val(data.name);
                $('input[name = firstDate]').val(data.firstDate);
                $(`select[name=channel] option[value=${data.channel}]`).attr('selected', true);
                $('input[name = danawaNumber]').val(data.danawaNumber);
                $('input[name = customerName]').val(data.c_name);
                $('input[name = customerContact]').val(data.c_contact);
                $('input[name = c_location]').val(data.c_location);
                $('input[name = brand]').val(data.brandname);
                $('input[name = model]').val(data.modelname);
                $('textarea[name = customerContent]').val(data.c_content);
                $('textarea[name = salesContent]').val(data.sales_content);

            }
        })
    }

    let id = <?= $id ?>;
    note(id);

    $('input').attr('autocomplete', "off");
    </script>
</body>

</html>