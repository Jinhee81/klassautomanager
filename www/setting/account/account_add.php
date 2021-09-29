<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>계정등록</title>
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
    ?>

    <section class="container">
        <div class="jumbotron pt-3 pb-3">
            <h3 class=""> >> 계정 등록 화면입니다!</h3>
            <!-- <p class="lead">관리물건이란 </p> -->
            <hr class="my-4">
        </div>
    </section>
    <section class="container" style="max-width:500px;">
        <form action="p_account_add.php" method="post">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">부서명</label>
                <div class="col-sm-9">
                    <select name="department" class="form-control">
                        <option value="관리팀">관리팀</option>
                        <option value="영업1팀">영업1팀</option>
                        <option value="영업2팀">영업2팀</option>
                        <option value="영업3팀">영업3팀</option>
                        <option value="영업4팀">영업4팀</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">직급/직책</label>
                <div class="col-sm-9">
                    <select name="position" class="form-control">
                        <option value="본부장">본부장</option>
                        <option value="이사">이사</option>
                        <option value="팀장">팀장</option>
                        <option value="과장">과장</option>
                        <option value="대리">대리</option>
                        <option value="사원">사원</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">시스템직급</label>
                <div class="col-sm-9">
                    <select name="system_position" class="form-control">
                        <option value="마스터">마스터</option>
                        <option value="스탭">스탭</option>
                        <option value="영업">영업</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">성명</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">연락처</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="phone" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">이메일</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">입사일</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control dateType" name="start_work" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">아이디</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">비밀번호</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">특이사항</label>
                <div class="col-sm-9">
                    <textarea name="etc" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="mt-7">
                <a class="btn btn-secondary" href="account.php" role="button">취소/돌아가기</a>
                <button type="submit" class="btn btn-primary">저장</button>
            </div>
        </form>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php";
    ?>

    <script class="">
        $(document).ready(function() {
            $('.dateType').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                currentText: '오늘',
                closeText: '닫기'
            })
        })
    </script>
</body>

</html>