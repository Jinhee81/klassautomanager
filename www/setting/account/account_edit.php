<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>계정수정</title>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/inc.php";
    ?>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['is_login'])) {
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/view/conn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav2.php";

    // print_r($_SESSION);

    $sql = "select * from user where usercode={$_GET['usercode']}";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $clist['department'] = htmlspecialchars($row['department']);
    $clist['position'] = htmlspecialchars($row['position']);
    $clist['system_position'] = htmlspecialchars($row['system_position']);
    $clist['name'] = htmlspecialchars($row['name']);
    $clist['phone'] = htmlspecialchars($row['phone']);
    $clist['email'] = htmlspecialchars($row['email']);
    $clist['start_work'] = htmlspecialchars($row['start_work']);
    $clist['end_work'] = htmlspecialchars($row['end_work']);
    $clist['id'] = htmlspecialchars($row['id']);
    $clist['password'] = htmlspecialchars($row['password']);
    $clist['etc'] = htmlspecialchars($row['etc']);
    ?>

    <style>
        td.primary {
            background-color: #CEF6F5;
        }
    </style>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class=""> >> 계정 수정 화면입니다!</h3>
            <p class="lead">시스템직급 마스터(모든화면 볼수있음), 시스템직급 스탭(차종코드, 상담,견적,고객 볼수있음), 시스템직급 영업(상담,견적,고객 볼수있음) </p>
            <hr class="my-4">
        </div>
    </section>
    <section class="container" style="max-width:500px;">
        <form action="p_account_edit.php" method="post">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">부서명</label>
                <div class="col-sm-9">
                    <select name="department" class="form-control">
                        <option value="관리팀" <?php if ($clist['department'] === '관리팀') {
                                                echo "selected";
                                            } ?>>관리팀</option>
                        <option value="영업1팀" <?php if ($clist['department'] === '영업1팀') {
                                                    echo "selected";
                                                } ?>>영업1팀</option>
                        <option value="영업2팀" <?php if ($clist['department'] === '영업2팀') {
                                                    echo "selected";
                                                } ?>>영업2팀</option>
                        <option value="영업3팀" <?php if ($clist['department'] === '영업3팀') {
                                                    echo "selected";
                                                } ?>>영업3팀</option>
                        <option value="영업4팀" <?php if ($clist['department'] === '영업4팀') {
                                                    echo "selected";
                                                } ?>>영업4팀</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">직급/직책</label>
                <div class="col-sm-9">
                    <select name="position" class="form-control">
                        <option value="대표" <?php if ($clist['position'] === '대표') {
                                                echo "selected";
                                            } ?>>대표</option>
                        <option value="본부장" <?php if ($clist['position'] === '본부장') {
                                                echo "selected";
                                            } ?>>본부장</option>
                        <option value="이사" <?php if ($clist['position'] === '이사') {
                                                echo "selected";
                                            } ?>>이사</option>
                        <option value="팀장" <?php if ($clist['position'] === '팀장') {
                                                echo "selected";
                                            } ?>>팀장</option>
                        <option value="과장" <?php if ($clist['position'] === '과장') {
                                                echo "selected";
                                            } ?>>과장</option>
                        <option value="대리" <?php if ($clist['position'] === '대리') {
                                                echo "selected";
                                            } ?>>대리</option>
                        <option value="사원" <?php if ($clist['position'] === '사원') {
                                                echo "selected";
                                            } ?>>사원</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">시스템권한</label>
                <div class="col-sm-9">
                    <select name="system_position" class="form-control">
                        <option value="마스터" <?php if ($clist['system_position'] === '마스터') {
                                                echo "selected";
                                            } ?>>마스터</option>
                        <option value="스탭" <?php if ($clist['system_position'] === '스탭') {
                                                echo "selected";
                                            } ?>>스탭</option>
                        <option value="영업" <?php if ($clist['system_position'] === '영업') {
                                                echo "selected";
                                            } ?>>영업</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">성명</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="<?= $clist['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">연락처</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="phone" value="<?= $clist['phone'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">이메일</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" value="<?= $clist['email'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">입사일</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control dateType" name="start_work" value="<?= $clist['start_work'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">퇴사일</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control dateType" name="end_work" value="<?= $clist['end_work'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">아이디</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" value="<?= $clist['id'] ?>" autocomplete="off">
                    <input type="hidden" class="form-control" name="usercode" value="<?= $_GET['usercode'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">비밀번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control password" name="password" value="<?= $clist['password'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">특이사항</label>
                <div class="col-sm-9">
                    <textarea name="etc" id="" cols="30" rows="2" class="form-control"><?= $clist['etc'] ?></textarea>
                </div>
            </div>
            <div class="mt-7">
                <a class="btn btn-secondary" href="account.php" role="button">>>계정목록</a>
                <button type="submit" class="btn btn-primary">수정</button>
                <button type="button" class="btn btn-danger" id="deletebtn">삭제</button>
            </div>
        </form>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
        const usercode = <?= $_GET['usercode'] ?>;
        $(document).ready(function() {
            $('.dateType').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                currentText: '오늘',
                closeText: '닫기'
            })
        })

        $('#deletebtn').on('click', function() {
            function goCategoryPage(a) {
                var frm = formCreate('delete', 'post', 'p_account_delete.php', '');
                frm = formInput(frm, 'usercode', a);
                formSubmit(frm);
            }

            let confirm = window.confirm('정말 삭제하겠습니까?');

            if (confirm) {
                goCategoryPage(usercode);
            }

        })
    </script>
</body>

</html>