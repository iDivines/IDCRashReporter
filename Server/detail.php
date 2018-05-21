<?php

$filename = $_GET['fileName'];
$filename = urldecode($filename);

$path = $_SERVER['DOCUMENT_ROOT']."/crash/upload/$filename";
echo $path;

if (file_exists($path)) {
$body = file_get_contents($path);
    $body = str_replace("\\n","<br>",$body);
    print '<pre>'.$body.'</pre>'; //输入文件内容
} else {
    print "文件不存在 $path";
}
?>