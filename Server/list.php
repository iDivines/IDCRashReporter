<?php 
$path = $_SERVER['DOCUMENT_ROOT']."/crash/upload";
$files = scandir($path);

$count = count($files);
if($count > 50){
    $count = 50;
    echo "<h3>最近50条数据</h3>";
}

for ($i=0; $i<$count; $i++) {
    $file = $files[$i];
    $tmp = $file;
    $file = urlencode($file);
    if(substr(strrchr($file, '.'), 1) == 'log'){
        echo "<li><a href='detail?fileName=$file'>".$tmp."</a></li>";
    }
}
?>