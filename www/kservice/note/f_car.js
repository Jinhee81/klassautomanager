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
    })
}



$('#createCar').on('click', function(){

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

    // console.log(brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, price, optionTotalPrice, carPrice1, carPrice2, carPrice3, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items);

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

    // cars.push(brandcode, brandname, modelcode, modelname, lineupcode, lineupname, trimcode, trimname, price, optionTotalPrice, carPrice1, carPrice2, carPrice3, excolor, incolor, cc, fuel, sun_front, sun_back, blackbox, c_etc_items);

    // console.log(cars);

    createCar(cars);
})