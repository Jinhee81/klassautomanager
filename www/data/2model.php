<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    $sql_b = "select brandcode, name from brand";
    $result_b = mysqli_query($conn, $sql_b);

    $allRows_b = array();
    while( $row_b = mysqli_fetch_array($result_b) ){
        $allRows_b[] = $row_b;
    }

// print_r($allRows_b);
?>

<style>

</style>

<header class="container jumbotron pt-3 pb-3 mb-2">
    <div class="row">
        <h3 class="">모델코드입니다.</h3>
    </div>
    <p class="lead">
        <!-- (1) 정확한 표현은 이해관계자리스트라고 보아도 무방합니다. 세입자(고객) 뿐만 아니라, 문의하는 사람 및 자주 거래하는 거래처도 저장할 수 있어요.<br> -->
        <!-- (1) 임대계약이 발생하면 숫자가 표시됩니다. (2)'기타' 분류는 임대계약 외의 일회성매출에 대한 고객을 분류할 수 있습니다.<br>
    (3) 등록해야할 세입자(임차인)가 많으면 고객센터로 연락주세요. 대신 등록작업 해드립니다. (1년계약시 유효 ^_^) -->
    </p>
</header>

<section class="container">
    <div class="row">
        <div class="col-2">
            <select name="brand" id="brand" class="form-control form-control-sm">
                <option value="all" class="">브랜드전체</option>
                <?php
                        for($i=0; $i < count($allRows_b); $i++) {
                            echo "<option value='".$allRows_b[$i]['brandcode']."'>".$allRows_b[$i]['name']."</option>";
                        }
                        ?>
            </select>
            <div class="mt-2" id="create_model">
                <button class="btn btn-primary btn-sm" id="create_model_btn">모델
                    추가하기</button>
            </div>
        </div>
        <div class="col-10">
            <table class="table table-sm table-hover text-center">
                <thead class="">
                    <tr class="table-primary">
                        <td class="">순번</td>
                        <td class="">모델코드</td>
                        <td class="">모델명</td>
                        <td class="" width=10%>danawa</td>
                        <td class="">브랜드명(코드)</td>
                        <td class="">특이사항</td>
                        <td class="">수정일시</td>
                        <td class=""></td>
                    </tr>
                </thead>
                <tbody class="" id="tbodyArea">
                </tbody>
            </table>
            <p class="comment">* 모델코드는 삭제불가합니다. 관리자에게 요청하세요 :)</p>
        </div>
    </div>

</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/view/footer.php";
?>

<script>
function makeTable(a) {
    let makeTable = $.ajax({
        url: 'ajax/ajax_model.php',
        method: 'post',
        data: {
            'brand': a
        },
        success: function(data) {
            data = JSON.parse(data);

            // console.log(data);

            let returns = '';
            let count = 0;

            $.each(data, function(key, value) {
                count += 1;
                // console.log(value.created, typeof(value.created));
                let etc = '' + value.etc;
                etc = etc.toString();
                let updated = '' + value.updated;
                updated = updated.toString();

                // console.log(created, updated, typeof(created));

                if (etc === 'null') {
                    etc = ''
                } //처음엔 created넣었는데 이거를 etc로 바꿈

                if (updated === 'null') {
                    updated = '-'
                }

                returns += `<tr>
                    <td name=order>${count}<input type=hidden name=modelid value=${value.id}></td>
                    <td name=modelcode class=primary>${value.modelcode}</td>
                    <td name=modelname><input type=text name=modelname class='form-control form-control-sm text-center' value='${value.modelname}'></td>
                    <td name=danawa><input type=number name=danawacode class='form-control form-control-sm text-center' value='${value.danawacode}'></td>
                    <td name=brandname>${value.name}(${value.brandcode})</td>
                    <td name=etc><input type=text name=etc class='form-control form-control-sm text-center' value='${etc}'></td>
                    <td name=updated class=fontgrey>${updated}</td>
                    <td><span class="badge badge-info editbadge">수정</span></td>
                </tr>`;
            });

            $('#tbodyArea').html(returns);

        }
    })

    return makeTable;
}

