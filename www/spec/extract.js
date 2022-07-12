let model, rentlease, period, deposit;
let rlArray = [], pArray = [], dArray = [];

function chooseRentlease(x){
    rlArray = [];
    if (x === 'rlall') {
        return rlArray = ["R", "L"];
    } else {
        return rlArray[0] = x;
    }
}

function choosePeriod(x){
    pArray = [];
    if (x === 'pall') {
        return pArray = ["36", "48", "60"];
    } else {
        return pArray[0] = x;
    }
}

function chooseDeposit(x){
    dArray = [];
    if (x === 'dall') {
        return dArray = ["1", "2", "3"];
    } else {
        return dArray[0] = x;
    }
}

$('#extract').on('click', function(){
    model = $('select[name=model]').val();
    rentlease = $('select[name=rentlease]').val();
    period = $('select[name=period]').val();
    deposit = $('select[name=deposit]').val();

    errorArray = ['brand_error', 'model_error', 'lineup_error', 'trim_error'];

    chooseRentlease(rentlease), choosePeriod(period), chooseDeposit(deposit);

    
    rlArray = JSON.stringify(rlArray);
    pArray = JSON.stringify(pArray);
    dArray = JSON.stringify(dArray);
    
    console.log(model, rlArray, pArray, dArray);

    $.ajax({
        url: 'extract.php',
        method: 'post',
        data: { 
            'model': model,
            'rlArray': rlArray,
            'pArray': pArray,
            'dArray': dArray
        },
        beforeSend: function() {
            $('.loader').show();
        },
        success: function(data){
                // $('#content').html(data);
                data = JSON.parse(data);

                if(errorArray.includes(data)){
                    alert(data+'! : 관리자에게 문의하세요.');
                    $('.loader').hide();
                    return false;
                } else {
                    console.log(data);
                    var returns = '';
                    var count = 0;
                    $.each(data, function(key, value){
                        count += 1;

                        if(value[26]==='N' || value[27]==='N'){
                            returns += '<tr class=fontred>';
                        } else {
                            returns += '<tr>';
                        }
                        
                        // returns += '<td class="" name=checkbox><input type="checkbox" name="rid" value="" class="tbodycheckbox"></td>';
                        returns += '<td class="" name=>'+value[0]+'</td>';
                        returns += '<td class="" name=>'+value[1]+'</td>';
                        returns += '<td class="" name=>'+value[2]+'</td>';
                        returns += '<td class="" name=>'+value[3]+'</td>';
                        returns += '<td class="" name=>'+value[4]+'</td>';
                        returns += '<td class="" name=>'+value[5]+'</td>';
                        returns += '<td class="" name=>'+value[6]+'</td>';
                        returns += '<td class="" name=>'+value[7]+'</td>';
                        returns += '<td class="" name=>'+value[8]+'</td>';
                        returns += '<td class="" name=>'+value[9]+'</td>';
                        returns += '<td class="" name=>'+value[10]+'</td>';
                        returns += '<td class="" name=>'+value[11]+'</td>';
                        returns += '<td class="" name=>'+value[12]+'</td>';
                        returns += '<td class="" name=>'+value[13]+'</td>';
                        returns += '<td class="" name=>'+value[14]+'</td>';
                        returns += '<td class="" name=>'+value[15]+'</td>';
                        returns += '<td class="" name=>'+value[16]+'</td>';
                        returns += '<td class="" name=>'+value[17]+'</td>';
                        returns += '<td class="" name=>'+value[18]+'</td>';
                        returns += '<td class="" name=>'+value[19]+'</td>';
                        returns += '<td class="" name=>'+count+'</td>';
                        returns += '<td class="" name=>'+value[20]+'</td>';
                        returns += '<td class="" name=>'+value[21]+'</td>';
                        returns += '<td class="primary" name=>'+value[22]+'</td>'; //lineup count
                        returns += '<td class="" name=>'+value[23]+'</td>'; //lineup order
                        returns += '<td class="" name=>'+value[24]+'</td>'; //trim count
                        returns += '<td class="" name=>'+value[25]+'</td>'; //trim order
                        returns += '<td class="" name=>'+value[26]+'</td>'; //lineup use
                        returns += '<td class="" name=>'+value[27]+'</td>'; //trim use
                        returns += '</tr>';
                    })
                // console.log(data[0][0]);

                $('#allvals').html(returns);
                $('.loader').hide();
                }
        },
        fail: function(){
            alert('error occurred!!');
        }
    })
})

$(window).on('load', function(){
    $('.loader-wrapper').fadeOut('slow');
})
