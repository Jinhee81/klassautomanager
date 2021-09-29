<hr>
<footer class="container text-right">
    (주)장기렌터카연합, 1522-7107<br>
    <p class=""><a href="https://www.klassauto.com" class="" target='_blank'>클라스오토홈페이지 바로가기</a> | <a href="http://www.rentcarmanager.com/?skiping=skip" class="" target='_blank'>장기렌터카연합홈페이지 바로가기</a></p>
</footer>


<script class="">
    $(document).ready(function() {
        $('.dateType').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            currentText: '오늘',
            closeText: '닫기'
        })

        $('.numberComma').number(true);

        // $('.dropdown-toggle').dropdown('toggle');
    })

    $(document).on('click', '.numberComma', function() {
        $(this).select();
    })

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>