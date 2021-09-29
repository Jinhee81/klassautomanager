<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>klassauto</title>
    <meta charset="utf-8">
    </meta>
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <!-- <meta property="og:image" content="https://www.instagram.com/"> -->

    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:700|Nanum+Gothic" rel="stylesheet">

    <link rel="stylesheet" href="inc/css/customizing.css?<?=date('YmdHis')?>">
    <script type="text/javascript" src="inc/js/jquery-3.3.1.min.js?<?=date('YmdHis')?>"></script>
</head>

<body>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        '크롬브라우저'에서 최적으로 작동합니다. 반드시 크롬브라우저에서 실행해주세요 ^__^ <a href="https://www.google.com/intl/ko/chrome/"
            class="alert-link" target="_blank">다운로드 바로가기</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="text-center pt-3">
        <img class="mb-4" src="inc/img/logo/login.jpg" alt="" width="20%" height="">
    </div>
    <div class="text-center container">
        <h1 class="h3 mb-3 font-weight-normal">클라스오토 매니저 사이트 접속을 환영합니다 :)</h1>
        <div class="text-center container" style="width:360px;">
            <form method="post" action="logincheck.php" class="form-signin">
                <div class="form-group">
                    <input type="text" name="id" class="form-control text-center" required placeholder="아이디를 입력하세요">
                    <input type="password" name="password" class="form-control text-center" required
                        placeholder="패스워드를 입력하세요">
                </div>
                <div class="top_margin"></div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button>
            </form>
        </div>
    </div>

    <?php
    include "view/footer.php";
    ?>

    <script>
    if (document.location.protocol == 'http:') {
        document.location.href = document.location.href.replace('http:', 'https:')
    }
    // 이건 서버에만 들어가있는 코드임. 로컬에서는 이렇게 하면 에러난다. 
    </script>
    <script src="inc/js/bootstrap.min.js"></script>

</body>

</html>