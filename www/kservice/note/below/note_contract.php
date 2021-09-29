<table class="table table-borderless table-sm mb-0">
    <tr class="">
        <th class="" width=25%>계약기간
        </th>
        <td class="">
            <select class='form-control form-control-sm' name="cr_priod_m">
                <option value="24" class="">24개월</option>
                <option value="36" class="">36개월</option>
                <option value="48" class="">48개월</option>
                <option value="55" class="">55개월</option>
                <option value="60" class="">60개월</option>
            </select>
        </td>
    </tr>
    <tr>
        <th class="" width=>상품군
        </th>
        <td class="" width=>
            <select class='form-control form-control-sm' name="cr_good">
                <option value="만기선택형" class="">만기선택형</option>
                <option value="만기반납형" class="">만기반납형</option>
                <option value="만기인수형" class="">만기인수형</option>
            </select>
        </td>
    </tr>
    <tr>
        <th class="" width=>주행거리
        </th>
        <td class="" width=>
            <select class='form-control form-control-sm' name="cr_distance">
                <option value="10000">10,000km</option>
                <option value="12000">12,000km</option>
                <option value="15000">15,000km</option>
                <option value="17000">17,000km</option>
                <option value="20000">20,000km</option>
                <option value="22000">22,000km</option>
                <option value="25000">25,000km</option>
                <option value="30000">30,000km</option>
                <option value="40000">40,000km</option>
                <option value="50000">50,000km</option>
                <option value="무제한">무제한</option>
            </select>
        </td>
    </tr>
    <tr>
        <th class="" width=>정비
        </th>
        <td class="" width=>
            <select class='form-control form-control-sm' name="cr_maintenance">
                <option value="포함">포함</option>
                <option value="불포함">불포함</option>
            </select>
        </td>
    </tr>
    <tr>
        <th class="" width=>보증금
        </th>
        <td class="" width=>
            <select class='form-control form-control-sm half' name="cr_deposit_p">
                <option value="0%">0%</option>
                <option value="10%">10%</option>
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
                <option value="50%">50%</option>
                <option value="금액">금액</option>
            </select>
            <div class="inline">
                <input type="text" class="form-control text-right form-control-sm fontred left numberComma" name="cr_deposit_a" value="0">
                <span class="right">원</span>
            </div>
        </td>
    </tr>
    <tr>
        <th class="" width=>선수금
        </th>
        <td class="" width=>
            <select class='form-control form-control-sm half' name="cr_advance_p">
                <option value="0%">0%</option>
                <option value="10%">10%</option>
                <option value="20%">20%</option>
                <option value="30%">30%</option>
                <option value="40%">40%</option>
                <option value="50%">50%</option>
                <option value="금액">금액</option>
            </select>
            <div class="inline">
                <input type="text" class="form-control text-right form-control-sm fontred left numberComma" name="cr_advance_a" value="0">
                <span class="right">원</span>
            </div>
        </td>
    </tr>
    <tr>
        <th class="" width=>수수료율
        </th>
        <td class="">
            <div class="inline">
                <input type="text" class="form-control text-right form-control-sm fontred left2" name="cr_fees_p">
                <span class="right">%</span>
            </div>
            <div class="inline">
                <input type="text" class="form-control text-right form-control-sm fontred left numberComma" name="cr_fees_a" value="0">
                <span class="right">원</span>
            </div>
        </td>
    </tr>
</table>