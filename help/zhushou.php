<?php
//error_reporting(0);
////Header("Location: http://user.newqcc.com/zhushou.php");
//exit;
error_reporting(0);
header("Content-type: text/html; charset=gbk");
include("./class/class.qqhttp.helper.php");
define(QZONEMB,"yes_here");
if(PHP_VERSION < "4.1.0")
{
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}
@extract(daddslashes($_POST));
@extract(daddslashes($_GET));
$act=$act?$act:"step1";
$file="";
$ndir = str_replace("\\","/",dirname(__FILE__));
$cfg_user_dir=$ndir;
$qhttp = new QQHttp();
if($act=="help")
{
	$r = $qhttp->getVFCode();
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
	header('Content-type: image/jpeg');
	echo $r['img'];
	exit;
}
//判断是否在线，如果在线就exit，如果不在线就出登录
$qq="279376123";//1832813522 jsniccao,1536984591    1976257617   1935200465
$password="7074732lwb";//1569092071   
//header

	$r=$qhttp->checklogin($qq);
	//preg_match('/_Callback\(([\s\S]+)/',$r,$data);
	preg_match('/_Callback\(([\s\S]+)\)/',$r,$data);
	$alist=json_decode($data[1],true);
	if($alist[error][type]=="-50")
	{
	}
	else
	{
		ShowMsg("QQ助手已经登录~","javascript:;");
		exit;
	}
if($act == "step1")//开始登录
{
	$vc_type=$qhttp->getvc_type();
    $vbs=$vc_type[html];
	preg_match("/([0-9a-z]{48})/",$vc_type[html],$d_array);
	$vc_type=$d_array[1];

	include("inc/helper_step1.php");
}
elseif($act=="step2")//登录成功就一直在线吧!!
{
	$vc_type=$qhttp->getvc_type();
	preg_match("/([0-9a-z]{48})/",$vc_type[html],$d_array);
	$vc_type=$d_array[1];
	$r = $qhttp->login($_COOKIE['verifysession']);	
	$skey=$r[skey];
	$qhttp->checklogin($qq);

	ShowMsg("QQ助手登录成功~","zhushou.php");
	exit;
}
function Showmsg($msg,$gourl,$onlymsg=0,$limittime=0){
		$htmlhead  = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<base target="_self"/>
<title>提示消息</title>
<style type="text/css">
*{ margin:0; padding:0; font-size:12px; color:#666666; }
a,a:link    { color:#2288E3; text-decoration:none; }
a:hover   { text-decoration:underline; }
a:active  { color:#FF6666; }
a:focus   { outline:none;  }
.outer { margin:15% auto; width:500px;border:5px solid #FEE0E3; }
.inner { width:498px;border:2px solid #F14347; }
.inner h3 { margin:1px 1px 10px 1px;padding:0;line-height:200%; font-size:14px; text-indent:10px; color:#E72E32; background:#FAC7C8; }
.inner p { margin-bottom:10px; padding-left:20px;}
.inner ol{ display:block; margin:0 10px 10px 40px; }
.inner ol li { margin-bottom:10px; line-height:150%; }
.msg { font-size:14px;}
.btn {margin-right:5px;padding:1px 10px;height:21px;background:#FEC5C5;border-width:1px;color:#FFF;line-height:17px;letter-spacing:1px;vertical-align:middle;}
.top-line { margin:0 20px; padding:10px 0; border-top:1px solid #DDD; }
</style>
</head>
<body>
<script>
';
		$htmlfoot  = "</script>\r\n</body>\r\n</html>\r\n";
		
		if($limittime==0) $litime = 1000;
		else $litime = $limittime;
		
		if($gourl=="-1"){
			if($limittime==0) $litime = 5000;
			$gourl = "javascript:history.go(-1);";
		}
		
		if($gourl==""||$onlymsg==1){
			$msg = "<script>alert(\"".str_replace("\"","“",$msg)."\");</script>";
		}else{
			$func = "      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='$gourl'; pgo=1; }
      }\r\n";
			$rmsg = $func;
			$rmsg .= "document.write(\"<div class='outer'><div class='inner'><h3>QZONEMB.COM</h3>\");\r\n";
			$rmsg .= "document.write(\"<p class='msg'>\");\r\n";
			$rmsg .= "document.write(\"".str_replace("\"","“",$msg)."</p>\");\r\n";
			$rmsg .= "document.write(\"";
			if($onlymsg==0){
				if($gourl!="javascript:;" && $gourl!=""){ $rmsg .= "<div class='top-line'><input class='btn' value='如果你的浏览器没反应，请点击这里' type='button' onclick='javascript:window.location.href=\'".$gourl."\';'/>"; }
				$rmsg .= "<br/><br/></div>\");\r\n";
				if($gourl!="javascript:;" && $gourl!=""){ $rmsg .= "setTimeout('JumpUrl()',$litime);"; }
			}else{ $rmsg .= "</div></div>\");\r\n"; }
			$msg  = $htmlhead.$rmsg.$htmlfoot;
		}		
		echo $msg;
}
function daddslashes($string, $force = 0)
{
	if(!$GLOBALS["magic_quotes_gpc"] || $force)
	{
		if(is_array($string))
		{
			foreach($string as $key => $val)
			{
				$string[$key] = daddslashes($val, $force);
			}
		}
		else
		{
			#[将内容转化成无害信息]
			$string = addslashes($string);
		}
	}
	return $string;
}
exit;
//用户文件目录
//footer
?>