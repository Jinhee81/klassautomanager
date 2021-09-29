<?php
    session_start();
    if(!isset($_SESSION['is_login'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT']."/view/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/view/conn.php";

    $sql = "select 
                id, code, name, usepart, etc, date_format(updated, '%Y-%c-%e %H:%i:%s') as updated
            from danawa
            order by ordered
            ";
    $result = mysqli_query($conn, $sql);

    $allRows = array();

    while($row = mysqli_fetch_array($result)){
        $allRows[] = $row; 
    }

?>

<style>
td.primary {
    background-color: #CEF6F5;
}
</style>

<header class="container jumbotron pt-3 pb-3 mb-2">
    <div class="row">
        <h3 class="">다나와코드입니다.</h3>
    </div>
    <p class="lead">
        <!-- (1) 정확한 표현은 이해관계자리스트라고 보아도 무방합니다. 세입자(고객) 뿐만 아니라, 문의하는 사람 및 자주 거래하는 거래처도 저장할 수 있어요.<br> -->
        <!-- (1) 임대계약이 발생하면 숫자가 표시됩니다. (2)'기타' 분류는 임대계약 외의 일회성매출에 대한 고객을 분류할 수 있습니다.<br>
    (3) 등록해야할 세입자(임차인)가 많으면 고객센터로 연락주세요. 대신 등록작업 해드립니다. (1년계약시 유효 ^_^) -->
    </p>
</header>

<section class="container" style="width:90%">
    <!-- 테이블 -->
    <table class="table table-sm table-hover text-center">
        <thead class="">
            <tr class="table-primary">
                <td class="">순번</td>
                <td class="" width=10%>다나와코드</td>
                <td class="" width=15%>명칭</td>
                <td class="" width=>사용여부</td>
                <td class="" width=>특이사항</td>
                <td class="" width=>수정일</td>
                <td class=""></td>
            </tr>
        </thead>
        <tbody class="" id="tbodyArea">
            <?php
        for($i=0; $i < count($allRows); $i++) { ?>
            <tr>
                <td class=""><?=$i+1?></td>
                <td class="">
                    <input type="text" class="form-control form-control-sm text-center" name=code
                        value="<?=$allRows[$i]['code']?>">
                    <input type="hidden" name="id" value="<?=$allRows[$i]['id']?>">
                </td>
                <td class=""><input type="text" class="form-control form-control-sm text-center" name=name
                        value="<?=$allRows[$i]['name']?>">
                </td>
                <td class="">
                    <?php
                if($allRows[$i]['usepart']==='Y'){
                    echo "<select name='usepart' class='form-control form-control-sm'>
                        <option value='Y'>Y</option>
                        <option value='N'>N</option>
                    </select>";
                } else {
                    echo "<select name='usepart' class='form-control form-control-sm fontred'>
                        <option value='Y'>Y</option>
                        <option value='N' selected>N</option>
                    </select>";
                }
                ?>
                </td>
                <td class="">
                    <input name="etc" class="form-control form-control-sm text-center" name=etc
                        value="<?=$allRows[$i]['etc']?>">
                </td>
                <td class="fontgrey"><?=$allRows[$i]['updated']?></td>
                <td class="">
                    <span class="badge badge-info editbadge">수정</span>
                </td>
            </tr>
            <?php }
        ?>
        </tbody>
    </table>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT']."/view/footer.php";
?>

<script class="">
$(document).on('click', '.editbadge', function() {
    let currow = $(this).closest('tr');
    let id = currow.find('input[name=id]').val();
    let name = currow.find('input[name=name]').val();
    let danawacode = currow.find('input[name=code]').val();
    let usepart = currow.find('select[name=usepart] :selected').val();
    let etc = currow.find('input[name=etc]').val();

    // console.log(id, name, danawacode, usepart);
    goCategoryPage(id, name, danawacode, usepart, etc);
    // console.log(id, name, danawacode, usepart, etc);

    function goCategoryPage(a, b, c, d, e) {
        var frm = formCreate('edit', 'post', 'process/p_danawa_edit.php', '');
        frm = formInput(frm, 'id', a);
        frm = formInput(frm, 'name', b);
        frm = formInput(frm, 'danawacode', c);
        frm = formInput(frm, 'usepart', d);
        frm = formInput(frm, 'etc', e);
        formSubmit(frm);
    }
})

$('input[name=code]').on('click', function() {
    $(this).select();
});
</script>

</body>

</html>