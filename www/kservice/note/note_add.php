<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    print_r($_SESSION);

?>

<style>
td.primary {
    background-color: #CEF6F5;
}
</style>

<section class="container">
    <div class="jumbotron pt-3 pb-3">
        <h3 class=""> >> 상담 등록 화면이에요 :)</h3>
        <p class="lead">상담등록을 축하합니다! 꼭 성사되기를 응원합니다.^^ </p>
        <hr class="my-4">
        <small class="text-right">클라스오토는 계약율, 고객인지도, 서비스만족도가 높은 업체로 상단에 노출되어 있습니다. <br class="">
            목표의식, 두려움, 타성을 이겨내는 순간, 일에 대한 열정을 불어 넣을 수 있다. - <span class=font-italic>로버트 J 크리겔.</span></small>
    </div>
</section>
<section class="container">
    <table class="table">
        <tr>
            <th class="fontblue">부서명</th>
            <td class="">
                <select name="department" id="department" class="form-control center">
                    <option value="관리팀" class="" <?php if($_SESSION['department']==='관리팀'){echo "selected";}?>>관리팀
                    </option>
                    <option value="영업1팀" class="" <?php if($_SESSION['department']==='영업1팀'){echo "selected";}?>>영업1팀
                    </option>
                    <option value="영업2팀" class="" <?php if($_SESSION['department']==='영업2팀'){echo "selected";}?>>영업2팀
                    </option>
                    <option value="영업3팀" class="" <?php if($_SESSION['department']==='영업3팀'){echo "selected";}?>>영업3팀
                    </option>
                    <option value="영업4팀" class="" <?php if($_SESSION['department']==='영업4팀'){echo "selected";}?>>영업4팀
                    </option>
                </select>
            </td>
            <th class="fontblue">담당자명</th>
            <td class="">
                <input type="text" class="form-control text-center" name="salesname" id="salsename"
                    value=<?=$_SESSION['name']?>>
            </td>
            <td class=""></td>
            <td class=""></td>
            <td class=""></td>
        </tr>
        <tr class="">
            <th class="fontblue">상담일</th>
            <td class="">
                <input type="text" class="form-control text-center dateType fontred" name="firstDate" id="firstDate">
            </td>
            <th class="fontblue">유입경로</th>
            <td class="">
                <select name="channel" id="channel" class="form-control center">
                    <option value="다나와" class="">다나와</option>
                    <option value="홈페이지" class="">홈페이지</option>
                    <option value="기타" class="">기타</option>
                </select>
            </td>
            <th class="fontblue">다나와번호</th>
            <td class="">
                <input type="number" class="form-control text-center" name="danawaNumber" id="danawaNumber">
            </td>
            <td class=""></td>
        </tr>
        <tr class="">
            <th class="fontblue">고객명</th>
            <td class="">
                <input type="text" class="form-control text-center" name="customerName" id="customerName" required>
            </td>
            <th class="fontblue">연락처</th>
            <td class="">
                <input type="text" class="form-control text-center" name="customerContact" id="customerContact"
                    required>
            </td>
            <th class="fontblue">위치</th>
            <td class="">
                <input type="text" class="form-control text-center" name="customerLocation" id="customerLocation">
            </td>
            <!-- <th class="fontblue">렌트/리스</th> -->
            <td class="">
                <select name="rentlease" id="rentlease" class="form-control fontred">
                    <option value="렌트" class="">렌트</option>
                    <option value="리스" class="">리스</option>
                    <option value="렌트+리스" class="">렌트+리스</option>
                </select>
            </td>
        </tr>
        <tr class="">
            <th class="fontblue">고객<br>요청사항</th>
            <td class="" colspan=6><textarea name="customerContent" id="customerContent" cols="120" rows="5"
                    class="form-control"></textarea></td>
        </tr>
        <tr class="">
            <th class="">상담내용</th>
            <td class="" colspan=6><textarea name="salesContent" id="salesContent" cols="120" rows="5"
                    class="form-control"></textarea></td>
        </tr>
    </table>
    <div class="row justify-content-md-center">
        <button class="btn btn-primary mr-1" id=btnSave>저장하기</button>
        <a href='note.php'><button type='button' class='btn btn-secondary'><i class="fas fa-angle-double-right"></i>
                상담목록</button></a>
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
    let usercode = <?=$_SESSION['usercode']?>;

    console.log(firstDate, channel, danawaNumber, customerName, customerContact, customerLocation, rentlease,
        customerContent, salesContent, usercode);

    $.ajax({
        url: '../ajax/ajax_note_add.php',
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
            'usercode': usercode
        },
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);

            if (data === 'success') {
                alert('저장하였습니다.')
            } else {
                alert('저장하지 못했습니다. 관리자에게 문의하세요.')
            }
        }
    })
})

let today = new Date().format('Y-n-j');
$('#firstDate').val(today);
// console.log(today);
</script>
</body>

</html>