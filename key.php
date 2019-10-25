<?php
$key = md5("domain=cctvpinpai.com&tnow=2016-07-08");
$key = base64_encode($key);
$key = $key."time=2016-07-08";
echo $key;
?>