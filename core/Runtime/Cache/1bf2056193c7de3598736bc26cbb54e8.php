<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="网站访客QQ号信息精准统计系统" />
<meta name="description" content="<?php echo ($cfg_sitetitle); ?> - 访客信息统计系统" />
<title>添加站点_<?php echo ($cfg_seotitle); ?></title><link rel="Shortcut Icon" href="/static/img/favicon.ico" />
<link rel="Bookmark" href="/static/img/favicon.ico" />
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<link href="/static/css/site_add.css" rel="stylesheet" type="text/css" />
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
	<div style="margin:0 40px 10px 5px;height:30px;">
		<div style="line-height:30px;float:left;font-size: 14px;font-weight: bold;">
		修改密码		</div>
	</div>
	
	<div class="site_add clearfix">
		<!-- 填写必填信息 -->
		
		<form action="<?php echo U("User/dopass");?>" method="post" class="think-form cf" id="form">
		
		<table class="reg">
			<tr>
				<td class="name">原登录密码：</td>
				<td><input type="password" name="password" id="password"/>&nbsp;&nbsp;请输入登录密码
                     <div class="suggestion_error" id="errormsg_sitename"></div>
					 <div class="suggestion"></div>	
				</td>
			</tr>
			<tr>
				<td class="name top">新密码：</td>
				<td>
					<input type="password" name="newpass" id="newpass"/>&nbsp;&nbsp;<font color="red"><b>请输入新密码</b></font>
					<div class="suggestion_error01" id="errormsg_domainlist"></div>
				</td>
			</tr>
			<tr>
				<td class="name">重复新密码：</td>
				<td><input type="password" name="renewpass" id="renewpass"/>&nbsp;&nbsp;请重新输入一次新密码
                     <div class="suggestion_error" id="errormsg_sitename"></div>
					 <div class="suggestion"></div>	
				</td>
			</tr>
			</table>
		
                
				<input class="add_icon" name="addsubmit" value=""  type="image" id="addsubmit"></div>
                <div class="loading35 hide statusLoading"></div>
		</form>
	</div>
	
</div>
﻿<div class="footer" id="footer">
    ﻿&copy; 2014 www.sjzxhdn.cn 版权所有 ICP备:粤ICP备13003173号-1 石家庄新华电脑 

	</div>
</body>
</html>