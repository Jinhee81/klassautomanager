<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    // include $_SERVER['DOCUMENT_ROOT']."/view/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    settype($filtered_id, 'integer');

    $sql = "select
                idnote, firstDate, channel, danawaNumber,
                c_name, c_contact, c_location,
                rentlease, c_content,
                sales_content,
                user.name as username,
                user.department as department
            from note
            left join user
            on note.usercode = user.usercode
            where idnote={$filtered_id}
            ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $clist['firstDate'] = htmlspecialchars($row['firstDate']);
    $clist['channel'] = htmlspecialchars($row['channel']);
    $clist['danawaNumber'] = htmlspecialchars($row['danawaNumber']);
    $clist['c_name'] = htmlspecialchars($row['c_name']);
    $clist['c_contact'] = htmlspecialchars($row['c_contact']);
    $clist['c_location'] = htmlspecialchars($row['c_location']);
    $clist['rentlease'] = htmlspecialchars($row['rentlease']);
    $clist['c_content'] = htmlspecialchars($row['c_content']);
    $clist['sales_content'] = htmlspecialchars($row['sales_content']);
    $clist['usercode'] = htmlspecialchars($row['usercode']);
    $clist['username'] = htmlspecialchars($row['username']);
    $clist['department'] = htmlspecialchars($row['department']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- ?????????????????? -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/moonspam/NanumBarunGothic@latest/nanumbarungothicsubset.css">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />

    <!-- CSS only, bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- customizing css-->
    <link rel="stylesheet" href="/inc/css/customizing.css?<?=date('YmdHis')?>">

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>

    <!-- JavaScript Bundle with Popper, bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <title>modal</title>

    <style class="">
    div.inline {
        display: inline;
    }
    </style>
</head>

<style>
button.primary,
tr.primary,
td.primary {
    background-color: #CEF6F5;
}
</style>

<section class="container">
    <div class="jumbotron pt-3 pb-3">
        <h3 class=""> >> ?????? ?????? ??????????????? :)</h3>
        <p class="lead">???????????? ?????????! ????????? ??????????????????~!^^ </p>
        <hr class="my-4">
        <small class="text-right">?????????????????? ?????????, ???????????????, ????????????????????? ?????? ????????? ????????? ???????????? ????????????. <br class="">
            ????????????, ?????????, ????????? ???????????? ??????, ?????? ?????? ????????? ?????? ?????? ??? ??????. - <span class=font-italic>????????? J ?????????.</span></small>
    </div>
</section>

<section class="container">
    <div class="border border-info rounded mb-4">
        <div class="container">
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-danger mr-2" id="btnSave" style="margin-right: 5px;">??????</button>
                <a href="note.php" role="button" class="btn btn-secondary"><i
                        class="fas fa-angle-double-right"></i>????????????</a>
            </div>

            <table class="table table-sm text-end table-borderless">
                <tbody>
                    <tr>
                        <th class="fontblue" width="10%">?????????</th>
                        <td class="" width="25%">
                            <select name="department" id="department" class="form-control center">
                                <option value="?????????" class="" selected="">?????????
                                </option>
                                <option value="??????1???" class="">
                                    ??????1???
                                </option>
                                <option value="??????2???" class="">
                                    ??????2???
                                </option>
                                <option value="??????3???" class="">
                                    ??????3???
                                </option>
                                <option value="??????4???" class="">
                                    ??????4???
                                </option>
                            </select>
                        </td>
                        <th class="fontblue" width="8%">????????????</th>
                        <td class="" width="20%">
                            <input type="text" class="form-control text-center" name="salesman" id="salesman"
                                value="?????????">
                        </td>
                        <td class="" width="8%"></td>
                        <td class="" width="20%"></td>
                        <td class="" width="%"></td>
                    </tr>
                    <tr class="">
                        <th class="fontblue">?????????</th>
                        <td class="">
                            <input type="text" class="form-control text-center dateType" name="firstDate" id="firstDate"
                                value="2021-5-7">
                        </td>
                        <th class="fontblue">????????????</th>
                        <td class="">
                            <select name="channel" id="channel" class="form-control center">
                                <option value="?????????" class="" selected="">?????????
                                </option>
                                <option value="????????????" class="">????????????
                                </option>
                                <option value="??????" class="">??????
                                </option>
                            </select>
                        </td>
                        <th class="fontblue">???????????????</th>
                        <td class="">
                            <input type="number" class="form-control text-center" name="danawaNumber" id="danawaNumber"
                                value="">
                        </td>
                        <td class=""></td>
                    </tr>
                    <tr class="">
                        <th class="fontblue">?????????</th>
                        <td class="">
                            <div class="row">
                                <div class="col col-sm-8" style="padding-right: 0px;">
                                    <input type="text" class="form-control text-center" name="customerName"
                                        id="customerName" value="?????????">
                                </div>
                                <div class="col col-sm-4">
                                    <button class="btn btn-warning btn-sm btn-block">????????????</button>
                                </div>
                            </div>
                        </td>
                        <th class="fontblue">??? ??? ???</th>
                        <td class="">
                            <input type="text" class="form-control text-center" name="customerContact"
                                id="customerContact" value="010-3172-2917">
                        </td>
                        <th class="fontblue">??? &nbsp;&nbsp;&nbsp;???</th>
                        <td class="">
                            <input type="text" class="form-control text-center" name="customerLocation"
                                id="customerLocation" value="">
                        </td>
                        <td class="">
                            <select name="rentlease" id="rentlease" class="form-control fontred">
                                <option value="??????" class="" selected="">??????
                                </option>
                                <option value="??????" class="">??????
                                </option>
                                <option value="??????+??????" class="">
                                    ??????+??????
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="fontblue pt-3">??? ???<br>????????????</th>
                        <td class="" colspan="6"><textarea name="customerContent" id="customerContent" cols="120"
                                rows="5" class="form-control">?????? : ??????_??????????????? _????????? 3.8 2WD_??????????????? (7??????)
