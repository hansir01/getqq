<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content"网站访客qq统计,获取网站访客qq系统,网页访客QQ抓取采集" />
<meta name="description" content="网站访客qq统计系统是一款在线获取网站访客qq的数据营销软件,让访客真正的成为客户不浪费任何一个意向客户,抓取采集网页qq访客统计系统为你提升10倍业绩" />
<title><?php echo ($cfg_sitetitle); ?>_<?php echo ($cfg_seotitle); ?></title>
<link rel="Shortcut Icon" href="/static/img/favicon.ico" />
<link rel="Bookmark" href="/static/img/favicon.ico" />
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,p {font-size:12px;line-height:120%;font-family:"宋体";word-break: break-all}
input {font: 14px "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;;padding:6px 4px;vertical-align:middle;border:1px solid #CCCCCC;background:#F0F0F0;}
p	{line-height:16px;text-align:left;margin:6px 0px}
a	{color: #000000;text-decoration: none;}
a:hover	{color: #1562BF;text-decoration: none}
.a1	{color: #1562BF;text-decoration: none;}
.a1:hover	{color: #000;text-decoration: none;}
img {border:none;vertical-align:middle;}
div {text-align:left}
.left	{float: left;}
.right	{float: right;}
.fonts	{color:#1562BF}
.vcode	 {border: 1px solid #3C67BF;background:#DDE8FC;vertical-align: text-bottom;padding:6px;}
#allbody {width:760px;margin: 0 auto}
#it123	 {margin:12px 0px 9px 0px;}
#it123 p {line-height:17px;color:#666}
#userlogin	{height:270px;width:100%;}
#guestin	{height:270px;width:100%;}

table {border-collapse: collapse; border:none;table-layout:fixed;}
#mtop {width:100%;}
/*#mtop td {height:63px;border:2px solid #EEE;border-left:none;border-right:none;}*/
#mmenut a {padding:16px 0px;;font-family:"微软雅黑","宋体";font-size:15px;}
#mmenut {margin:0px 0px 0px auto;}
#mmenut td {text-align:center;height:58px;width:95px;border:none;border-top:2px solid #FFF;}
#mmenut td:hover {border-top-color:#D97E0F;}
#mmenut td:hover a {color:#D97E0F;}
#mmenut td.dq {border-top-color:#D97E0F;}
#mmenut td.dq a {color:#D97E0F;}

.bignum {color:#FDD703;font: bold 18px tahoma, Geneva, "Helvetica Neue", Arial, Helvetica, sans-serif;}

#iright	 {margin:36px 0px 0px 25px;padding:9px 9px 6px 9px;width:240px;border:0px solid #999;background:none;height:210px;}
.form	 {padding:6px 0px 3px 3px;margin:0px;color:#666;}
.btlogin {cursor:pointer;border:none;background-color:#31ABF4;width:82px;height:32px;float:right;font:14px "微软雅黑","宋体";color:#FFFFFF;}
.formtitle {font:14px '微软雅黑',宋体;border-bottom:1px solid #999;padding:0px 0px 3px 2px;}

#rreg {margin:20px 0px 0px 0px;text-align:center;text-indent:0px;padding:0px;}
#rreg a {padding:9px 61px 9px 62px;border:none;background-color:#FD6D03;font:16px '微软雅黑',宋体;color:#FFFFFF;letter-spacing:3px;}
#rreg a:hover {background-color:#FF9300;}

#abouts {width:960px;margin:30px auto;}
#abouts td {line-height:18px;vertical-align:top;text-align:left;color:#666;}

#bottom  {text-align: center;margin:3px auto 0px;padding:12px 0px 0px 0px;height:120px;background-color:#EDEDED; border-top:2px solid #D3D3D3;line-height:17px;color:#787878;}
#bottom a {color:#787878;}
#bottom a:hover {color:#000;}
.STYLE3 {color: #FF0000}
</style>
</head>
<body>
<div class="userLoginHeader" id="userLoginHeader"  >

﻿
			<div class="headerTop">
				<div style="margin:0 auto;max-width:1245px;">
					<div class="headerTopContent">
						<ul class="leftHeaderTop">
								<li class="topLi"><span class="icon1"></span><a class="text" id="comeIntoOldCnzz"><?php echo ($cfg_sitetitle); ?></a></li>
								<li class="borderLi">|</li>
								<li class="topLi">
								<span style="float:left;">
								欢迎您使用<?php echo ($cfg_sitetitle); ?>提供的访客统计系统&nbsp;&nbsp;					
								</span>
								</li>
						</ul>
						<ul class="rightHeaderTop">
						    <?php if(($_SESSION['uid']) == ""): ?><li class="linkLi"><a href="<?php echo U("Index/login");?>">[马上登录]</a></li><li class="borderLi">|</li><li class="linkLi"><a href="<?php echo U("Index/reg");?>">[注册帐号]</a></li>
                             <?php else: ?>
							 <li class="linkLi"><a href="<?php echo U("User/index");?>">[控制中心]</a></li><li class="borderLi">|</li><li class="linkLi"><a href="<?php echo U("Public/loginout");?>">[退出登录]</a></li><?php endif; ?>							 
						</ul>
					</div>
				</div>
			</div>
	<div class="headerMiddle">
		<div style="margin:0 auto;max-width:1245px;">
			<div class="headerMiddleContent">		
					<div class="headerMiddleLeft">				
						<a href=""  target="_blank">
							<img src="/static/img/main/logo.gif" border="0" />
						</a>		
					</div>
					<div class="headerMiddleRight">
							<ul class="navFeature">
								<!-- <li class="navFLi" style="padding: 0 0;">
									<a style="display:inline-block;width:50px;" class="link" href="/index.php?m=Index&a=help" target="_blank">
										<ul style="width:26px;margin:0 12px;">
											<li><div class="icon icon5"></div></li>
											<li><div class="text">帮助</div></li>
										</ul>
									</a>
								</li> -->				
								<li class="navFLi">
									<a class="link" href="<?php echo U("User/index");?>">
										<ul>
											<li><div class="icon icon2"></div></li>
											<li><div class="text">帐户</div></li>
										</ul>
									</a>
								</li>	
								<li class="navFLi" style="_width:48px;">
									<a class="link" href="<?php echo U("Site/lists");?>">
										<ul>
											<li><div class="icon icon1"></div></li>
											<li><div class="text">站点列表</div></li>
										</ul>
									</a>
								</li>
							</ul>
					</div><!--/headerMiddleRight-->
			</div>
		</div>
	</div>
		<div class="headerBottom">
		<div style="margin:0 auto;max-width:1245px;">
		<div class="headerBottomContent">
			<ul class="headerNavContent">
				<li info="report" class="navLi"><a title="返回<?php echo ($cfg_sitetitle); ?>首页" href="/" class="navLiA">首页</a></li>
					<li class="borderLi"></li>
			</ul>
				<div class="siteSetNav"><span class="icon"></span><a href="<?php echo U("User/pass");?>" class="text">修改密码</a></div>		
		  </div>
		</div>
	</div>
</div>
<div class="section">
	<div class="site_list">
<!--top1-->
<div style="background-color:#005EAC;height:352px;" id="top2">
 <div style="margin:auto;width:960px;height:352px;" id="topface">
	  <div style="float:left;width:652;height:352px;position: relative;" id="face">
		   <img usemap="#Mapface" alt="杜绝广告/流量浪费" src="/static/img/index_back.png">
		   <map name="Mapface">
			 <!--area title="系统详细介绍" alt="系统详细介绍" href="/yanshi/yanshi.html" coords="438,255,582,289" shape="rect"-->
		   </map>

		   <div style="position: absolute;top:187px;left:37px;height:69px;width:538px;line-height:20px;">
				<?php echo ($cfg_sitetitle); ?>是一家从事精准营销数据统计的服务商，首款产品支持精准获取到<span style="color:red;">网站访问者QQ号</span>数据！特别适用于电子商务、数据分析类网站！操作方法也很简单：只需要把一段js代码放入网站里即可获取，即可<span style="color:red;"></span>轻松实现有访问者就弹出提醒访客QQ，让你可以很精准的进行产品的二次营销！杜绝流量浪费！
		   </div>
		   <div style="position: absolute;top:303px;left:20px;height:30px;width:500px;line-height:20px;color:#FFF;font-size:14px;">
		   注册站长 <span class="bignum"><?php echo getCount("alluser");?></span> &nbsp;  统计网站 <span class="bignum"><?php echo getCount("allsite");?></span>
		   </div>
	  </div>

  <div style="float:right;width:308px;height:352px;background:url('/static/img/index_back2.png') no-repeat;" id="login">
  <!--右侧内容-->
  <?php if(($_SESSION['uid']) == ""): ?><div id="iright">
   <div id="userlogin">
		<div class="formtitle">用户登录</div>
					<form class="form" method="post" action="<?php echo U("Public/dologin");?>" id="f1">
					<p>用户名：<span style="float:right;margin-right:3px;">[<a class="a1" href="<?php echo U("Index/reg");?>" tabindex="5">注册一个帐号</a>]</span><br>
					<input style="width:225px" id="username" name="username" tabindex="1"><script type="text/javascript">document.getElementById("uname").focus()</script></p>
					<p>密码：<span style="float:right;margin-right:3px;">[<a class="a1" href="#" onclick="alert('忘记密码请联系客服处理');" tabindex="5">忘记了密码？</a>]</span><br>
					<input type="password" style="width:225px" id="password" name="password" tabindex="2"></p>
					<input type="submit" class="btlogin" value=" 登 录 " tabindex="4">
					<p style="padding:7px 0px;text-indent: -3px;">输入完毕后点击-></p>
					<p class="STYLE3" style="padding:6px 0px 6px 0px;border-top:1px solid #CCC;"><a class="a1" href="http://wpa.qq.com/msgrd?v=3&uin=1745918090&site=zzsoft&menu=yes"></span></p>
					</a><span class="STYLE2">
					</form>		
   </div>
  </div>
  <!--右侧登录框结束-->
  <div id="rreg"><a title="立即注册" href="http://www.getqq.org/index.php/Index/reg.html">立即注册</a></div>  
  <?php else: ?>
   <div id="iright">
     <div id="userlogin">
       <div class="formtitle">欢迎您回来</div>
	   <p>登录帐号：<?php echo (session('username')); ?> &nbsp;&nbsp;<a href="<?php echo U("Public/loginout");?>">[退出帐号]</a></p>
	   <p>已创建站点数：<?php echo login("sitecount");?></p>
	   <p>本次登录IP：<?php echo login("loginip");?></p>	   
	   <p>上次登录时间：<?php echo (date("Y-m-d H:i:s",session('oldlogintime'))); ?></p>
	   <p>上次登录IP:<?php echo (session('oldloginip')); ?></p>		
   </div>
  </div>
  <!--右侧登录框结束-->
  <div id="rreg"><a title="返回统计中心" href="<?php echo U('User/index');?>">返回统计中心</a></div><?php endif; ?>
  </div>
 </div>
</div>
<!--/top1-->

<!--about-->
<div id="abouts">
	<table>
		<tbody>
			<tr>
			<td style="width:63px;"><img src="/static/img/index_icon1.gif"></td>
			<td style="width:252px;padding-right:8px;">
			  <img style="margin-bottom:12px;" alt="您还在守株待兔吗？" src="/static/img/index_tt1.gif"><br>
				您是否还在大量的购买广告/流量，然后守株待兔等客户吗？您知道有多少人愿意去主动咨询吗？您知道您每天在丢失很多潜在客户吗？
			</td>
			<td style="width:63px;"><img src="/static/img/index_icon2.gif"></td>
			<td style="width:252px;padding-right:8px;">
			  <img style="margin-bottom:12px;" alt="精准的客户统计" src="/static/img/index_tt2.gif"><br>
			   通过<?php echo ($cfg_sitetitle); ?>神奇的访客统计系统帮您直接把潜在客户的QQ统计到，让我们去主动、精准、极速的去营销！
			</td>
			<td style="width:63px;"><img src="/static/img/index_icon3.gif"></td>
			<td style="width:251px;">
			  <img style="margin-bottom:12px;" alt="实时监控网站客户QQ" src="/static/img/index_tt3.gif"><br>
			  俗话说：趁热打铁！通过配套的《实时监控网站客户QQ》即可自动提醒您当前访问者的QQ！精准且极速的营销产品！
			</td>
			</tr>
		</tbody>
	</table>
</div>
<!--/about-->


	</div>
</div>
<div class="footer" id="footer">
    ﻿&copy; 2014 www.sjzxhdn.cn 版权所有 ICP备:粤ICP备13003173号-1 石家庄新华电脑 

	</div>

</body>
</html>