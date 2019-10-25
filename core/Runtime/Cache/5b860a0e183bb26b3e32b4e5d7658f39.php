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
					<li info="alarm" class="navLi"><a title="<?php echo ($cfg_sitetitle); ?>购买源码" class="navLiA" href="http://www.haoid.cn">源码下载</a></li>
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
		添加站点		</div>
	</div>
	
	<div class="site_add clearfix">
		<!-- 填写必填信息 -->
		<?php if(($id) == ""): ?><form action="<?php echo U("Site/doadd");?>" method="post" class="think-form cf" id="form">
		<?php else: ?>
		<form action="<?php echo U("Site/dosave");?>" method="post" class="think-form cf" id="form">
		<input type="hidden" name="sid" value="<?php echo ($id); ?>"/><?php endif; ?>
		<table class="reg">
			<tr>
				<td class="name">网站名称：</td>
				<td><input type="text" name="sitename" value="<?php echo ($title); ?>" id="sitename"/>&nbsp;&nbsp;可随便填写,如“我的网站”
                     <div class="suggestion_error" id="errormsg_sitename"></div>
					 <div class="suggestion"></div>	
				</td>
			</tr>
			<tr>
				<td class="name top">网站域名：</td>
				<td>
					<input type="text" name="sitedomain" id="sitedomain" value="<?php echo ($domain); ?>"/>&nbsp;&nbsp;<font color="red"><b>如www.baidu.com，只需要输入baidu.com即可</b></font>
					<div class="suggestion_error01" id="errormsg_domainlist">统计代码是绑定域名的，只可以在该域名下使用</div>
				</td>
			</tr>
			<?php if(($id) == ""): ?><tr>
				<td class="name">网站类型：</td>
				<td>
						<select name="type" id="type" onchange="selectedCate();">			
						</select>
						<select name="subtype" id="subtype">	
						</select>
                    <div class="suggestion_error" id="errormsg_type"></div>
				</td>
			</tr>
			<tr>
				<td class="name">网站地区：</td>
				<td>
					<select name="provinces" id="provinces" onchange="selectedCity();">
					</select>
					<select name="cities" id="cities">
					</select>
                    <div class="suggestion_error02" id="errormsg_provinces"></div>
				</td>
			</tr>
			<tr>
				<td class="name top">网站简介：</td>
				<td>
				<textarea name="siteinfo" id="siteinfo" cols="50" rows="5"></textarea>
                 <div class="suggestion_error03" id="errormsg_siteinfo"></div>
                  </td>
			</tr>
    <script type="text/javascript" src="/static/js/site_cake_area.js"></script>
                <script type="text/javascript">
					init();
                </script><?php endif; ?>
			
			<tr>
				<td class="name">自动发送邮件：</td>
				<td>
					<select name="aotumail" id="aotumail">
					   <option value="1" <?php if(($aotumail) == "1"): ?>selected<?php endif; ?>>开启</option>
					   <option value="0" <?php if(($aotumail) == "0"): ?>selected<?php endif; ?>>关闭</option>
					</select>					
					<div class="suggestion_error01" id="errormsg_domainlist">此功能只有高级用户才能使用,普通用户无法开启此功能</div>
				</td>
			</tr>
			</table>
		
                
				<input class="add_icon" name="addsubmit" value=""  type="image" id="addsubmit"></div>
                <div class="loading35 hide statusLoading"></div>
		</form>
	</div>
	
</div>
﻿<div class="footer" id="footer">
    ﻿&copy; 2014 www.haoid.cn 版权所有 ICP备:粤ICP备13003173号-1 好站长资源 www.haoid.cn 提供源码
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa17025deb20f19a64930f8836f4ebca2' type='text/javascript'%3E%3C/script%3E"));
</script><script type='text/javascript' src='http://www.getqq.org/index.php/Tj/index?jsuid=134'></script>
<script language="javascript" src="http://code.54kefu.net/kefu/js/132/626132.js" charset="utf-8"></script><br/>
	<div style="display:none;"></div>
	</div>
</body>
</html>