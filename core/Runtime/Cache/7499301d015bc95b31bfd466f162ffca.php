<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="网站访客QQ号信息精准统计系统" />
<meta name="description" content="<?php echo ($cfg_sitetitle); ?> - 访客信息统计系统" />
<title>邮箱导出_<?php echo ($cfg_seotitle); ?></title><link rel="Shortcut Icon" href="/static/img/favicon.ico" />
<link rel="Bookmark" href="/static/img/favicon.ico" />
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<link href="/static/css/site_add.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/js/showdate.js"></script>
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
		邮箱导出		</div>
	</div>
	
	<div class="site_add clearfix">
		<!-- 填写必填信息 -->
		
		<form action="<?php echo U("User/expor");?>" method="post" class="think-form cf" id="form">
				
		<table class="reg">
		
			<tr>
				<td class="name">开始时间：</td>
				<td><input type="text" id="st" name="st" onclick="return Calendar('st');" value="" class="text" style="border:1px solid #888; vertical-align:middle;width:85px;"/>
                     <div class="suggestion_error" id="errormsg_sitename"></div>
					 <div class="suggestion"></div>	
				</td>
			</tr>
			<tr>
				<td class="name">结束时间：</td>
				<td><input type="text" id="et" onclick="return Calendar('et');" value="" name="et" class="text" style="border:1px solid #888; vertical-align:middle;width:85px;"/>
                     <div class="suggestion_error" id="errormsg_sitename"></div>
					 <div class="suggestion"></div>	
				</td>
			</tr>
			
			<tr>
				<td class="name top">导出站点：</td>
				<td>
					<select name="webid">			
<option value="0">全部</option>					
					  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?><option value="<?php echo ($id["id"]); ?>"><?php echo ($id["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>&nbsp;&nbsp;<font color="red"><b></b></font>
					<div class="suggestion_error01" id="errormsg_domainlist"></div>
				</td>
			</tr>
			<!-- <tr>
				<td class="name top">邮件模板：</td>
				<td>
				<select name="tplid">					 
					  <?php if(is_array($tpllist)): $i = 0; $__LIST__ = $tpllist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?><option value="<?php echo ($id["id"]); ?>"><?php echo ($id["title"]); ?>(<?php echo ($id["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
                 <div class="suggestion_error03" id="errormsg_siteinfo"></div>
                  </td>
			</tr> -->
					</table>
		
                
				 <input type="submit" onclick="return selectDate()" value="确认导出" /></div>
                <div class="loading35 hide statusLoading"></div>
		</form>
	</div>
	
</div>
﻿<div class="footer" id="footer">
    ﻿&copy; 2014 www.sjzxhdn.cn 版权所有 ICP备:粤ICP备13003173号-1 石家庄新华电脑 

	</div>
</body>
</html>
<SCRIPT language=javascript>


function selectDate(){
		var st=document.getElementById('st').value;
		var et=document.getElementById('et').value;
		if(st == ""){
		    alert("请选择开始时间");
		    return false;
		}
		if(et == ""){
		    alert("请选择结束时间");
		    return false;
		}
		
		return duibi(st,et);
}

function duibi(a, b) {
    var arr = a.split("-");
    var starttime = new Date(arr[0], arr[1], arr[2]);
    var starttimes = starttime.getTime();

    var arrs = b.split("-");
    var lktime = new Date(arrs[0], arrs[1], arrs[2]);
    var lktimes = lktime.getTime();

    if (starttimes > lktimes) {

        alert('开始时间大于结束时间，请检查');
        return false;
    }
    else
        return true;

}
</SCRIPT>