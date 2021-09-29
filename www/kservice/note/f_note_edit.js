function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function note(a) {
    let note = $.ajax({
        url: "../ajax/ajax_note_load.php",
        method: "post",
        data: {
            'id': a
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);

            if(data === 'error_occured'){
                alert('조회중 오류가 발생했습니다. 관리자에게 문의하세요');
            } else {
                $('input[name = department]').val(data.department);
                $('input[name = salesman]').val(data.name);
                $('input[name = usercode]').val(data.usercode);
                $('input[name = firstDate]').val(data.firstDate);
                $(`select[name=channel] option[value=${data.channel}]`).attr('selected', true);
                $(`select[name=s_status] option[value=${data.s_status}]`).attr('selected', true);
                $(`select[name=c_status] option[value=${data.c_status}]`).attr('selected', true);
                $('input[name = danawaNumber]').val(data.danawaNumber);
                $('input[name = customerName]').val(data.c_name);
                $('input[name = cn_name]').val(data.c_name);
                $('input[name = customerContact]').val(data.c_contact);
                $('input[name = cn_contact]').val(data.c_contact);
                $('input[name = c_location]').val(data.c_location);
                $('input[name = brand]').val(data.brandname);
                $('input[name = model]').val(data.modelname);
                $('textarea[name = c_content]').val(data.c_content);
            }
        }
    })
}

function noteEdit(a, b, c, d, e, f, g, h, i, k, m, n, p) {
    let note = $.ajax({
        url: '../ajax/ajax_note_edit.php',
        method: 'post',
        data: {
            'firstDate': a,
            'channel': b,
            'danawaNumber': c,
            'c_name': d,
            'c_contact': e,
            'c_location': f,
            'brand': g,
            'model': h,
            'c_content': i,
            'idnote': k,
            'rentlease': m,
            's_status': n,
            'c_status': p
        },
        success: function(data) {
            data = JSON.parse(data);

            if (data === 'success') {
                alert('저장했습니다^^');
            } else {
                alert('앗, 에러가 발생했어요. 관리자에게 문의하세요^^;')
            }
        }
    })
}


function createCustomer (a, b, c, d, e, f, g, h, i, j) {
    let note = $.ajax({
        url: '../ajax/customer/c_create.php',
        method: 'post',
        data: {
            'idnote': a,
            'cn_div': b,
            'cn_name': c,
            'cn_contact': d,
            'cn_email': e,
            'cn_birthday': f,
            'cn_companyname': g,
            'cn_company_number': h,
            'cn_company_number2': i,
            'usercode': j
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'error_occuered') {
                alert('앗, 에러가 발생했어요. 관리자에게 문의하세요^^;')
            } else {
                alert('고객정보를 저장했습니다. 고객화면에서도 확인할수 있습니다^^');

                let presentUrl = location.href;
                let u_id_cn = getParameterByName('id_cn');
                let aa = '&id_cn='+u_id_cn;
                let bb = '&id_cn='+data;
                let reUrl = presentUrl.replace(aa, bb);

                console.log(reUrl);

                history.pushState(null, null, reUrl);
                location.reload();

            }
        }
    })
}

function cn_div_change (a) {
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

function loadCustomer (a){
    $.ajax({
        url: '../ajax/customer/c_load.php',
        method: 'post',
        data: {
            'id_cn': a
        },
        success: function(data) {
            data = JSON.parse(data);
            // console.log(data);

            if (data === 'error_occured') {
                alert('앗, 에러가 발생했어요. 관리자에게 문의하세요ㅜㅜ');
            } else {
                // console.log('solmi');
                cn_div_change(data[2])

                $(`select[name=cn_div] option[value=${data[2]}]`).attr('selected', true);
                $('input[name = id_cn]').val(data[0]);
                $('input[name = cn_email]').val(data[5]);
                $('input[name = cn_birthday]').val(data['cn_birthday']);
                $('input[name = cn_companyname]').val(data['cn_companyname']);
                $('input[name = cn_company_number]').val(data['cn_company_number']);
                $('input[name = cn_company_number2]').val(data['cn_company_number2']);

                $('.tab2.command').html(`<small class=""><u id=editCustomer>수정</u></small>
                <small class=""><u id=deleteCustomer>삭제</u></small>`);
            }
        }
    })
}

function editCustomer (a, b, c, d, e, f, g, h, i) {
    let note = $.ajax({
        url: '../ajax/ajax_customer_note_edit.php',
        method: 'post',
        data: {
            'id_cn': a,
            'cn_div': b,
            'cn_name': c,
            'cn_contact': d,
            'cn_email': e,
            'cn_birthday': f,
            'cn_companyname': g,
            'cn_company_number': h,
            'cn_company_number2': i
        },
        success: function(data) {
            data = JSON.parse(data);

            if (data === 'success') {
                alert('고객정보를 수정했습니다. 고객화면에서도 확인할수 있어요^^');

                location.reload();
            } else {
                alert('앗, 고객정보 수정 과정에서 에러가 발생했어요. 관리자에게 문의하세요ㅜㅜ');
            }
        }
    })
}

function deleteCustomer (a,b) {
    let note = $.ajax({
        url: '../ajax/customer/c_delete.php',
        method: 'post',
        data: {
            'id_cn': a,
            'id':b
        },
        success: function(data) {
            data = JSON.parse(data);

            if (data === 'success') {
                alert('고객정보를 삭제했습니다. 고객화면에서도 삭제되었습니다');
                
                let presentUrl = location.href;
                let u_id_cn = getParameterByName('id_cn');
                let aa = '&id_cn='+u_id_cn;
                let bb = '&id_cn=null';
                let reUrl = presentUrl.replace(aa, bb);

                // console.log(reUrl);

                history.pushState(null, null, reUrl);
                location.reload();
            } else {
                alert('앗, 고객 삭제 과정에서 에러가 발생했어요. 관리자에게 문의하세요ㅜㅜ');
            }
        }
    })
}
