<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- 나눔바른고딕 -->
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

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">견적 입력하기 &#128512;</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container pt-3 pb-3" style="background-color:#E0E6F8">
                        <table class="table text-end table-borderless modalTable mb-0" style="padding-top: 10px;">
                            <tbody class="modalTbody" style="">
                                <tr class="">
                                    <th class="" width="10%">차량정보</th>
                                    <td class="" colspan="4">
                                        <select name="" id="" class="form-control form-control-sm modalSelect">
                                            <option value="" class="">현대, 그랜저, 2020년형 가솔린 2.5 (개별소비세 3.5% 적용), 프리미엄
                                                (A/T),
                                                32,940,000원</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th class="">옵션정보</th>
                                    <td class="" colspan="4">
                                        <input type="text" class="form-control form-control-sm modalInput"
                                            value="썬루프 1,500,000원 / 하이패스 200,000원 / 옵션가 1,700,000원 / 총차량가 32,000,000원 / 할인금액 0원 / 할인적용금액 32,000,000원">
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class=""></td>
                                    <th class="">견적일자</th>
                                    <td class="">
                                        <input type="text" class="form-control form-control-sm text-center modalInput"
                                            value="2021-1-1">
                                    </td>
                                    <th class="">계약기간</th>
                                    <td class="">
                                        <div class="row">
                                            <div class="col col-sm-10 pr-0" style="padding-right: 0px;">
                                                <select name="" id=""
                                                    class="form-control form-control-sm center modalSelect">
                                                    <option value="" class="">24개월</option>
                                                    <option value="" class="">36개월</option>
                                                    <option value="" class="">48개월</option>
                                                    <option value="" class="">55개월</option>
                                                    <option value="" class="">60개월</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class=""></td>
                                    <th class="">금 융 사</th>
                                    <td class="">
                                        <select name="" id="" class="form-control form-control-sm center modalSelect">
                                            <option value="" class="">DGB캐피탈</option>
                                        </select>
                                    </td>
                                    <th class="">보 증 금</th>
                                    <td class="">
                                        <div class="row">
                                            <div class="col col-sm-3 pr-0" style="padding-right: 0px;">
                                                <select name="" id=""
                                                    class="form-control form-control-sm center modalSelect">
                                                    <option value="" class="">0%</option>
                                                    <option value="" class="">20%</option>
                                                    <option value="" class="">30%</option>
                                                    <option value="" class="">금액</option>
                                                </select>
                                            </div>
                                            <div class="col col-sm-7 pl-0 pr-0"
                                                style="padding-left: 0px;padding-right: 0px;">
                                                <input type="text"
                                                    class="form-control form-control-sm text-center modalInput"
                                                    placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="col col-sm-2 text-start"
                                                style="padding-left: 5px;padding-right: 0px;">
                                                원
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class=""></td>
                                    <th class="">고객표시</th>
                                    <td class="">
                                        <select name="" id="" class="form-control form-control-sm center modalSelect">
                                            <option value="" class="">조건Ⅰ</option>
                                            <option value="" class="">조건Ⅱ</option>
                                            <option value="" class="">조건Ⅲ</option>
                                        </select>
                                    </td>
                                    <th class="">선 수 금</th>
                                    <td class="">
                                        <div class="row">
                                            <div class="col col-sm-3 pr-0" style="padding-right: 0px;">
                                                <select name="" id=""
                                                    class="form-control form-control-sm center modalSelect">
                                                    <option value="" class="">0%</option>
                                                    <option value="" class="">20%</option>
                                                    <option value="" class="">30%</option>
                                                    <option value="" class="">금액</option>
                                                </select>
                                            </div>
                                            <div class="col col-sm-7 pl-0 pr-0"
                                                style="padding-left: 0px;padding-right: 0px;">
                                                <input type="text"
                                                    class="form-control form-control-sm text-center modalInput"
                                                    placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="col col-sm-2 text-start"
                                                style="padding-left: 5px;padding-right: 0px;">
                                                원
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class=""></td>
                                    <th class="">견적번호</th>
                                    <td class="">
                                        <input type="text" class="form-control form-control-sm text-center modalInput"
                                            value="견적가능">
                                    </td>
                                    <th class="">월이용료</th>
                                    <td class="">
                                        <div class="row">
                                            <div class="col col-sm-10" style="padding-right: 0px;">
                                                <input type="text"
                                                    class="form-control form-control-sm text-center modalInput"
                                                    placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="col col-sm-2 text-start"
                                                style="padding-left: 5px;padding-right: 0px;">
                                                원
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class=""></td>
                                    <th class="">견적상태</th>
                                    <td class="">
                                        <input type="text" class="form-control form-control-sm text-center modalInput"
                                            value="">
                                    </td>
                                    <th class="">만기인수가</th>
                                    <td class="">
                                        <div class="row">
                                            <div class="col col-sm-10 pl-0 pr-0" style="padding-right: 0px;">
                                                <input type="text"
                                                    class="form-control form-control-sm text-center modalInput"
                                                    placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="col col-sm-2 text-start"
                                                style="padding-left: 5px;padding-right: 0px;">
                                                원
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-primary">저장</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>