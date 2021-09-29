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

    $id = $_GET['id'];

    // print_r($_SESSION);
    // echo "<br>";
    // print_r($id);
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
                <button class="btn btn-outline-danger mr-1 btn-sm" id=btnDelete>삭제</button>
                <a href='note2.php'><button type='button' class='btn btn-secondary btn-sm'><i class="fas fa-angle-double-right"></i> 상담목록</button></a>
            </div>

            <div class="row row1">
                <div class="item item1">
                    <label for="" class="left">부서명</label>
                    <input type="text" class="form-control right" name="department" disabled>
                </div>
                <div class="item item2">
                    <label for="" class="left">담당자명</label>
                    <input type="text" class="form-control right" name="salesman" disabled>
                </div>
                <div class="item item3">
                    <label for="" class="left">접수일</label>
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
                    <label for="" class="left">다나와#</label>
                    <input type="text" class="form-control right" name="danawaNumber">
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
            <div class="row row6">
                <div class="item item1">
                    <label for="" class="left">영업상태</label>
                    <select name="s_status" class="form-control">
                        <option value="접수">접수</option>
                        <option value="상담">상담</option>
                        <option value="견적">견적</option>
                        <option value="심사">심사</option>
                        <option value="발주">발주</option>
                        <option value="펀딩">펀딩</option>
                        <option value="출고">출고</option>
                    </select>
                </div>
                <div class="item item2">
                    <label for="" class="left">계약상태</label>
                    <select name="c_status" class="form-control">
                        <option value="대기">대기</option>
                        <option value="성공">성공</option>
                        <option value="취소">취소</option>
                        <option value="나가리">나가리</option>
                        <option value="성공지속">성공지속</option>
                    </select>
                </div>
            </div>
            <div class="row row5">
                <div class="comment">
                    <label for="">&#127752;&nbsp;고객요청사항</label>
                    <textarea name="c_content" id="" cols="30" rows="6" class="form-control"></textarea>
                </div>
                <div class="comment">
                    <label for="" class="text-left pl-3">&#127752;&nbsp;상담이력</label>
                    <!-- <textarea name="s_content" id="" cols="30" rows="6" class="form-control"></textarea> -->
                    <?php include "below/note_consulting.php"; ?>
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

    <section class="section3 container">
        <section class="section31">
            <div class="tab1">
                <div class="smalltab tab11">
                    <label for="" class="">고객정보</label>
                    <div class="tab2 command">
                        <small class=""><u>저장</u></small>
                        <!-- <small class=""><u>삭제</u></small> -->
                    </div>
                </div>
                <div class="tab12 p-3 mb-2 text-dark border border-info rounded">
                    <table class="table table-sm table-borderless mb-0">
                        <?php include "below/note_customer.php"; ?>
                    </table>
                </div>
            </div>
            <div class="tab2">
                <div class="smalltab tab21">
                    <label for="" class="">차량정보</label>
                    <div class="tab2 command">
                        <small class=""><u>저장</u></small>
                        <!-- <small class=""><u>삭제</u></small> -->
                    </div>
                </div>
                <div class="tab22 p-3 mb-2 text-dark border border-info rounded">
                    <?php include "below/note_car1.php"; ?>
                </div>
            </div>

            <!-- <div class="tab4">
                <section id="tab4lease">
                    <div class="smalltab tab2">
                        <label for="" class="">리스정보</label>
                        <div class="tab2 command">
                            <small class=""><u>저장</u></small>
                            <small class=""><u>삭제</u></small>
                        </div>
                    </div>
                    <div class="p-3 mb-2 text-dark border border-info rounded" id="leaseinfo">
                        <?php //include "below/note_lease.php"; 
                        ?>
                    </div>
                </section>
            </div> -->
        </section>
        <section class="section32">

            <div class="smalltab tab1">
                <label for="" class="">계약정보</label>
                <div class="command">
                    <small class=""><u>저장</u></small>
                    <!-- <small class=""><u>삭제</u></small> -->
                </div>
            </div>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_contract.php"; ?>
            </div>
            <div class="tab2">
                <div class="smalltab tab31">
                    <label for="" class="">보험정보</label>
                    <div class="tab2 command">
                        <small class=""><u>저장</u></small>
                        <!-- <small class=""><u>삭제</u></small> -->
                    </div>
                </div>
                <div class="tab32 p-3 mb-2 text-dark border border-info rounded">
                    <?php include "below/note_insurance.php"; ?>
                </div>
            </div>
            <div class="tab3">
                <div class="smalltab tab2">
                    <label for="" class="">리스정보</label>
                    <div class="tab2 command">
                        <small class=""><u>저장</u></small>
                        <!-- <small class=""><u>삭제</u></small> -->
                    </div>
                </div>
                <div class="p-3 mb-2 text-dark border border-info rounded" id="leaseinfo">
                    <?php include "below/note_lease.php"; ?>
                </div>
            </div>
        </section>
    </section>

    <section class="section4">
        <div class="container">
            <div class="largetab">
                <label for="" class="">견적정보</label>
                <!-- <div class="command">
                    <small class=""><u>저장</u></small>
                    <small class=""><u>삭제</u></small>
                </div> -->
            </div>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_estimate1.php"; ?>
            </div>
        </div>
    </section>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>
    <script src="f_note_edit.js"></script>
    <script>
        let id = <?= $id ?>;
        note(id);

        $('input').attr('autocomplete', "off");

        $('.dateType').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            currentText: '오늘',
            closeText: '닫기'
        })

        $('#btnSave').on('click', function() {
            let firstDate = $('input[name = firstDate]').val();
            let channel = $('select[name=channel]').val();
            let rentlease = $('select[name=rentlease]').val();
            let danawaNumber = $('input[name = danawaNumber]').val();
            let c_name = $('input[name = customerName]').val();
            let c_contact = $('input[name = customerContact]').val();
            let c_location = $('input[name = c_location]').val();
            let brand = $('input[name = brand]').val();
            let model = $('input[name = model]').val();
            let c_content = $('textarea[name = c_content]').val();
            let s_status = $('select[name=s_status]').val();
            let c_status = $('select[name=c_status]').val();


            // console.log(s_content);

            // console.log(firstDate, channel, danawaNumber, c_name, c_contact, c_location, brand, model, c_content, s_content, rentlease);
            noteEdit(firstDate, channel, danawaNumber, c_name, c_contact, c_location, brand, model, c_content, id, rentlease, s_status, c_status);
            note(id);
        })

        $('#btnDelete').on('click', function() {
            function goCategoryPage(a) {
                var frm = formCreate('delete', 'post', '../form/p_note_delete.php', '');
                frm = formInput(frm, 'idnote', a);
                formSubmit(frm);
            }

            let confirm = window.confirm('정말 삭제하겠습니까?');

            if (confirm) {
                goCategoryPage(id);
            }
        })

        $(document).ready(function() {
            $('tr[name=cn_company_name]').hide();
            $('tr[name=cn_company_no]').hide();
            $('tr[name=cn_company_no2]').hide();


        })

        $('select[name=cn_div]').on('change', function() {
            let cn_div = $(this).val();
            // console.log(cn_div);

            cn_div_change(cn_div);
        })

        $('#btnAdd').on('click', function() {
            let ordered = $('#optionRow tr').length + 1;

            let row = `<tr class=text-center>
            <td name=op_ordered>${ordered}</td>
            <td><input type=text class='form-control form-control-sm text-center' name=eachOptionName></td>
            <td><input type=text class='form-control form-control-sm numberComma text-right eachOptionPrice' name=eachOptionPrice></td>
           </tr>`;

            $('#optionRow').append(row);
            $('.eachOptionPrice').on('keyup', function() { //옵션가
                // $(this).number(true);

                let optionTotalPrice = 0;

                for (let i = 0; i < $('#optionRow tr').length; i++) {
                    let eachOptionPrice = $(`#optionRow tr:eq(${i})`).find('input[name=eachOptionPrice]').val();

                    optionTotalPrice += Number(eachOptionPrice.replace(',', ''));
                }

                // $('#optionTotalPrice').empty();
                $('#optionTotalPrice').val(optionTotalPrice);

                let price1 = $('#price').val(); //소비자가
                let price2 = optionTotalPrice + Number(price1.replace(',', '')); //총합계
                $('#carPrice1').val(price2);
                let price3 = Number($('#carPrice2').val().replace(',', '')); //할인금액
                let price4 = price2 - price3;

                $('#carPrice3').val(price4);
            })
        })

        $('#price').on('keyup', function() { //소비자가
            // $(this).select();
            // $(this).number(true);

            let optionTotalPrice = 0;

            for (let i = 0; i < $('#optionRow tr').length; i++) {
                let eachOptionPrice = $(`#optionRow tr:eq(${i})`).find('input[name=eachOptionPrice]').val();

                optionTotalPrice += Number(eachOptionPrice.replace(',', ''));
            }

            // $('#optionTotalPrice').empty();
            $('#optionTotalPrice').val(optionTotalPrice);

            let price1 = $('#price').val(); //소비자가
            let price2 = optionTotalPrice + Number(price1.replace(',', '')); //총합계
            $('#carPrice1').val(price2);
            let price3 = Number($('#carPrice2').val().replace(',', '')); //할인금액
            let price4 = price2 - price3; //할인적용금액
            $('#carPrice3').val(price4);
        })

        $('#carPrice2').on('keyup', function() { //할인가
            // $(this).number(true);

            let optionTotalPrice = 0;

            for (let i = 0; i < $('#optionRow tr').length; i++) {
                let eachOptionPrice = $(`#optionRow tr:eq(${i})`).find('input[name=eachOptionPrice]').val();

                optionTotalPrice += Number(eachOptionPrice.replace(',', ''));
            }

            // $('#optionTotalPrice').empty();
            $('#optionTotalPrice').val(optionTotalPrice);

            let price1 = $('#price').val(); //소비자가
            let price2 = optionTotalPrice + Number(price1.replace(',', '')); //총합계
            $('#carPrice1').val(price2);
            let price3 = Number($(this).val().replace(',', '')); //할인금액
            let price4 = price2 - price3; //할인적용금액
            $('#carPrice3').val(price4);
        })

        // $('#carPrice2').select();
    </script>
</body>

</html>