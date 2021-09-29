<?php
?>
<div class="p-3 mb-2 text-dark border border-info rounded">
    <table class="table table-borderless">
        <tr class="">
            <td class="" width=50%>
                <table class="table table-borderless" width=100%>
                    <tr class="">
                        <th class="">구분</th>
                        <td class="">
                            <select name="cn_div" id="cn_div" class="form-control form-control-sm">
                                <option value="" class="">개인</option>
                                <option value="" class="">개인사업자</option>
                                <option value="" class="">법인사업자</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">성명</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=cn_name id=cn_name>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">연락처</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=cn_contact
                                id=cn_contact>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">이메일</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=cn_email id=cn_email>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">생년월일</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=cn_birthday
                                id=cn_birthday>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">주소</th>
                        <td class="">
                            <div class='form-row'>
                                <div class='form-group col-md-5'>
                                    <input type='text' id='zipcode1' name='zipcode1' placeholder='우편번호'
                                        class='form-control' disabled>
                                </div>
                                <div class='form-group col-md-5'>
                                    <input type='button' onclick='sample2_execDaumPostcode()' value='우편번호 찾기'
                                        class='btn btn-outline-secondary btn-sm'><br>
                                </div>
                            </div>
                            <div class="">
                                <input type='text' id='add1-1' placeholder='주소' name='add1-1' class='form-control'>
                                <input type='text' id='add1-2' name='add1-2' placeholder='상세주소' class='form-control'>
                                <input type='text' id='add1-3' name='add1-3' placeholder='참고항목' class='form-control'>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="" width=50%>
                <table class="table table-borderless" width=100%>
                    <tr class="">
                        <th class="fontwhite">담당자명</th>
                        <td class="">
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">담당자명</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=responsibility
                                id=responsibility>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">직책</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_position
                                id=re_position>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">연락처</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_contact
                                id=re_contact>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">이메일</th>
                        <td class=""><input type="text" class="form-control form-control-sm" name=re_email id=re_email>
                        </td>
                    </tr>
                    <tr class="">
                        <th class="">인수지</th>
                        <td class="">
                            <div class='form-row'>
                                <div class='form-group col-md-5'>
                                    <input type='text' id='zipcode2' name='zipcode2' placeholder='우편번호'
                                        class='form-control' disabled>
                                </div>
                                <div class='form-group col-md-5'>
                                    <input type='button' onclick='sample2_execDaumPostcode()' value='우편번호 찾기'
                                        class='btn btn-outline-secondary btn-sm'><br>
                                </div>
                            </div>
                            <div class="">
                                <input type='text' id='add2-1' placeholder='주소' name='add2-1' class='form-control'>
                                <input type='text' id='add2-2' name='add2-2' placeholder='상세주소' class='form-control'>
                                <input type='text' id='add2-3' name='add2-3' placeholder='참고항목' class='form-control'>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>