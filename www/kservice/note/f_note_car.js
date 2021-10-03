function declaration (){
    let brandcode = $('#brand option:selected').val();
    let brandname = $('#brand option:selected').text();
    let modelcode = $('#model option:selected').val();
    let modelname = $('#model option:selected').text();
    let lineupcode = $('#lineup option:selected').val();
    let lineupname = $('#lineup option:selected').text();
    let trimcode = $('#trim option:selected').val();
    let trimname = $('#trim option:selected').text();

    let price = $('#price').val(); //소비자가
    let optionTotalPrice = $('#optionTotalPrice').val();//옵션가
    let carPrice1 = $('#carPrice1').val();//총차량가
    let carPrice2 = $('#carPrice2').val();//할인금액
    let carPrice3 = $('#carPrice3').val();//할인적용금액

    let excolor = $('input[name=excolor]').val();
    let incolor = $('input[name=incolor]').val();
    let cc = $('input[name=cc]').val();
    let fuel = $('select[name=fuel]').val();
    let sun_front = $('input[name=sun_front]').val();
    let sun_back = $('input[name=sun_back]').val();
    let blackbox = $('select[name=blackbox]').val();
    let c_etc_items = $('input[name=c_etc_items]').val();

    let cars = {
        'brandcode' : brandcode,
        'brandname' : brandname,
        'modelcode' : modelcode,
        'modelname' : modelname,
        'lineupcode' : lineupcode,
        'lineupname' : lineupname,
        'trimcode' : trimcode,
        'trimname' : trimname,
        'price' : price,
        'optionTotalPrice' : optionTotalPrice,
        'carPrice1' : carPrice1,
        'carPrice2' : carPrice2,
        'carPrice3' : carPrice3,
        'excolor' : excolor,
        'incolor' : incolor,
        'cc' : cc,
        'fuel' : fuel,
        'sun_front' : sun_front,
        'sun_back' : sun_back,
        'blackbox' : blackbox,
        'c_etc_items' : c_etc_items,
        'idnote' : id
    }

    return cars;
}

function createCar (a) {

    // console.log(a);
    $.ajax({
        url: '../ajax/car/car_create.php',
        method: 'post',
        data: {
            'cars': a
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'error_occuered') {
                alert('앗, 에러가 발생했어요. 관리자에게 문의하세요^^;')
            } else {
                alert('차량정보를 저장했습니다.');

                let presentUrl = location.href;
                let aa = getParameterByName('id_n_car');
                let aaa = '&id_n_car='+aa;
                let bbb = '&id_n_car='+data;
                let reUrl = presentUrl.replace(aaa, bbb);

                console.log(reUrl);

                history.pushState(null, null, reUrl);
                location.reload();
            }
        }
    })
}

function editCar (a) {

    // console.log(a);
    $.ajax({
        url: '../ajax/car/car_edit.php',
        method: 'post',
        data: {
            'cars': a
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            
        }
    })
}

function loadCar (a) {

    // console.log(a);
    $.ajax({
        url: '../ajax/car/car_load.php',
        method: 'post',
        data: {
            'idcar': a
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            let created; 
            let updated;

            $('#brand').attr('disabled',true);
            $('#model').attr('disabled',true);
            $('#lineup').attr('disabled',true);
            $('#trim').attr('disabled',true);

            $('#brand').html(`<option value=${data['brandcode']}>${data['brandname']}</option>`);
            $('#model').html(`<option value=${data['modelcode']}>${data['modelname']}</option>`);
            $('#lineup').html(`<option value=${data['lineupcode']}>${data['lineupname']}</option>`);
            $('#trim').html(`<option value=${data['trimcode']}>${data['trimname']}</option>`);

            $('#price').val(data['c_price_basic']);
            $('#optionTotalPrice').val(data['c_price_option']);
            $('#carPrice1').val(data['c_price_boption']);
            $('#carPrice2').val(data['c_price_discount']);
            $('#carPrice3').val(data['c_price_result']);

            $('input[name=excolor]').val(data['excolor']);
            $('input[name=incolor]').val(data['incolor']);
            $('input[name=cc]').val(data['cc']);
            $('input[name=fuel]').val(data['fuel']);
            $('input[name=sun_front]').val(data['sun_front']);
            $('input[name=sun_back]').val(data['sun_back']);
            $('input[name=blackbox]').val(data['blackbox']);
            $('input[name=c_etc_items]').val(data['c_etc_items']);

            if(data['car_created']==null){
                created = '-';
            } else {
                created = data['car_created'];
            }

            $('#car_created').text(created);

            if(data['car_updated']==null){
                updated = '-';
            } else {
                updated = data['car_updated'];
            }
            $('#car_updated').text(updated);

            $('.tab2.command.car').html(`<small class=""><u id=resetCar>차량초기화</u> <u id=editCar>수정</u>
            <u id=deleteCar>삭제</u></small>`);
        }
    })
}



$('#createCar').on('click', function(){

    declaration();

    // console.log(brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, price, optionTotalPrice, carPrice1, carPrice2, carPrice3, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items);

    

    // cars.push(brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, price, optionTotalPrice, carPrice1, carPrice2, carPrice3, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items);

    // console.log(cars);

    createCar(cars);
})

$(document).on('click', '#editCar', function(){

    // declaration();

    // cars.push(brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, price, optionTotalPrice, carPrice1, carPrice2, carPrice3, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items);

    // console.log(cars);

    // createCar(cars);

    // console.log(declaration());
    editCar(declaration());
})

$(document).on('click', '#resetCar', function(){
    $('#brand').attr('disabled',false);
    $('#model').attr('disabled',false);
    $('#lineup').attr('disabled',false);
    $('#trim').attr('disabled',false);

    carChoose();

    console.log('solmi');
})