$(document).ready(function() {
    let brand = $('#brand').val();
    brand = JSON.stringify(brand);

    makeTable(brand);
    $('#create_model').hide();
})

$('#brand').on('change', function() {
    let brand = $('#brand').val();
    brand = JSON.stringify(brand);

    makeTable(brand);
    $('#create_model').show();

    $('#create_model_btn').on('click', function() {
        let brandtext = $('#brand :selected').text();
        let brandIdx = $('#brand').val();
        let tbodylength = $('#tbodyArea tr').length - 1;
        let lastmodelcode = $(`#tbodyArea tr:eq(${tbodylength})`).find('td[name=modelcode]').text();
        // console.log(tbodylength);
        let newmodelcode = Number(lastmodelcode) + 1;
        // console.log(newlineupcode);

        let rows = `<tr>
                    <td></td>
                    <td name=modelcode>${newmodelcode}</td>
                    <td><input name=newmodelname type=text class='form-control form-control-sm text-center'></td>
                    <td name=danawacode><input name=danawacode type=text class='form-control form-control-sm text-center'></td>
                    <td>${brandtext}(${brandIdx})</td>
                    <td><input name=etc type=text class='form-control form-control-sm text-center'></td>
                    <td></td>
                    <td><span class="badge badge-danger savebadge">저장</span></td>
                    </tr>`;
        $('#tbodyArea').append(rows);

        $('.savebadge').on('click', function() {
            let currow = $(this).closest('tr');
            let newmodelname = currow.find('input[name=newmodelname]').val();
            let newmodelcode = currow.find('td[name=modelcode]').text();
            let danawacode = currow.find('input[name=danawacode]').val();
            let etc = currow.find('input[name=etc]').val();

            console.log(newmodelname, newmodelcode, etc, brandIdx);

            if (newmodelname.length === 0) {
                alert('모델명을 기재해주세요.');
                return false;
            }

            $.ajax({
                data: {
                    'newmodelname': newmodelname,
                    'newmodelcode': newmodelcode,
                    'danawacode': danawacode,
                    'etc': etc,
                    'brandIdx': brandIdx
                },
                method: 'post',
                url: 'ajax/ajax_model_create.php',
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);

                    if (data === 'already_exist') {
                        alert('중복된 명칭이 존재합니다. 다시 확인해주세요.');
                        return false;
                    }

                    if (data === 'save_error') {
                        alert('저장에 문제생겼습니다. 관리자에게 문의하세요.');
                        return false;
                    }

                    alert('모델 생성에 성공했습니다.');
                    makeTable(brandIdx);
                }
            })

        })
    })
})

$(document).on('click', 'input[name=danawacode]', function() {
    $(this).select();
})

$(document).on('click', '.editbadge', function() {
    let brand = $('#brand').val();
    let currow = $(this).closest('tr');
    let modelid = currow.find('input[name=modelid]').val();
    let modelname = currow.find('input[name=modelname]').val();
    let etc = currow.find('input[name=etc]').val();
    let danawacode = currow.find('input[name=danawacode]').val();

    // console.log(modelid, modelname, etc, danawacode);

    $.ajax({
        data: {
            'modelid': modelid,
            'modelname': modelname,
            'etc': etc,
            'danawacode': danawacode
        },
        method: 'post',
        url: 'ajax/ajax_model_edit.php',
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);

            if (data === 'none_change') {
                alert('변경사항이 없습니다. 다시 확인하세요.');
                return false;
            } else if (data === 'alreay_exist') {
                alert('해당 모델에 중복된 명칭이 존재합니다. 다시 확인하세요.');
                return false;
            } else if (data === 'save_error') {
                alert('저장과정에 문제가 생겼습니다. 관리자에게 문의하세요.');
                return false;
            } else {
                alert('수정하였습니다.');
            }
            makeTable(brand);
        }
    })

})
</script>

</body>

</html>