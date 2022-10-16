<?php

$x1 = array(
    "caption"=>"Jumlah Data",
    "subCaption"=>"Beasiswa Internasional",
    "xaxisName"=>"Bulan",
    "yAxisName"=>"Jumlah Data",
    "theme"=>"fint");
$x2 = array(
         array("label"=>"Agustus","value"=>"2"),
         array("label"=>"Juni","value"=>"1")
    );
$x = array(
    "chart"=>$x1,
    "data"=>$x2
);

$y = json_encode($x);
echo $y;
?>