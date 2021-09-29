<!-- 차량의 옵션부문 -->
<button class="btn btn-warning btn-sm" id=btnAdd>옵션추가</button><br>
<table class="table table-sm mt-2">
    <thead class="">
        <tr class="table-info text-center">
            <td class="" width=10%>순번</td>
            <td class="" width=50%>옵션명</td>
            <td class="" width=40%>옵션가격</td>
        </tr>
    </thead>
    <tbody class="" id=optionRow>

    </tbody>
    <tfoot class="">
        <tr class="">
            <th class="text-right" colspan=2>옵션가(B)</th>
            <!-- <td class=""></td> -->
            <td>
                <input type="text" class="form-control text-right form-control-sm fontred numberComma" name=optionTotalPrice id=optionTotalPrice value="0" disabled>
            </td>
        </tr>
        <tr class="">
            <th class="text-right" colspan=2>총차량가(A+B)</th>
            <!-- <td class=""></td> -->
            <td>
                <input type="text" class="form-control form-control-sm text-right fontred numberComma" name=carPrice1 id=carPrice1 value="0">
            </td>
        </tr>
        <tr class="">
            <th class="text-right" colspan=2>할인금액</th>
            <!-- <td class=""></td> -->
            <td>
                <input type="text" class="form-control form-control-sm text-right fontred numberComma" name=carPrice2 id=carPrice2 value="0">
            </td>
        </tr>
        <tr class="">
            <th class="text-right" colspan=2>할인적용금액</th>
            <!-- <td class=""></td> -->
            <td>
                <input type="text" class="form-control form-control-sm text-right fontred numberComma" name=carPrice3 id=carPrice3 value="0">
            </td>
        </tr>
    </tfoot>
</table>