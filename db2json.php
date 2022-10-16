<?php
/*
{
    "chart":{
        "caption":"Jumlah Data",
        "subCaption":"Beasiswa Nasional Vocaship",
        "xaxisName":"Bulan",
        "yAxisName":"Jumlah Data",
        "theme":"fint"
    },
    "data":[
        {"label":"Jan","value":"1000"},
        {"label":"Feb","value":"2000"},
        {"label":"Mar","value":"1500"},
        {"label":"Apr","value":"2500"},
        {"label":"May","value":"4500"}
    ]
}*/

$x1 = array(
    "caption"=>"Jumlah Data",
    "subCaption"=>"Beasiswa Internasional Vocaship",
    "xaxisName"=>"Bulan",
    "yAxisName"=>"Jumlah Data Beasiswa",
    "theme"=>"fint");

  $x2 = array();

  $kon = mysqli_connect("localhost","root","","vocaship");
  $hsl = mysqli_query($kon,"SELECT * FROM fusion");
  while($r = mysqli_fetch_assoc($hsl)){
    $datum = array("label"=>$r['bulan'],"value"=>$r['jumlah']);
    array_push($x2,$datum);
  } 

$x = array(
    "chart"=>$x1,
    "data"=>$x2
);

$y = json_encode($x);
echo $y;
?>