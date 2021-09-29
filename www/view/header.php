<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>klassauto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <!-- <meta property="og:image" content="https://www.instagram.com/"> -->

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:700|Nanum+Gothic" rel="stylesheet">

    <!-- 폰트어썸 css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- 달력 css -->
    <link rel="stylesheet" href="/inc/css/jquery-ui.min.css">

    <link rel="stylesheet" href="/inc/css/customizing.css?<?=date('YmdHis')?>">
    <!-- <script type="text/javascript" src="/inc/js/jquery-3.3.1.min.js?<?=date('YmdHis')?>"></script> -->

    <!-- footer에 넣은거가 안좋아서 head로 옮김 21.5.12 -->
    <script src="/inc/js/jquery-3.3.1.min.js"></script>
    <script src="/inc/js/jquery-ui.min.js"></script>
    <script src="/inc/js/popper.min.js"></script>
    <script src="/inc/js/bootstrap-4.1.3.min.js"></script>
    <script src="/inc/js/datepicker-ko.js"></script>
    <script src="/inc/js/date.format.min.js"></script>
    <script src="/inc/js/jquery.number.min.js"></script>
    <script src="/inc/js/etc/form.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navCollapse">
            <span class="navbar-toggler-icon"></span>
            <!--이건 화면좁아질때 위에 짝대기 세개인거 -->
        </button>
        <div class="collapse navbar-collapse" id="navCollapse">
            <ul class="navbar-nav mr-auto">
                <li href="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link-head" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        최저가추출
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/spec/spec0.php">최저가추출</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link-head" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        차종코드
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/data/1brand.php">브랜드코드</a>
                        <a class="dropdown-item" href="/data/2model.php">모델코드</a>
                        <a class="dropdown-item" href="/data/3lineup.php">라인업코드</a>
                        <a class="dropdown-item" href="/data/4trim.php">트림코드</a>
                        <a class="dropdown-item" href="/data/5danawa.php">다나와코드</a>
                        <!-- <div class="dropdown-divider"></div> -->
                    </div>
                </li>
                <li href="nav-item">
                    <a class="nav-link nav-link-head" href="/kservice/note/note.php">상담노트</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="navbar-text">
                    <a href="/kservice/setting/account.php">
                        <!-- <i class="fas fa-cog"></i>&nbsp;계정목록</a> -->
                </span>&nbsp;
                <span class="navbar-text">
                    &nbsp;<?=$_SESSION['name']?>님, 안녕하세요.
                </span>&nbsp;&nbsp;
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                <a class="btn btn-outline-success" href="/logout.php" role="button">로그아웃</a>
            </form>
        </div>

    </nav>
