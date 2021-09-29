<!-- salse nav, 여긴 최저가추출/계정목록/차종코드가 없음-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navCollapse">
        <span class="navbar-toggler-icon"></span>
        <!--이건 화면좁아질때 위에 짝대기 세개인거 -->
    </button>
    <div class="collapse navbar-collapse" id="navCollapse">
        <ul class="navbar-nav mr-auto">
            <li href="nav-item">
                <a class="nav-link nav-link-head" href="/kservice/note/note2.php">상담</a>
            </li>
            <li href="nav-item">
                <a class="nav-link nav-link-head" href="/kservice/note_customer/customer.php">고객</a>
            </li>
            <li href="nav-item">
                <a class="nav-link nav-link-head" href="/kservice/note_estimate/estimate.php">견적</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <span class="navbar-text">
                &nbsp;<?= $_SESSION['name'] ?>님, 안녕하세요.
            </span>&nbsp;&nbsp;
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <a class="btn btn-outline-success" href="/logout.php" role="button">로그아웃</a>
        </form>
    </div>
</nav>