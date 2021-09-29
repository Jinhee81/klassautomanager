//이건 lineup.php, trim.php에서 필요한 js file

let brandoption, modeloption, brandIdx, modelIdx;
let lineupIdx, lineupOption;

$('#brand').append('<option value=brandall>브랜드 전체</option>');
$('#model').append('<option value=modelall>모델 전체</option>');
$('#lineup').append('<option value=lineupall>라인업 전체</option>');

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