?????? : ??????, ?????????/????????? 0%, 48??????
???????????? : 641,520
?????? : ???????????? 197 ????????????????????? b???217???</textarea></td>
                    </tr>
                    <tr class="">
                        <th class="pt-4">????????????</th>
                        <td class="" colspan="6"><textarea name="salesContent" id="salesContent" cols="120" rows="5"
                                class="form-control"></textarea></td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</section>

<!-- ?????? ??? -->
<section class="container">
    <!-- ??????????????? -->
    <div class="p-3 mb-2 text-dark border border-info rounded">
    </div>
    <!-- ??????????????? -->
    <div class="row">
        <div class="col container pr-0">
            <button class="btn primary btn-sm">????????????</button>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_customer.php"; ?>
            </div>
        </div>
        <div class="col container pr-0">
            <button class="btn primary btn-sm">????????????</button>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_contract.php"; ?>
            </div>
        </div>
        <div class="col container">
            <button class="btn primary btn-sm">????????????</button>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_insurance.php"; ?>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <table class="">
            <tr class="">
                <td class="">

                </td>
                <td class=""></td>
                <td class=""></td>
            </tr>
        </table>
    </div> -->
    <!-- ??????,??????????????? -->
    <div class="p-3 mb-2 text-dark border border-secondary rounded" id=firstCarArea>
        <button class="btn primary btn-sm mr-1">????????????1</button>
        <button class="btn btn-outline-danger btn-sm">????????????</button>
        <div class="p-3 mb-2 text-dark border border-info rounded">
            <?php include "below/note_car1.php"; ?>
        </div>
        <button class="btn primary btn-sm">????????????</button>
        <div class="p-3 mb-2 text-dark border border-info rounded">
            <?php include "below/note_car_common.php"; ?>
        </div>
        <button class="btn primary btn-sm">????????????</button>
        <div class="p-3 mb-2 text-dark border border-info rounded">
            <?php include "below/note_estimate1.php"; ?>
        </div>
    </div>

    <!-- ??????????????? ??????????????????????????? -->
    <div class="" id=secondCarArea>
        <div class="p-3 mb-2 text-dark border border-secondary rounded">
            <button class="btn primary btn-sm">????????????2</button>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_car2.php"; ?>
            </div>
            <button class="btn primary btn-sm">????????????</button>
            <div class="p-3 mb-2 text-dark border border-info rounded">
                <?php include "below/note_estimate2.php"; ?>
            </div>
        </div>
    </div>

    <!-- ??????????????? -->
    <button class="btn btn-secondary btn-sm">????????????</button>
    <div class="p-3 mb-2 text-dark border border-secondary rounded">
        <?php include "below/note_lease.php"; ?>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/view/footer.php";
?>

<script class="">
$('#btnSave').on('click', function() {
    let firstDate = $('#firstDate').val();
    let channel = $('#channel :selected').val();
    let danawaNumber = $('#danawaNumber').val();
    let customerName = $('#customerName').val();
    let customerContact = $('#customerContact').val();
    let customerLocation = $('#customerLocation').val();
    let rentlease = $('#rentlease :selected').val();
    let customerContent = $('#customerContent').val();
    let salesContent = $('#salesContent').val();
    let department = $('#department :selected').val();
    let salesman = $('#salesman').val();
    let idnote = <?=$filtered_id?>;

    console.log(firstDate, channel, danawaNumber, customerName, customerContact, customerLocation, rentlease,
        customerContent, salesContent, department, salesman, idnote);

    $.ajax({
        url: '../ajax/ajax_note_edit.php',
        method: 'post',
        data: {
            'firstDate': firstDate,
            'channel': channel,
            'danawaNumber': danawaNumber,
            'customerName': customerName,
            'customerContact': customerContact,
            'customerLocation': customerLocation,
            'rentlease': rentlease,
            'customerContent': customerContent,
            'salesContent': salesContent,
            'department': department,
            'salesman': salesman,
            'idnote': idnote
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'account_error') {
                alert('??????????????? ??????????????? ???????????? ?????????. ?????? ??????????????????.')
                return false;
            } else if (data === 'save_error') {
                alert('???????????? ???????????????. ??????????????? ???????????????.')
                return false;
            } else {
                alert('??????????????????.');
                location.reload();
            }
        }
    })
})

$('#btnAdd').on('click', function() {
    let ordered = $('#optionRow tr').length + 1;

    let row = `<tr class=text-center>
            <td>${ordered}</td>
            <td><input type=text class='form-control  text-center' name=eachOptionName></td>
            <td><input type=text class='form-control numberComma text-right eachOptionPrice' name=eachOptionPrice></td>
           </tr>`;

    $('#optionRow').append(row);
    $('.eachOptionPrice').on('click', function() {
        $(this).number(true);

        let optionTotalPrice = 0;

        for (let i = 0; i < $('#optionRow tr').length; i++) {
            let eachOptionPrice = $(`#optionRow tr:eq(${i})`).find('input[name=eachOptionPrice]').val();

            optionTotalPrice += Number(eachOptionPrice.replace(',', ''));
        }

        // $('#optionTotalPrice').empty();
        $('#optionTotalPrice').val(optionTotalPrice);

        let price1 = $('#price').val(); //????????????
        let price2 = optionTotalPrice + Number(price1.replace(',', '')); //?????????
        $('#carPrice1').val(price2);
    })
})

$(document).ready(function() {
    $('#secondCarArea').hide();
})
</script>
</body>

</html>