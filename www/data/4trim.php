<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header.php";

    include "car3.php";//조회조건에 필요한 php파일
?>

<style>
td.primary {
    background-color: #CEF6F5;
}
</style>

<header class="container jumbotron pt-3 pb-3 mb-2">
    <div class="row">
        <h3 class="">트림코드입니다.</h3>
    </div>
    <p class="lead">
        <!-- (1) 정확한 표현은 이해관계자리스트라고 보아도 무방합니다. 세입자(고객) 뿐만 아니라, 문의하는 사람 및 자주 거래하는 거래처도 저장할 수 있어요.<br> -->
        <!-- (1) 임대계약이 발생하면 숫자가 표시됩니다. (2)'기타' 분류는 임대계약 외의 일회성매출에 대한 고객을 분류할 수 있습니다.<br>
    (3) 등록해야할 세입자(임차인)가 많으면 고객센터로 연락주세요. 대신 등록작업 해드립니다. (1년계약시 유효 ^_^) -->
    </p>
</header>

<section class="container" style="">
    <!-- 조회조건 -->
    <div class="row justify-content-md-center mb-3">
        <div class="col-10">
            <div class="row">
                <div class="col-2">
                    <select name="brand" id="brand" class="form-control form-control-sm">
                    </select>
                </div>
                <div class="col-2">
                    <select name="model" id="model" class="form-control form-control-sm">
                    </select>
                </div>
                <div class="col-5">
                    <select name="lineup" id="lineup" class="form-control form-control-sm">
                    </select>
                </div>
                <div class="col-3" id='create_trim'>
                    <button class="btn btn-primary btn-sm" id="create_trim_btn">트림 추가하기</button>
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
                <td class="" width=>라인업명</td>
                <td class="" width=20%>트림명</td>
                <td class="">트림코드</td>
                <td class="" width=8%>사용여부</td>
                <td class="" width=10%>소비자가</td>
                <td class="">생성일시</td>
                <td class="">수정일시</td>
                <td class=""></td>
            </tr>
        </thead>
        <tbody class="" id="tbodyArea"></tbody>
    </table>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/view/footer.php";
?>

<script>
let brandArray = <?=json_encode($brandArray)?>;
let modelArray = <?=json_encode($modelArray)?>;
let lineupArray = <?=json_encode($lineupArray)?>;
</script>

<script src="car3.js?<?=date('YmdHis')?>"></script>

