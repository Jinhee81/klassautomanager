<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
include $_SERVER['DOCUMENT_ROOT'] . "/view/header.php";

include "car3.php"; //조회조건에 필요한 php파일
?>

<header class="container jumbotron pt-3 pb-3 mb-2">
    <div class="row">
        <h3 class="">라인업코드입니다.</h3>
    </div>
    <p class="lead">
        <!-- (1) 정확한 표현은 이해관계자리스트라고 보아도 무방합니다. 세입자(고객) 뿐만 아니라, 문의하는 사람 및 자주 거래하는 거래처도 저장할 수 있어요.<br> -->
        <!-- (1) 임대계약이 발생하면 숫자가 표시됩니다. (2)'기타' 분류는 임대계약 외의 일회성매출에 대한 고객을 분류할 수 있습니다.<br>
    (3) 등록해야할 세입자(임차인)가 많으면 고객센터로 연락주세요. 대신 등록작업 해드립니다. (1년계약시 유효 ^_^) -->
    </p>
</header>

<section class="container">
    <!-- 조회조건 -->
    <div class="row justify-content-md-center mb-3">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <select name="brand" id="brand" class="form-control form-control-sm">
                    </select>
                </div>
                <div class="col-4">
                    <select name="model" id="model" class="form-control form-control-sm">
                    </select>
                </div>
                <div class="col-4" id='create_lineup'>
                    <button class="btn btn-primary btn-sm" id="create_lineup_btn">라인업 추가하기</button>
                </div>
            </div>
        </div>
    </div>


    <!-- 테이블 -->
    <table class="table table-sm table-hover text-center">
        <thead class="">
            <tr class="table-primary">
                <td class="">순번</td>
                <td class="">브랜드명</td>
                <td class="">모델명</td>
                <td class="" width=40%>라인업명</td>
                <td class="">라인업코드</td>
                <td class="">사용여부</td>
                <td class="">생성일시</td>
                <td class="">수정일시</td>
                <td class=""></td>
            </tr>
        </thead>
        <tbody class="" id=tbodyArea></tbody>
    </table>
    <div class="">
        <p class="purple text-center font-italic">* 참고 : 하위트림이 존재하는경우 삭제가 불가합니다.</p>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
?>

<script>
    let brandArray = <?= json_encode($brandArray) ?>;
    let modelArray = <?= json_encode($modelArray) ?>;
    let lineupArray = <?= json_encode($lineupArray) ?>;
