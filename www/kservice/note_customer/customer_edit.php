<!-- css use flexbox -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>고객등록</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/inc__above.php"; ?>
    <link rel="stylesheet" href="/inc/css/customer.css?<?= date('YmdHis') ?>">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/view/inc__below.php";
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

    $id_cn = $_GET['id_cn'];

    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class=""> >> 고객 등록 화면이에요 :)</h3>
            <p class="lead">상담등록을 축하합니다! 꼭 성사되기를 응원합니다.^^ </p>
            <hr class="my-4">
            <small class="text-right">클라스오토는 계약율, 고객인지도, 서비스만족도가 높은 업체로 상단에 노출되어 있습니다. <br class="">
                목표의식, 두려움, 타성을 이겨내는 순간, 일에 대한 열정을 불어 넣을 수 있다. - <span class=font-italic>로버트 J 크리겔.</span></small>
        </div>
    </section>
    <section class="section2 container">
        <div class="p-3 mb-2 text-dark border border-info rounded section__customer">
            <!-- <table class="table table-borderless">
                <tr class="">
                    <td class="" width=50%>
                        <table class="table table-borderless" width=100%>
                            <tr class="">
                                <th class="">구분</th>
                                <td class="">
                                    <select name="cn_div" id="cn_div" class="form-control form-control-sm">
                                        <option value="" class="">개인</option>
                                        <option value="" class="">개인사업자</option>
                                        <option value="" class="">법인사업자</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">성명</th>
                                <td class=""><input type="text" class="form-control form-control-sm" name=cn_name
                                        id=cn_name>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">연락처</th>
                                <td class=""><input type="text" class="form-control form-control-sm" name=cn_contact
                                        id=cn_contact>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">이메일</th>
                                <td class=""><input type="text" class="form-control form-control-sm" name=cn_email
                                        id=cn_email>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">생년월일</th>
                                <td class=""><input type="text" class="form-control form-control-sm" name=cn_birthday
                                        id=cn_birthday>
                                </td>
                            </tr>
                            <tr class="">
                                <th class="">주소</th>
                                <td class="">
                                    <div class='form-row'>
                                        <div class='form-group col-md-5'>
                                            <input type='text' id='zipcode1' name='zipcode1' placeholder='우편번호'
                                                class='form-control' disabled>
                                        </div>
                                        <div class='form-group col-md-5'>
                                            <input type='button' onclick='sample2_execDaumPostcode()' value='우편번호 찾기'
                                                class='btn btn-outline-secondary btn-sm'><br>
                                        </div>
                                    </div>
                                    <div class="">
                                        <input type='text' id='add1-1' placeholder='주소' name='add1-1'
                                            class='form-control'>
                                        <input type='text' id='add1-2' name='add1-2' placeholder='상세주소'
                                            class='form-control'>
                                        <input type='text' id='add1-3' name='add1-3' placeholder='참고항목'
                                            class='form-control'>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="" width=50%>
                        
                    </td>
                </tr>
            </table> -->

            <div class="customer__main">
                <table class="table table-sm table-borderless mb-0">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/kservice/note/below/note_customer.php"; ?>
                    <tr class="">
                        <th class="">주소</th>
                        <td class="">
                            <div class='form-row'>
                                <div class='form-group col-md-5'>
                                    <input type='text' id='zipcode1' name='zipcode1' placeholder='우편번호'
                                        class='form-control' disabled>
                                </div>
                                <div class='form-group col-md-5'>
                                    <input type='button' onclick='sample2_execDaumPostcode()' value='우편번호 찾기'
                                        class='btn btn-outline-secondary btn-sm'><br>
                                </div>
                            </div>
                            <div class="">
                                <input type='text' id='add1-1' placeholder='주소' name='add1-1' class='form-control'>
                                <input type='text' id='add1-2' name='add1-2' placeholder='상세주소' class='form-control'>
                                <input type='text' id='add1-3' name='add1-3' placeholder='참고항목' class='form-control'>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="customer__sub">
                <table class="table table-sm table-borderless mb-0" width=100%>
                    <tr class="">
                        <th class="" width=25%>담당자명</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=responsibility
                                id=responsibility>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">직책</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_position
                                id=re_position>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">연락처</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_contact
                                id=re_contact>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">이메일</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_email id=re_email>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">인수지</th>
                        <td class="">
                            <div class='form-row'>
                                <div class='form-group col-md-5'>
                                    <input type='text' id='zipcode2' name='zipcode2' placeholder='우편번호'
                                        class='form-control' disabled>
                                </div>
                                <div class='form-group col-md-5'>
                                    <input type='button' onclick='sample2_execDaumPostcode()' value='우편번호 찾기'
                                        class='btn btn-outline-secondary btn-sm'><br>
                                </div>
                            </div>
                            <div class="">
                                <input type='text' id='add2-1' placeholder='주소' name='add2-1' class='form-control'>
                                <input type='text' id='add2-2' name='add2-2' placeholder='상세주소' class='form-control'>
                                <input type='text' id='add2-3' name='add2-3' placeholder='참고항목' class='form-control'>
                            </div>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">특이사항</th>
                        <td class="">
                            <textarea name="" id="" cols="30" rows="5" class="form-control form-control-sm"></textarea>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </section>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
    function cn_div_change(a) {
        if (a === '개인사업자') {
            $('tr[name=cn_name]').attr('style', 'display:show');
            $('th[name=cn_name]').text('성명');
            $('tr[name=cn_company_name]').attr('style', 'display:show');
            $('tr[name=cn_company_no]').attr('style', 'display:show');
            $('tr[name=cn_contact]').attr('style', 'display:show');
            $('tr[name=cn_email]').attr('style', 'display:show');
            $('tr[name=cn_birthday]').attr('style', 'display:show');
            $('tr[name=cn_company_no2]').attr('style', 'display:none');
        } else if (a === '법인사업자') {
            $('tr[name=cn_name]').attr('style', 'display:show');
            $('th[name=cn_name]').text('대표자명');
            $('tr[name=cn_company_name]').attr('style', 'display:show');
            $('tr[name=cn_company_no]').attr('style', 'display:show');
            $('tr[name=cn_contact]').attr('style', 'display:show');
            $('tr[name=cn_email]').attr('style', 'display:show');
            $('tr[name=cn_birthday]').attr('style', 'display:none');
            $('tr[name=cn_company_no2]').attr('style', 'display:show');
        } else {
            $('tr[name=cn_name]').attr('style', 'display:show');
            $('th[name=cn_name]').text('성명');
            $('tr[name=cn_company_name]').attr('style', 'display:none');
            $('tr[name=cn_company_no]').attr('style', 'display:none');
            $('tr[name=cn_contact]').attr('style', 'display:show');
            $('tr[name=cn_email]').attr('style', 'display:show');
            $('tr[name=cn_birthday]').attr('style', 'display:show');
            $('tr[name=cn_company_no2]').attr('style', 'display:none');
        }
    }
    </script>

    <script class="">
    let today = new Date().format('Y-n-j');
    $('input[name=firstDate]').val(today);
    // console.log(today);

    $('input').attr('autocomplete', 'off');

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
    </script>

</body>

</html>