<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function makeTable(a, b, c) {
    let makeTable = $.ajax({
        url: 'ajax/ajax_trim.php',
        method: 'post',
        data: {
            'brand': a,
            'model': b,
            'lineup': c
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
                let usepart;

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
                <td name=order>${count}<input type=hidden name=trimid value=${value.id}></td>;
                <td name=brandname class=>${value.name}</td>
                <td name=modelname>${value.modelname}</td>
                <td name=lineupname class='text-left'>${value.lineupname}</td>
                <td name=trimname class='text-left'><input name=trimname class='form-control form-control-sm'  type=text value='${value.trimname}'></td>
                <td name=trimcode class=primary>${value.trimcode}<input type=hidden name=lineupcode value=${value.lineupcode}></td>
                <td name=usepart>${usepart}</td>
                <td name=price><input name=price type=text class='form-control form-control-sm text-right' value='${numberWithCommas(value.price)}'></td>
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
    makeTable(brandIdx, modelIdx, lineupIdx);
    // console.log(brandIdx, modelIdx, lineupIdx);
    $('#create_trim').hide()
})

$('#brand').on('change', function() {
    brandIdx = $('#brand').val();
    modelIdx = $('#model').val();
    lineupIdx = $('#lineup').val();

    makeTable(brandIdx, modelIdx, lineupIdx);
})

$('#model').on('change', function() {
    brandIdx = $('#brand').val();
    modelIdx = $('#model').val();
    lineupIdx = $('#lineup').val();

    makeTable(brandIdx, modelIdx, lineupIdx);
})

$('#lineup').on('change', function() {
    brandIdx = $('#brand').val();
    modelIdx = $('#model').val();
    lineupIdx = $('#lineup').val();

    makeTable(brandIdx, modelIdx, lineupIdx);

    $('#create_trim').show();

    $('#create_trim_btn').on('click', function(event) {
        let brandtext = $('#brand :selected').text();
        let modeltext = $('#model :selected').text();
        let lineuptext = $('#lineup :selected').text();
        let tbodylength = $('#tbodyArea tr').length;

        console.log(tbodylength, typeof(tbodylength));
        let newtrimcode;

        if (tbodylength === 0) {
            newtrimcode = lineupIdx + "01";
        } else {
            let lasttrimcode = $(`#tbodyArea tr:eq(${tbodylength-1})`).find('td[name=trimcode]').text();
            newtrimcode = Number(lasttrimcode) + 1;
        }

        let rows = `<tr>
                    <td></td>
                    <td>${brandtext}</td>
                    <td>${modeltext}</td>
                    <td>${lineuptext}</td>
                    <td><input name=newtrimname type=text class='form-control form-control-sm'></td>
                    <td name=trimcode>${newtrimcode}</td>
                    <td><select class='form-control form-control-sm' name=usepart><option value=Y>Y</option><option value=N>N</option></select></td>
                    <td><input name=price type=text class='form-control form-control-sm' value=0></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-danger savebadge">저장</span></td>
                    </tr>`;
        $('#tbodyArea').append(rows);

        $('input[name=price]').number(true);

        $('.savebadge').on('click', function() {
            let currow = $(this).closest('tr');
            let newtrimname = currow.find('input[name=newtrimname]').val();
            let newtrimcode = currow.find('td[name=trimcode]').text();
            let newusepart = currow.find('select[name=usepart] :selected').text();
            let price = currow.find('input[name=price]').val();

            // console.log(newtrimname, newtrimcode, newusepart, price, typeof(price), lineupIdx);

            if (newtrimname.length === 0) {
                alert('트림명이 입력되지 않았습니다. 다시 확인해주세요.');
                return false;
            }

            if (price.length === 0) {
                alert('소비자가는 반드시 입력되어야 합니다. 0원을 입력해주세요.');
                return false;
            }

            $.ajax({
                data: {
                    'newtrimname': newtrimname,
                    'newtrimname': newtrimname,
                    'newtrimcode': newtrimcode,
                    'newusepart': newusepart,
                    'price': price,
                    'lineupIdx': lineupIdx
                },
                method: 'post',
                url: 'ajax/ajax_trim_create.php',
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);

                    if (data === 'exist_trimname_error') {
                        alert('중복된 트림명이 존재합니다. 다시 확인해주세요.');
                        return false;
                    }

                    if (data === 'save_error') {
                        alert('저장에 문제생겼습니다. 관리자에게 문의하세요.');
                        return false;
                    }

                    alert('트림 생성에 성공했습니다.');
                    makeTable(brandIdx, modelIdx, lineupIdx);
                }
            })


        })
    })

    $('#create_trim_btn').off().on('click', function(event) {
        let brandtext = $('#brand :selected').text();
        let modeltext = $('#model :selected').text();
        let lineuptext = $('#lineup :selected').text();
        let tbodylength = $('#tbodyArea tr').length;

        console.log(tbodylength, typeof(tbodylength));
        let newtrimcode;

        if (tbodylength === 0) {
            newtrimcode = lineupIdx + "01";
        } else {
            let lasttrimcode = $(`#tbodyArea tr:eq(${tbodylength-1})`).find('td[name=trimcode]').text();
            newtrimcode = Number(lasttrimcode) + 1;
        }

        let rows = `<tr>
                    <td></td>
                    <td>${brandtext}</td>
                    <td>${modeltext}</td>
                    <td>${lineuptext}</td>
                    <td><input name=newtrimname type=text class='form-control form-control-sm'></td>
                    <td name=trimcode>${newtrimcode}</td>
                    <td><select class='form-control form-control-sm' name=usepart><option value=Y>Y</option><option value=N>N</option></select></td>
                    <td><input name=price type=text class='form-control form-control-sm' value=0></td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-danger savebadge">저장</span></td>
                    </tr>`;
        $('#tbodyArea').append(rows);

        $('input[name=price]').number(true);

        $('.savebadge').on('click', function() {
            let currow = $(this).closest('tr');
            let newtrimname = currow.find('input[name=newtrimname]').val();
            let newtrimcode = currow.find('td[name=trimcode]').text();
            let newusepart = currow.find('select[name=usepart] :selected').text();
            let price = currow.find('input[name=price]').val();

            // console.log(newtrimname, newtrimcode, newusepart, price, typeof(price), lineupIdx);

            if (newtrimname.length === 0) {
                alert('트림명이 입력되지 않았습니다. 다시 확인해주세요.');
                return false;
            }

            if (price.length === 0) {
                alert('소비자가는 반드시 입력되어야 합니다. 0원을 입력해주세요.');
                return false;
            }

            $.ajax({
                data: {
                    'newtrimname': newtrimname,
                    'newtrimname': newtrimname,
                    'newtrimcode': newtrimcode,
                    'newusepart': newusepart,
                    'price': price,
                    'lineupIdx': lineupIdx
                },
                method: 'post',
                url: 'ajax/ajax_trim_create.php',
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);

                    if (data === 'exist_trimname_error') {
                        alert('중복된 트림명이 존재합니다. 다시 확인해주세요.');
                        return false;
                    }

                    if (data === 'save_error') {
                        alert('저장에 문제생겼습니다. 관리자에게 문의하세요.');
                        return false;
                    }

                    alert('트림 생성에 성공했습니다.');
                    makeTable(brandIdx, modelIdx, lineupIdx);
                }
            })


        })
    })
})

