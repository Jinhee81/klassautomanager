<!-- css use flexbox -->
<!DOCTYPE html>
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
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav__condition.php";

    $sql = "select brandcode, name from brand";
    $result = mysqli_query($conn, $sql);

    $brandArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $brandArray[$row['brandcode']] = $row['name'];
    }

    // print_r($brandArray);echo "<br>";

    foreach ($brandArray as $key => $value) {
        $sql2 = "select modelcode, modelname from model where brandcode = '{$key}'";
        $result2 = mysqli_query($conn, $sql2);

        $modelArray[$key] = array();
        while ($row2 = mysqli_fetch_array($result2)) {
            $modelArray[$key][$row2['modelcode']] = $row2['modelname'];
        }
    }

    // print_r($modelArray);echo "<br>";


    // print_r($_SESSION);

    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class=""> >> 상담 등록 화면이에요 :)</h3>
            <p class="lead">상담등록을 축하합니다! 꼭 성사되기를 응원합니다.^^ </p>
            <hr class="my-4">
            <small class="text-right">클라스오토는 계약율, 고객인지도, 서비스만족도가 높은 업체로 상단에 노출되어 있습니다. <br class="">
                목표의식, 두려움, 타성을 이겨내는 순간, 일에 대한 열정을 불어 넣을 수 있다. - <span class=font-italic>로버트 J 크리겔.</span></small>
        </div>
    </section>
    <section class="section2 container">
        <div class="border border-info rounded mb-4 p-2">


            <form method="post" action="../form/p_note_add.php" class="">
                <div class="commandline">
                    <input type=submit class="btn btn-danger mr-1 btn-sm" id=btnSave value="등록하기">
                    <a href='note2.php'>
                        <button type='button' class='btn btn-secondary btn-sm'>
                            <i class="fas fa-angle-double-right"></i> 상담목록</button>
                    </a>
                </div>
                <div class="row row1">
                    <div class="item item1">
                        <label for="" class="left">부서명</label>
                        <select name="department" class="form-control center" disabled>
                            <option value="관리팀" class="" <?php if ($_SESSION['department'] === '관리팀') {
                                                                echo "selected";
                                                            } ?>>
                                관리팀
                            </option>
                            <option value="영업1팀" class="" <?php if ($_SESSION['department'] === '영업1팀') {
                                                                echo "selected";
                                                            } ?>>
                                영업1팀
                            </option>
                            <option value="영업2팀" class="" <?php if ($_SESSION['department'] === '영업2팀') {
                                                                echo "selected";
                                                            } ?>>
                                영업2팀
                            </option>
                            <option value="영업3팀" class="" <?php if ($_SESSION['department'] === '영업3팀') {
                                                                echo "selected";
                                                            } ?>>
                                영업3팀
                            </option>
                            <option value="영업4팀" class="" <?php if ($_SESSION['department'] === '영업4팀') {
                                                                echo "selected";
                                                            } ?>>
                                영업4팀
                            </option>
                        </select>
                    </div>
                    <div class="item item2">
                        <label for="" class="left">담당자명</label>
                        <input type="text" class="form-control right" name="salesman" value=<?= $_SESSION['name'] ?> disabled>
                        <input type="hidden" name="usercode" value=<?= $_SESSION['usercode'] ?>>
                    </div>
                    <div class="item item3">
                        <label for="" class="left">등록일</label>
                        <input type="text" class="form-control right dateType" name="firstDate">
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
                        <input type="text" class="form-control right" name="danawaNumber">
                    </div>
                </div>
                <div class="row row3">
                    <div class="item item1">
                        <label for="" class="left">고객명</label>
                        <input type="text" class="form-control right" name="customerName" required>
                    </div>
                    <div class="item item2">
                        <label for="" class="left">연락처</label>
                        <input type="text" class="form-control right" name="customerContact" required>
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
                        <select type="text" class="form-control right" name="brand" id="brand">
                        </select>
                    </div>
                    <div class="item item3">
                        <label for="" class="left">모델명</label>
                        <select type="text" class="form-control right" name="model" id="model">
                        </select>
                    </div>
                </div>
                <div class="row row5">
                    <div class="comment">
                        <label for="">고객요청사항</label>
                        <textarea name="customerContent" cols="30" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="comment">
                        <label for="">상담내용</label>
                        <textarea name="salesContent" cols="30" rows="6" class="form-control"></textarea>
                    </div>
                </div>
            </form>



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

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
        let today = new Date().format('Y-n-j');
        $('input[name=firstDate]').val(today);
        // console.log(today);



        let brandArray = <?= json_encode($brandArray) ?>;
        let modelArray = <?= json_encode($modelArray) ?>;
        // console.log(trimArray);

        let brandIdx, brandOption;
        let modelIdx, modelOption;

        $('#brand').append('<option value=brandall>브랜드 전체</option>');
        $('#model').append('<option value=modelall>모델 전체</option>');

        for (let key in brandArray) {
            brandoption = `<option value=${key}>${brandArray[key]}</option>`;
            $('#brand').append(brandoption);
        }
        brandIdx = $('#brand').val();

        for (let key in modelArray[brandIdx]) {
            modeloption = `<option value=${key}>${modelArray[brandIdx][key]}</option>`;
            $('#model').append(modeloption);
        }
        modelIdx = $('#model').val();

        $('#brand').on('change', function() {
            let brandIdx = $('#brand').val();
            $('#model').empty();
            $('#model').append('<option value=modelall>모델 전체</option>');
            $('#lineup').empty();
            $('#lineup').append('<option value=lineupall>라인업 전체</option>');

            for (let key in modelArray[brandIdx]) {
                modeloption = `<option value=${key}>${modelArray[brandIdx][key]}</option>`;
                $('#model').append(modeloption);
            }
            modelIdx = $('#model').val();
        })



        $('input').attr('autocomplete', 'off');
        $('.dateType').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            currentText: '오늘',
            closeText: '닫기'
        })


        $('#btnSave').on('click', function() {
            let brand = $('#brand').val();
            let model = $('#model').val();
            let customerName = $('input[name=customerName]').val();
            let customerContact = $('input[name=customerContact]').val();
            if (customerName.length === 0) {
                alert('고객명을 입력하세요');
                return false;
            }
            if (customerContact.length === 0) {
                alert('연락처를 입력하세요');
                return false;
            }
            if (brand === 'brandall') {
                alert('브랜드를 선택하세요');
                return false;
            }
            if (model === 'modelall') {
                alert('모델명을 선택하세요');
                return false;
            }
            $('form').submit();
        })
    </script>

</body>

</html>