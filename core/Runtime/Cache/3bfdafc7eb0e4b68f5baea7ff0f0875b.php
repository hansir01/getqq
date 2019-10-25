<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="网站访客QQ号信息精准统计系统" />
<meta name="description" content="<?php echo ($cfg_sitetitle); ?> - 访客信息统计系统" />
<title>用户注册_<?php echo ($cfg_seotitle); ?></title>
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<link href="/static/css/site_add.css" rel="stylesheet" type="text/css" />
<style>
/* 发布表单 */
.zzshang-form {
	padding: 15px;
	font-size: 16px;
	border: 1px solid #D4D4D4;
	background-color: #FFF;
}

/* 发布表单-头部用户信息栏 */
.zzshang-form .hd {
	position: relative;
	margin: 0 0 20px 12px;
	padding-left: 60px;
}
.zzshang-form .hd-info {
	height: 22px;
	line-height: 25px;
}
.zzshang-form .hd-info .time {
	margin-left: 20px;
	color: #C0C0C0;
}
.zzshang-form .hd-title {
	height: 22px;
	line-height: 35px;
	color: #C0C0C0;
}

/* 发布表单-表单项 */
.zzshang-form table.bd {
	width: 100%;
	border-spacing: 0 10px;
}
.zzshang-form th {
	padding-right: 20px;
    width: 77px;
	height: 30px;
	line-height: 30px;
	font-weight: normal;
	vertical-align: top;
	text-align: right;
}
.zzshang-form .must {
	margin-right: 6px;
	font-style: normal;
	color: #00A651;
	vertical-align: -3px;
}
.zzshang-form .text {
	padding: 3px;
    width: 340px;
    height: 24px;
    line-height: 24px;
	border: 1px solid #D4D4D4;
}
.zzshang-form select {
	padding: 3px;
    height: 28px;
	border: 1px solid #CCCCCC;
}
.zzshang-form .add-remark {
    border: 1px solid #CCCCCC;
}
.zzshang-form .add-remark textarea {
    padding: 0;
    width: 100%;
    height: 80px;
    border: 0 none;
}
.zzshang-form .verify {
	margin-right: 5px;
    padding: 3px;
    width: 100px;
    height: 24px;
    line-height: 24px;
    font-size: 16px;
	border: 1px solid #CCCCCC;
}
.zzshang-form .verifyimg {
    margin-top: 9px;
}
.zzshang-form .submit {
    padding: 0 24px;
    height: 30px;
    line-height: 21px;
    font-size: 16px;
    color: #FFFFFF;
    cursor: pointer;
    border: 0 none;
	background-color: #348FD4;
}
.zzshang-form .submit:hover {
	background-color: #2F81BF;
}
.zzshang-form .init-color {
	color: #8E8E8E;
}
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
					<li info="alarm" class="navLi"><a title="<?php echo ($cfg_sitetitle); ?>购买源码" class="navLiA" href="http://www.haoid.cn">源码下载</a></li>
					<li class="borderLi"></li>
			</ul>
				<div class="siteSetNav"><span class="icon"></span><a href="<?php echo U("User/pass");?>" class="text">修改密码</a></div>		
		  </div>
		</div>
	</div>
</div>
<div class="section">	
	<div>
   <form action="<?php echo U("Public/doreg");?>" method="post" class="zzshang-form cf" id="form">
        <!-- 注册 -->
        <div class="login">
            <!-- 头部提示 -->
            <div class="hd">
             <strong>用户注册</strong></div>
            <!-- 头部提示 -->
            
            <!-- 表单项 -->
            <table class="bd">
				                <tr>
                    <th>用户名</th>
                    <td>
                        <input class="text" type="text" name="username" value=""  datatype="*1-16" nullmsg="请填写用户名" errormsg="请填写1-16位用户名" />&nbsp;&nbsp;<span>已有帐号？点击<a href="<?php echo U("Index/login");?>">[马上登录]</a></span>
                        <span class="Validform_checktip"></span>
                    </td>
                </tr>
				<tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>密码</th>
                    <td>
                        <input class="text" type="password" name="password" datatype="*6-20" nullmsg="请填写密码" errormsg="密码为6-20位"/>
                        <span class="Validform_checktip"></span>
                    </td>
                </tr>
				<tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>确认密码</th>
                    <td>
                        <input class="text" type="password" name="repassword" datatype="*" nullmsg="请填确认密码" errormsg="您两次输入的密码不一致" recheck="password"/>
                        <span class="Validform_checktip"></span>
                    </td>
                </tr>
				<tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>邮箱</th>
                    <td>
                        <input class="text" type="text" name="email" value="" datatype="e" nullmsg="请填写邮箱" errormsg="请填写正确格式的邮箱" ajaxurl="/member/checkUserEmailUnique.html"/>
                        <span class="Validform_checktip"></span>
                    </td>
                </tr>
				<tr>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td>
                        <input class="submit" type="submit" value="马上免费注册" />&nbsp;&nbsp;<span>请认真全部输入完毕后进行注册</span>
                    </td>
                </tr>
            </table>
            <!-- /表单项 -->
        </div>
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