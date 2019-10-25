<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title><?php echo ($cfg_sitetitle); ?>提示信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base target='_self'/>
<style>div{line-height:160%;}</style></head>
<body leftmargin='0' topmargin='0' bgcolor='#FFFFFF'>
<center>

<br />
<div style='width:450px;padding:0px;border:1px solid #DADADA;'><div style='padding:6px;font-size:12px;border-bottom:1px solid #DADADA;background:#DBEEBD url(/plus/img/wbg.gif)';'><b><?php echo ($cfg_sitetitle); ?> 提示信息！</b></div>
<div style='height:130px;font-size:10pt;background:#ffffff'><br />
<?php if(isset($message)): echo($message); ?>

<?php else: ?>

<?php echo($error); endif; ?>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p></div>

</center>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>