$(document).on('click', 'input[name=price]', function() {
    $(this).select();
    $(this).number(true);
})

$(document).on('click', '.deletebadge', function() {
    let currow = $(this).closest('tr');
    let trimid = currow.find('input[name=trimid]').val();
    let trimcode = currow.find('td[name=trimcode]').text();

    $.ajax({
        data: {
            'trimid': trimid,
            'trimcode': trimcode
        },
        method: 'post',
        url: 'ajax/ajax_trim_delete.php',
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'fail') {
                alert('삭제에 문제생겼습니다. 관리자에게 문의하세요.');
                return false;
            } else {
                alert('삭제하였습니다.');
            }
            makeTable(brandIdx, modelIdx, lineupIdx);
        }
    })
})

$(document).on('click', '.editbadge', function() {
    let currow = $(this).closest('tr');
    let trimid = currow.find('input[name=trimid]').val();
    let trimname = currow.find('input[name=trimname]').val();
    let usepart = currow.find('select[name=usepart]').val();
    let lineupcode = currow.find('input[name=lineupcode]').val();
    let price = currow.find('input[name=price]').val();

    // console.log(trimid, trimname, usepart, lineupcode, price);

    $.ajax({
        data: {
            'trimid': trimid,
            'trimname': trimname,
            'usepart': usepart,
            'lineupcode': lineupcode,
            'price': price
        },
        method: 'post',
        url: 'ajax/ajax_trim_edit.php',
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'none_change') {
                alert('변경사항이 없습니다. 다시 확인하세요.');
                return false;
            } else if (data === 'save_error') {
                alert('저장과정에 문제가 생겼습니다. 관리자에게 문의하세요.');
                return false;
            } else {
                alert('수정하였습니다.');
            }
            makeTable(brandIdx, modelIdx, lineupIdx);
        }
    })
})
</script>
</body>

</html