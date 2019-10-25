<?php
if(!defined('QZONEMB')) exit('Access Denied');
if(empty($file))
{
	$submiturl="zhushou.php";
}
else
{
	$submiturl="admin.php";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>助手登录</title>
<style type="text/css">
<!--
body { background-image: url(img/allbg.gif); }
-->
</style>
<script type="text/javascript" src="prototype.js"></script> 
<script language="javascript">
<!--
function checkSubmit()
{
  if(document.getElementById('verifycode').value==0 || document.getElementById('verifycode').value==""){
	   alert("请填入验证码！");
	   Field.focus('verifycode');
	   return false;
  }
  return true;
}
function changeimg()
		{
            $('vfcode').src = './<?php echo $submiturl;?>?file=showpic&act=help&vc_type=' + $('vc_type').value + '&uin=<?php echo $qq;?>&aid=15000101&r=' + Math.random();
		}
		//http://check.ptlogin2.qq.com/check?uin=13397625&appid=15000101&ptlang=2052&r=0.0682854294412476
-->
</script>
<style type="text/css">
*{ margin:0; padding:0; font-size:12px; color:#666666; }
a,a:link    { color:#2288E3; text-decoration:none; }
a:hover   { text-decoration:underline; }
a:active  { color:#FF6666; }
a:focus   { outline:none;  }
.outer { margin:15% auto; width:500px;border:5px solid #EAF4F8; }
.inner { width:498px;border:1px solid #66CCFF; }
.inner h3 { margin:1px 1px 10px 1px;padding:0;line-height:200%; font-size:14px; text-indent:10px; color:#111; background:#EAF4F8; }
.inner p { margin-bottom:10px; padding-left:20px;}
.inner ol{ display:block; margin:0 10px 10px 40px; }
.inner ol li { margin-bottom:10px; line-height:150%; }
.msg { font-size:14px;}
.btn {margin-right:5px;padding:1px 10px;height:21px;background:#37BAFB;border-width:1px;color:#FFF;line-height:17px;letter-spacing:1px;vertical-align:middle;}
.top-line { margin:0 20px; padding:10px 0; border-top:1px solid #DDD; }
</style>
</head>
<body topmargin="8">
<form name="form1" action="<?php echo $submiturl;?>?file=<?php echo $file;?>&act=step2" method="post" onSubmit="return checkSubmit();">

  <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="2">
	<tr> 
      <td height="24" colspan="4" class="bline"><table width="800" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
            <td width="100">&nbsp;QQ号：</td>
            <td><?php echo $qq;?>
              </td>
			  <td></td>
          </tr>
		  <tr> 
            <td width="100">&nbsp;验证码：</td>
            <td><input name="verifycode" type="text" id="verifycode" style="width:100">
              </td>
			  <td></td>
          </tr>
		  <tr> 
            <td width="100">&nbsp;验证码：</td>
            <td>
			<script type="text/javascript">
              document.write("<img id='vfcode' src='<?php echo $submiturl;?>?file=showpic&act=help&vc_type=<?php echo $vc_type;?>&uin=<?php echo $qq;?>&aid=15004501&r=",Math.random(),"' style='cursor:pointer;border:1px solid #e4eef9' onclick='changeimg()'>");</script>
			  <input type="hidden" id="vc_type" value="<?php echo $vc_type;?>">
              </td>
			  <td></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="56">
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr> 
            <td width="17%">&nbsp;</td>
            <td width="83%"><table width="214" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="115"><input type="submit" name="bt" value="提交" class="nbt" style="cursor:hand" id="f_submit"></td>
                  <td width="99"><input type="button" name="bt" value="重新载入" class="nbt" style="cursor:hand" onClick="location.reload();">
                  </td>
                </tr>
              </table></td>
          </tr>
        </table></td>
  </tr>
</table>
</form>
</body>
</html>