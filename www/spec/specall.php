<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>전체추출</title>

    <?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header2.php"; //타이틀제외한 header file
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    $sql = "select code, name
            from danawa
            where usepart = 'Y'
            ";
    $result = mysqli_query($conn, $sql);

    $allrows = array();
    while ($row = mysqli_fetch_array($result)){
        $allrows[] = $row;
    }

?>

    <style>
    td.t1 {
        width: 20%;
    }

    th.t2 {
        width: 6%;
    }

    .loader {
        display: none;
    }
    </style>
    <section name='header' class="container text-center mt-5">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <table class="table table-bordered table-sm">
                    <tr>
                        <!-- <td scope="col">브랜드</td> -->
                        <td class="t1">모델명</td>
                        <td class="t1">렌트/리스</td>
                        <td class="t1">개월수</td>
                        <td class="t1">보증금</td>
                        <td class="t1"></td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="model">
                                <option value="mall" class="">브랜드명 모델명(코드, 렌트금융, 리스금융)</option>
                                <option value="74759, 신한카드, 신한카드" class="">현대 그랜져(74759, 신한카드, 신한카드)</option>
                                <option value="75330, 하나캐피탈, 하나캐피탈" class="">현대 싼타페(75330, 하나캐피탈, 하나캐피탈)</option>
                                <option value="71091, 우리카드, 우리카드" class="">현대 투싼(71091, 우리카드, 우리카드)</option>
                                <option value="70587, 하나캐피탈, DGB캐피탈" class="">현대 쏘나타(70587, 하나캐피탈, DGB캐피탈)</option>
                                <option value="69314, 신한카드, 메리츠캐피탈" class="">현대 팰리세이드(69314, 신한카드, 메리츠캐피탈)</option>
                                <option value="71481, 우리카드, 우리카드" class="">기아 K5(71481, 우리카드, 우리카드)</option>
                                <option value="73086, DGB캐피탈, 하나캐피탈" class="">기아 K8(73086, DGB캐피탈, 하나캐피탈)</option>
                                <option value="69052, 신한카드, 신한카드" class="">기아 K9(69052, 신한카드, 신한카드)</option>
                                <option value="69063, DGB캐피탈, DGB캐피탈" class="">기아 모하비(69063, DGB캐피탈, DGB캐피탈)</option>
                                <option value="71136, 신한카드, 우리카드" class="">기아 스포티지(71136, 신한카드, 우리카드)</option>
                                <option value="75338, 하나캐피탈, 하나캐피탈" class="">기아 쏘렌토(75338, 하나캐피탈, 하나캐피탈)</option>
                                <option value="70807, 신한카드, 신한카드" class="">기아 카니발(70807, 신한카드, 신한카드)</option>
                                <option value="71527, 신한카드, 신한카드" class="">제네시스 G70(71527, 신한카드, 신한카드)</option>
                                <option value="69506, 신한카드, 신한카드" class="">제네시스 G80(69506, 신한카드, 신한카드)</option>
                                <option value="73461, DGB캐피탈, DGB캐피탈" class="">제네시스 G90(73461, DGB캐피탈, DGB캐피탈)</option>
                                <option value="71838, 하나캐피탈, 하나캐피탈" class="">제네시스 GV70(71838, 하나캐피탈, 하나캐피탈)</option>
                                <option value="70463, 하나캐피탈, 하나캐피탈" class="">제네시스 GV80(70463, 하나캐피탈, 하나캐피탈)</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="rentlease">
                                <option value="rlall">전체</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="period">
                                <option value="pall">전체</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="deposit">
                                <option value="dall">전체</option>
                            </select>
                        </td>
                        <td class='pt-2 text-center'>
                            <button type='button' id='extract' class='btn btn-primary btn-sm'>전차종 조회</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <section class="text-center">
        <p class="purple font-italic">
            . 사용여부 'N'인 것은 출력되지 않도록 업데이트 했습니다.<br>
            . 라인업코드, 트림코드가 공란(null, blank)이면 차종코드를 생성해야 하거나 라인업명, 트림명이 일치하지 않아서 그런거니 <a href='/data/3lineup.php'
                target='_blank'>라인업코드</a>, <a href='/data/4trim.php' target='_blank'>트림코드</a>를
            확인하세요. <br>
            - '21.7.27 by Jinhee <br>
            . 잔가조정 완료 (36개월 64%, 48개월 56%, 60개월 49%) - '21.8.13 <br>
        </p>
    </section>
    <div class="loader container">
        <img src="/inc/img/abc.gif" alt="" class="" style="width:50px;height:50px;">
    </div>

    <section name='header' class="row justify-content-center mt-5" id="content">
        <!-- <p class="text-end">단위:원, 부가세포함 (렌트 R,/리스 L, 개월수 36/48/60개월, 보증금 1:0%,2:선납금30%,3:보증금30%)</p> -->
        <div class="col-11">
            <!-- <div class="">
        </div> -->
            <table class="table table-hover table-bordered table-sm text-center">
                <thead class="">
                    <tr class="table-secondary">
                        <!-- <th class="t2" name="checkbox"></th> -->
                        <!-- <th class="t2" name="order">#</th> -->
                        <th class="" name="brand">브랜드명</th>
                        <th class="" name="model">모델명</th>
                        <th class="" name="lineup">라인업명</th>
                        <th class="" name="trim">트림명</th>
                        <th class="" name="bcode">브랜드코드</th>
                        <th class="" name="mcode">모델코드</th>
                        <th class="" name="lcode">라인업코드</th>
                        <th class="" name="tcode">트림코드</th>
                        <th class="" name="rentlease">상품구분</th>
                        <th class="" name="month">할부기간</th>
                        <th class="" name="deposit">가격타입</th>
                        <th class="" name="mf">월납부금</th>
                        <th class="" name="rf">잔존가치</th>
                        <th class="" name="gf">취득원가</th>
                        <th class="" name="j1">해지수수료</th>
                        <th class="" name="j2">약정거리</th>
                        <th class="" name="j3">혜택유무</th>
                        <th class="" name="j4">부가설명</th>
                        <!--18-->
                        <th class="" name="price">소비자가</th>
                        <th class="" name="fee">최저가</th>
                        <th class="" name="loadOrder">순번</th>
                        <!--전체순번-->
                        <th class="" name="loadOrder">#uo</th>
                        <!--url순번-->
                        <th class="" name="loadOrder">#uoo</th>
                        <!--url내의 순번-->
                        <th class="primary" name="lineupCount">lc</th>
                        <!--라인업개수-->
                        <th class="" name="lineupOrder">#l</th>
                        <!--라인업순번-->
                        <th class="" name="trimCount">tc</th>
                        <!--트림개수-->
                        <th class="" name="trimOrder">#t</th>
                        <!--트림순번-->
                        <!--27-->
                        <th class="" name="lineup_use">lu</th>
                        <th class="" name="trim_use">tu</th>
                        <!--29-->
                    </tr>
                </thead>
                <tbody id="allvals">
                    <tr class="">
                        <td class="" colspan="29">조회하기를 누르세요.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <hr>



    <script class="">
    $(document).ready(function() {
        $('.dateType').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            currentText: '오늘',
            closeText: '닫기'
        })

        $('.numberComma').number(true);

        // $('.dropdown-toggle').dropdown('toggle');
    })

    $(document).on('click', '.numberComma', function() {
        $(this).select();
    })

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    </script>
    <script src="extractall.js?<?=date('YmdHis')?>"></script>
    </body>

</html>