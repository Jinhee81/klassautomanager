<?php
ini_set("allow_url_fopen", 1);
include "simple_html_dom.php";


$urlString = "https://auto.danawa.com/leaserent/?Work=priceCompare&Trims=69261&ProdType=R&Period=36&PriceType=2";

$data = file_get_html($urlString);

// echo $data;
$brand_name = $data -> find('#rentLeaseEstimateBrand',0) -> plaintext;

$model_name = $data -> find('#rentLeaseEstimateModel',0)->plaintext;

    echo $model_name; echo "<br>";
?>