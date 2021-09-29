<?php
if ($_SESSION['system_position'] == '마스터') {
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav2.php";
}
if ($_SESSION['system_position'] == '영업') {
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav_s.php";
}
if ($_SESSION['system_position'] == '스탭') {
    include $_SERVER['DOCUMENT_ROOT'] . "/view/nav_m.php";
}
