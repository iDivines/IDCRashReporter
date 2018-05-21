<?php 
if(isset($_FILES["reports"]) == FALSE){
    echo "file nil";
    exit;
}

if($_FILES["reports"]["error"] > 0){
    echo "file error";
    exit;
}

$uploadFile = [
    'Upload' => $_FILES["reports"]["name"],
    'Type' =>  $_FILES["reports"]["type"],
    'Size' =>  $_FILES["reports"]["size"] / 1024 ."Kb",
    'Temp file' => $_FILES["reports"]["tmp_name"]
];

date_default_timezone_set('PRC');
$date = date("Y-m-d");
$time = date("H-i-s");
$rand = rand();

//serverpath/crash/upload/2018-09-12/09-09-12-rand.log
$filePath = $_SERVER['DOCUMENT_ROOT']."/crash/upload/".$date."_".$time."#".$rand.".log";

if(file_exists($filePath)){
    echo "file already exists";
}else{
    move_uploaded_file($_FILES["reports"]["tmp_name"], $filePath);
    echo json_encode($uploadFile);
}
?>