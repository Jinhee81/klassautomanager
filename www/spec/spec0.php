<?php
include $_SERVER['DOCUMENT_ROOT'] . "/view/inc.php";
?>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav2.php";

    $sql = "select code, name
            from danawa
            where usepart = 'Y'
            ";
    $result = mysqli_query($conn, $sql);

    $allrows = array();
    while ($row = mysqli_fetch_array($result)) {
        $allrows[] = $row;
    }

    $rentFinance = array(
        array("BNK캐피탈", "CPbn001"),
        array("DGB캐피탈", "CPdg001"),
        array("JB캐피탈", "CPjb001"),
        array("KB캐피탈", "CPkb001"),
        array("KDB캐피탈", "CPkd001"),
        array("농협캐피탈", "CPnh001"),
        array("롯데캐피탈", "CPlt001"),
        array("메리츠캐피탈", "CPmr001"),
        array("미래에셋캐피탈", "CPmi001"),
        array("우리금융캐피탈", "CPaj001"),
        array("오릭스캐피탈", "CPor001"),
        array("하나캐피탈", "CPhn001"),
        array("현대캐피탈", "CPhy001"),
        array("엠캐피탈", "CPhs001"),
        array("우리카드", "CDwr001"),
        array("신한카드", "CDsh001"),
        array("삼성카드", "CDss001")
    );

    //leaseFinance 변수도 만들어야 하는데 일단 만들지 않음...

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
            <div class="col">
                <table class="table table-bordered table-sm">
                    <tr>
                        <!-- <td scope="col">브랜드</td> -->
                        <td class="">모델명</td>
                        <td class="">렌트/리스</td>
                        <td class="">개월수</td>
                        <td class="">보증금</td>
                        <td class="">렌트금융</td>
                        <td class="">리스금융</td>
                        <td class="" width="10%">결과값</td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="model">
                                <?php
                                for ($i = 0; $i < count($allrows); $i++) {
                                    echo "<option value=" . $allrows[$i]['code'] . ">" . $allrows[$i]['name'] . " (" . $allrows[$i]['code'] . ")" . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="rentlease">
                                <option value="rlall">전체</option>
                                <option value="R" selected>렌트</option>
                                <option value="L">리스</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="period">
                                <option value="pall">전체</option>
                                <option value="36" selected>36개월</option>
                                <option value="48">48개월</option>
                                <option value="60">60개월</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="deposit">
                                <option value="dall">전체</option>
                                <option value="1" selected>0%</option>
                                <option value="2">선납금30%</option>
                                <option value="3">보증금30%</option>
                            </select>
                        </td>
                        <td class="">
                            <select name="rentFinance" id="rentFinance" class="form-control">
                                <?php
                                for ($i = 0; $i < count($rentFinance); $i++) {
                                    echo "<option value=" . $rentFinance[$i][1] . ">" . $rentFinance[$i][0] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="">
                            <select name="leaseFinance" id="leaseFinance" class="form-control">
                                <?php
                                for ($i = 0; $i < count($rentFinance); $i++) {
                                    echo "<option value=" . $rentFinance[$i][1] . ">" . $rentFinance[$i][0] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="">
                            <input type="number" class="form-control text-right selected" value="0" name="results" id="results">
                            <!-- 최저가대비 결과값 -->
                        </td>
                        <td class='pt-2 text-center'>
                            <button type='button' id='extract' class='btn btn-primary btn-sm'>조회</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <section class="text-center">
        <p class="purple font-italic">
            . 잔가조정 완료 (36개월 64%, 48개월 56%, 60개월 49%) - '21.8.13 <br>
            . 결과값은 최저가대비 0원 또는 증가값을 넣기 (아직 감소금액은 안됨) - '21.8.16 <br>
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
                        <th class="" name="">수정일</th>
                        <th class="" name="">금융사</th>
                        <th class="" name="">금융사코드</th>
                        <th class="" name="">소비자가</th>
                        <th class="" name="">최저가</th>
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
    <!-- <footer class="container text-right">
    (주)장기렌터카연합, 1522-7107<br>
    <p class=""><a href="https://www.klassauto.com" class="" target='_blank'>클라스오토 바로가기</a> | <a
            href="http://www.rentcarmanager.com/?skiping=skip" class="" target='_blank'>장기렌터카연합 바로가기</a> | <a
            href="https://klassauto.daouoffice.com/login" class="" target='_blank'>그룹웨어 바로가기</a></p>
</footer> -->


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

        $(document).on('click', '.selected', function() {
            $(this).select();
        })

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <script src="extract0.js?<?= date('YmdHis') ?>"></script>
</body>

</html>