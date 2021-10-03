<?php
// include "car4.php"; //조회조건에 필요한 php파일
?>
<table class="table table-borderless mb-0">
    <tr class="">
        <td class="p-0">
            <?php include "note_car_scar1.php"; ?>
        </td>
    </tr>
    <tr class="">
        <td class="p-0">
            <?php include "note_car_scar2.php"; ?>
        </td>
    </tr>
    <tr class="">
        <td id="carCommon" colspan=2>
            <?php include "note_car_scar3.php"; ?>
        </td>
    </tr>
    <tr class="">
        <td class="car_etc_item_td">
            <div class="car_etc_item">
                <label for="" class="">기타용품</label>
                <input type="text" class="form-control form-control-sm righti" name="c_etc_items">
            </div>
        </td>
    </tr>
</table>

<!-- <script>
    let brandArray = <?= json_encode($brandArray) ?>;
    let modelArray = <?= json_encode($modelArray) ?>;
    let lineupArray = <?= json_encode($lineupArray) ?>;
    let trimArray = <?= json_encode($trimArray) ?>;
</script>

<script src="j_car4.js?<?= date('YmdHis') ?>"></script> -->