</script>
<script src="car3.js?<?= date('YmdHis') ?>"></script>
<script>
    function makeTable(a, b) {
        let makeTable = $.ajax({
            url: 'ajax/ajax_lineup.php',
            method: 'post',
            data: {
                'brand': a,
                'model': b
            },
            success: function(data) {
                data = JSON.parse(data);

                // console.log(data);

                let returns = '';
                let count = 0;

                $.each(data, function(key, value) {
                    count += 1;

                    let created = '' + value.created;
                    created = created.toString();
                    let updated = '' + value.updated;
                    updated = updated.toString();
                    let usepart = '';

                    // console.log(created, updated, typeof(created));

                    if (created === 'null') {
                        created = '-'
                    }

                    if (updated === 'null') {
                        updated = '-'
                    }

                    if (value.usepart === 'Y') {
                        usepart =
                            `<select class='form-control form-control-sm' name=usepart><option value=Y selected>Y</option><option value=N>N</option></select>`;
                    } else {
                        usepart =
                            `<select class='form-control form-control-sm fontred' name=usepart><option value=Y>Y</option><option value=N selected>N</option></select>`;
                    }


                    returns += `<tr>
                <td name=order>
                ${count}
                <input type=hidden name=lineupid value=${value.id}>
                </td>
                <td name=brandname class=>${value.name}</td>
                <td name=modelname>${value.modelname}
                <input type=hidden name=modelcode value=${value.modelcode}>
                </td>
                <td name=lineupname class='text-left pl-5'><input type=text name=lineupname class='form-control form-control-sm' value='${value.lineupname}'></td>
                <td name=lineupcode class=primary>${value.lineupcode}</td>
                <td name=usepart>${usepart}</td>
                <td name=created class=fontgrey>${created}</td>
                <td name=updated class=fontgrey>${updated}</td>
                <td><span class="badge badge-info editbadge">수정</span><span class="badge badge-danger deletebadge">삭제</span></td>
                </tr>`;
                });

                $('#tbodyArea').html(returns);

            }
        })

        return makeTable;
    }

    $(document).ready(function() {
        brandIdx = JSON.stringify(brandIdx);
        modelIdx = JSON.stringify(modelIdx);

        makeTable(brandIdx, modelIdx);

        $('#create_lineup').hide();
    })

    $('#brand').on('change', function() {
        brandIdx = $('#brand').val();
        modelIdx = $('#model').val();
        brandIdx = JSON.stringify(brandIdx);
        modelIdx = JSON.stringify(modelIdx);

        makeTable(brandIdx, modelIdx);
    })

    $('#model').on('change', function() {
        brandIdx = $('#brand').val();
        modelIdx = $('#model').val();
        // brandIdx = JSON.stringify(brandIdx2);
        // modelIdx = JSON.stringify(modelIdx2);

        makeTable(brandIdx, modelIdx);
        $('#create_lineup').show();

        $('#create_lineup_btn').on('click', function(event) {
            let brandtext = $('#brand :selected').text();
            let modeltext = $('#model :selected').text();
            let tbodylength = $('#tbodyArea tr').length;
            let newlineupcode;

            if (tbodylength === 0) {
                newlineupcode = modelIdx + "01";
            } else {
                let lastlineupcode = $(`#tbodyArea tr:eq(${tbodylength-1})`).find('td[name=lineupcode]')
                    .text();
                newlineupcode = Number(lastlineupcode) + 1;
            }

            let rows = `<tr>
                    <td></td>
                    <td>${brandtext}</td>
                    <td>${modeltext}</td>
                    <td><input name=newlineupname type=text class='form-control form-control-sm'></td>
                    <td name=lineupcode>${newlineupcode}</td>
                    <td><select class='form-control form-control-sm' name=usepart><option value=Y>Y</option><option value=N>N</option></select></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-danger savebadge">저장</span></td>
                    </tr>`;
            $('#tbodyArea').append(rows);

            $('.savebadge').on('click', function() {
                let currow = $(this).closest('tr');
                let newlineupname = currow.find('input[name=newlineupname]').val();
                let newlineupcode = currow.find('td[name=lineupcode]').text();
                let newusepart = currow.find('select[name=usepart] :selected').text();

                console.log(newlineupname, newlineupcode, newusepart, modelIdx);

                $.ajax({
                    data: {
                        'newlineupname': newlineupname,
                        'newlineupcode': newlineupcode,
                        'newusepart': newusepart,
                        'modelIdx': modelIdx
                    },
                    method: 'post',
                    url: 'ajax/ajax_lineup_create.php',
                    success: function(data) {
                        data = JSON.parse(data);
                        console.log(data);

                        if (data === 'alreay_exist') {
                            alert('중복된 명칭이 존재합니다. 다시 확인해주세요.');
                            return false;
                        }

                        if (data === 'save_error') {
                            alert('저장에 문제생겼습니다. 관리자에게 문의하세요.');
                            return false;
                        }

                        alert('라인업 생성에 성공했습니다.');
                        makeTable(brandIdx, modelIdx);
                    }
                })

            })

            // event.preventDefault();
        })

        $('#create_lineup_btn').off().on('click', function(event) {
            let brandtext = $('#brand :selected').text();
            let modeltext = $('#model :selected').text();
            let tbodylength = $('#tbodyArea tr').length;
            let newlineupcode;

            if (tbodylength === 0) {
                newlineupcode = modelIdx + "01";
            } else {
                let lastlineupcode = $(`#tbodyArea tr:eq(${tbodylength-1})`).find('td[name=lineupcode]')
                    .text();
                newlineupcode = Number(lastlineupcode) + 1;
            }

            let rows = `<tr>
                    <td></td>
                    <td>${brandtext}</td>
                    <td>${modeltext}</td>
                    <td><input name=newlineupname type=text class='form-control form-control-sm'></td>
                    <td name=lineupcode>${newlineupcode}</td>
                    <td><select class='form-control form-control-sm' name=usepart><option value=Y>Y</option><option value=N>N</option></select></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-danger savebadge">저장</span></td>
                    </tr>`;
            $('#tbodyArea').append(rows);

            $('.savebadge').on('click', function() {
                let currow = $(this).closest('tr');
                let newlineupname = currow.find('input[name=newlineupname]').val();
                let newlineupcode = currow.find('td[name=lineupcode]').text();
                let newusepart = currow.find('select[name=usepart] :selected').text();

                console.log(newlineupname, newlineupcode, newusepart, modelIdx);

                $.ajax({
                    data: {
                        'newlineupname': newlineupname,
                        'newlineupcode': newlineupcode,
                        'newusepart': newusepart,
                        'modelIdx': modelIdx
                    },
                    method: 'post',
                    url: 'ajax/ajax_lineup_create.php',
                    success: function(data) {
                        data = JSON.parse(data);
                        console.log(data);

                        if (data === 'alreay_exist') {
                            alert('중복된 명칭이 존재합니다. 다시 확인해주세요.');
                            return false;
                        }

                        if (data === 'save_error') {
                            alert('저장에 문제생겼습니다. 관리자에게 문의하세요.');
                            return false;
                        }

                        alert('라인업 생성에 성공했습니다.');
                        makeTable(brandIdx, modelIdx);
                    }
                })

            })
        })
    })

    $(document).on('click', '.editbadge', function() {
        let brandIdx = $('#brand').val();
        let modelIdx = $('#model').val();
        let currow = $(this).closest('tr');
        let lineupid = currow.find('input[name=lineupid]').val();
        let lineupname = currow.find('input[name=lineupname]').val();
        let usepart = currow.find('select[name=usepart]').val();
        let modelcode = currow.find('input[name=modelcode]').val();

        // console.log(lineupid, lineupname, usepart);

        $.ajax({
            data: {
                'lineupid': lineupid,
                'lineupname': lineupname,
                'usepart': usepart,
                'modelcode': modelcode
            },
            method: 'post',
            url: 'ajax/ajax_lineup_edit.php',
            success: function(data) {
                data = JSON.parse(data);
                // console.log(data);

                if (data === 'none_change') {
                    alert('변경사항이 없습니다. 다시 확인하세요.');
                    return false;
                } else if (data === 'save_error') {
                    alert('저장과정에 문제가 생겼습니다. 관리자에게 문의하세요.');
                    return false;
                } else {
                    alert('수정하였습니다.');
                }
                makeTable(brandIdx, modelIdx);
            }
        })
    })

    $(document).on('click', '.deletebadge', function() {
        let brandIdx = $('#brand').val();
        let modelIdx = $('#model').val();
        let currow = $(this).closest('tr');
        let lineupid = currow.find('input[name=lineupid]').val();
        let lineupcode = currow.find('td[name=lineupcode]').text();

        // console.log(lineupid, lineupname, usepart);

        $.ajax({
            data: {
                'lineupid': lineupid,
                'lineupcode': lineupcode
            },
            method: 'post',
            url: 'ajax/ajax_lineup_delete.php',
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);

                if (data === 'delete_error') {
                    alert('삭제에 문제생겼습니다. 관리자에게 문의하세요.');
                    return false;
                } else {
                    alert('삭제하였습니다.');
                }
                makeTable(brandIdx, modelIdx);
            }
        })
    })
</script>

</body>

</html>