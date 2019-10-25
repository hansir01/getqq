<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="网站访客QQ号信息精准统计系统" />
<meta name="description" content="<?php echo ($cfg_sitetitle); ?> - 访客信息统计系统" />
<title>获取统计代码_<?php echo ($cfg_seotitle); ?></title>
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<link href="/static/css/site_setup_get_code.css" rel="stylesheet" type="text/css" />
<script>
function oCopy(obj){
	obj.select();
	js=obj.createTextRange();
	js.execCommand("Copy")
	}
</script> 
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
	<div class="siteSettitle">站点资料设置</div>
	<div id="leftNavRootEl" class="left-nav">
        <!-- 站长版本信息 -->
        <div class="all-nav">
				<div class="nav01"><a href="<?php echo U("Site/lists");?>">站点列表</a></div>
								<div class="nav01ed">获取站点代码</div>
						</div>
                <a href="<?php echo U("User/index");?>" class="goto_button"></a>
        		<input type="hidden" value="getcode" id="leftNavMethodName">
</div>	
	<div id="site_setup_get_code" class="site_setup_get_code">	
		<div class="mainContent">
			<div class="tabContent">
				<ul class="tabTitle">
					<li class="selected">统计代码</li>
				</ul>
				
				<div class="pcTongji">					
					<div class="inforTitle">
						请任选一种形式的代码，将其粘贴到您网站所有页面的&lt;/body&gt;前，添加成功后立即开始统计。
					</div>
					
					<div style="line-height:22px;color:#6A6A6A;padding-left: 15px;">
						•&nbsp;加载统计代码不会影响您网页的正常显示和加载速度,请放心添加。<br>
						•&nbsp;为了保证统计数据的准确性，请将我们的统计代码放置在其它统计代码的前面。<br>
						•&nbsp;如果您的网站有动态内容，可以使用常用的包含功能或模板。
					</div>

						<!-- 站长获取代码 -->
						<div style="height:236px;" class="code">
							<div style="height:96px;float:left;">
								<div class="middleCode">
									<textarea id="textareaIdText42" rows="3" onclick="oCopy(this)" cols="50" name="textarea" readonly="true"><?php echo ($js); ?></textarea>
									<div class="clipboardTip">您的浏览器不支持此功能,请手工复制文本框中内容</div>
								</div>
							</div>
						</div>
						<p class="desc">为站点 <span class="getCodeSiteName"><?php echo ($title); ?>(http://<?php echo ($domain); ?>)</span> 获取统计代码</p>
					</div>
			</div>
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