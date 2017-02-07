<?php
require_once("templates/Common.php");

$common = new Common();
echo $common->header();
?>
               <iframe src='/help'>本页面使用了框架技术，但您的浏览器不支持框架技术，请升级您的浏览器以便访问该框架的内容！</iframe>
<?php
echo $common->footer();