<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="网站访客QQ号信息精准统计系统" />
<meta name="description" content="<?php echo ($cfg_sitetitle); ?> - 访客信息统计系统" />
<title>访客列表_<?php echo ($cfg_seotitle); ?></title>
<link rel="Shortcut Icon" href="/static/img/favicon.ico" />
<link rel="Bookmark" href="/static/img/favicon.ico" />
<link href="/static/css/siteList.all.css" rel="stylesheet" type="text/css" />
<link href="/static/css/report.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://common.cnblogs.com/script/jquery.js"></script>
<script>
 function del(id){
     if (confirm("确认要删除？")) {            
         $.post('<?php echo U('User/delmail');?>', { id:id },function(status) {alert(status.info);}, "json");
   }
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
			</ul>
				<div class="siteSetNav"><span class="icon"></span><a href="<?php echo U("User/pass");?>" class="text">修改密码</a></div>		
		  </div>
		</div>
	</div>
</div>
<div class="section">
<div id="leftAllNavRoot" class="left-nav">
	<div id="left_common_nav_report" class="common-nav-open hide"></div>
	<div id="left_all_nav" class="all-nav">			
		<div class="nav01"><a nav="site|overview" class="leftNav">导航菜单</a></div>        		
		<div class="nav-open main_nav">统计列表</div>
		<div id="meuqipao" class="open">
			<ul info="flow" class="main_nav_sub">
               <div class="showdivqipao">
                   <li class="showlabel" >
					<a href="<?php echo U("User/index");?>" class="leftNav">访客列表</a>
					<span class="ty"  style="display: none;">
						<a class="left_a_today">今</a>
						<a class="left_a_yesterday">昨</a>
					</span>
					</li>
               </div>
				<li>
					<a href="<?php echo U("Site/lists");?>" class="leftNav">站点列表</a>
				</li>
				<li>
					<a href="<?php echo U("Site/add");?>" class="leftNav">添加站点</a>
				</li>
				
            </ul>
		</div>		
 </div>
	 	 <div class="setup-nav">
			<div class="title_open">设置</div>
			<ul>
			    <li><a href="<?php echo U("User/expor");?>"> 访客邮件导出</a></li> 
			   <li><a href="<?php echo U("User/mailtpl");?>"> 邮件内容设置</a></li> 
			   <li><a href="<?php echo U("User/mail");?>"> 邮件发送配置</a></li>
			   <li><a href="<?php echo U("User/pass");?>"> 修改密码</a></li>
	            <li><a href="<?php echo U("Public/loginout");?>"> 退出系统</a></li>
			</ul>
         </div>
</div>
	<div class="rightContainer" id="rightContainer"><div class="flow_detail">
	<div id="rightTopTitle" class="right_top_title">
	 	<span id="right_top_title">访客列表</span>	
	<a class="help rightHeaderTip" title="提供访客的详细访问记录">&nbsp;</a>
</div>

	
<div id="flow_detail_report" class="report_data">
	<div class="report_title">
		<form action="index.php" method="GET" id="form">
		<input type="hidden" id="suid" name="suid" value=""/>
		<input type="hidden" id="method" name="method" value="User"/>
		<input type="hidden" id="do" name="do" value="index"/>
		<ul id="flow_detail_report_title">
			<li>
			</li>
			<li><a href="<?php echo U("User/mailadd");?>" class="leftNav">添加邮件发送帐号</a></li>
		</ul>
		</form>
	</div>

	<table id="flow_detail_pv_table" class="report" style="display: table;">
		<tbody><tr class="title reportTableTitle" style="width: 1031px; margin-top: 0px; position: static; top: 0px; border-bottom: medium none;">
			<td class="time" style="width: 100px;">发送范围</td>
			<td style="width: 160px;">EMAIL服务器</td>
			<td style="width: 110px;">EMAIL端口</td>
			<td style="width: 180px;">EMAIL帐号</td>
			<td style="width: 180px;">EMAIL密码</td>			
			<td style="width: 180px;">添加时间</td>
			<td style="width: 110px;">操作</td>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="bg-white">
		<td style="text-align: left;">
                       <div style="width:100px; text-align:left; overflow: hidden;">
					   ID:(<?php echo ($vo["webid"]); ?>)的站点						</div>
					</td>
					<td style="text-align: left;">
                       <div style="width:160px; text-align:left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">
						<?php echo ($vo["mailhost"]); ?>		</div>
					</td>
					<td style="text-align: left;">
						<div style="width:110px;  text-align:left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">
                            <?php echo ($vo["mailport"]); ?>
						</div>
					</td>
					<td>
						<div style="width:180px; text-align:left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                           <?php echo ($vo["mailuser"]); ?>
						   </div>
					</td> 
					<td>                  
						<div style="width:180px; text-align:left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                           
								<?php echo ($vo["mailpass"]); ?>						
						</div>           
                    </td>
					<td>   
						<div style="width:180px;">
						<?php echo (date("Y-m-d H:i:s",$vo["time"])); ?>				
						</div>
                    </td>
					<td>   
						<div style="width:110px;">
						 <a href="javascript:;" onclick="del(<?php echo ($vo["id"]); ?>)">删除</a>		
						</div>
                    </td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody></table>

	<div class="page">
		<div class="page-inner"> <?php echo ($page); ?>          </div>
	</div>
</div>
	
</div>

</div>	
</div>
﻿<div class="footer" id="footer">
   ﻿&copy; 2014 www.sjzxhdn.cn 版权所有 ICP备:粤ICP备13003173号-1 石家庄新华电脑 
</div>
</body>
</html>