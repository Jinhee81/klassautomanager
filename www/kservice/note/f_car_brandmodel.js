let brandIdx, brandOption;
let modelIdx, modelOption;
let lineupIdx, lineupOption;
let trimIdx, trimOption;


function carChoose(){
    $('#brand').html('<option value=brandall>브랜드 전체</option>');
    $('#model').append('<option value=modelall>모델 전체</option>');
    $('#lineup').append('<option value=lineupall>라인업 전체</option>');
    $('#trim').append('<option value=trimall>트림 전체</option>');

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

    for (let key in lineupArray[modelIdx]) {
        lineupOption = `<option value=${key}>${lineupArray[modelIdx][key]}</option>`;
        $('#model').append(lineupOption);
    }
    lineupIdx = $('#lineup').val();

    for (let key in trimArray[lineupIdx]) {
        trimOption = `<option value=${key}>${trimArray[modelIdx][key]}</option>`;
        $('#model').append(lineupOption);
    }
    lineupIdx = $('#lineup').val();
}


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

$('#model').on('change', function() {
    modelIdx = $('#model').val();
    $('#lineup').empty();

    $('#lineup').append('<option value=lineupall>라인업 전체</option>');

    for (let key in lineupArray[modelIdx]) {
        lineupOption = `<option value=${key}>${lineupArray[modelIdx][key]}</option>`;
        $('#lineup').append(lineupOption);
    }
    lineupIdx = $('#lineup').val();
})

$('#lineup').on('change', function() {
    lineupIdx = $('#lineup').val();
    $('#trim').empty();

    $('#trim').append('<option value=trimall>트림 전체</option>');

    for (let key in trimArray[lineupIdx]) {
        trimOption = `<option value=${trimArray[lineupIdx][key]['trimcode']}>${trimArray[lineupIdx][key]['trimname']}</option>`;
        $('#trim').append(trimOption);
    }
    trimIdx = $('#trim').val();
})

$('#trim').on('change', function() {
    trimIdx = $('#trim').val();

    for (let key in trimArray[lineupIdx]) {
        if(trimArray[lineupIdx][key]['trimcode']===trimIdx){
            $('#price').val(trimArray[lineupIdx][key]['price']);

            let price1 = Number(trimArray[lineupIdx][key]['price']); //소비자가
            let price2 = Number($('#optionTotalPrice').val().replace(',', '')); //옵션가
            let price3 = price1 + price2;
            $('#carPrice1').val(price3);
        }
    }
})
