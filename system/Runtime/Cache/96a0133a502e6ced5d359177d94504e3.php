<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/static/admin/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/static/admin/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/static/admin/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user">root</span><a href="<?php echo U("Index/logout");?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">常用操作</div></li>	<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">系统配置</div></li>      

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="/static/admin/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/static/admin/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/static/admin/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="/static/admin/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'用户管理',href:'<?php echo U("User/lists");?>'},{id:'3',text:'网站管理',href:'<?php echo U("Site/index");?>'},{id:'4',text:'用户邮箱列表',href:'<?php echo U("Mail/index");?>'},{id:'6',text:'访客QQ列表',href:'<?php echo U("Visit/index");?>'}]}]},{id:'7',homePage : '9',menu:[{text:'系统配置',items:[{id:'9',text:'系统设置',href:'<?php echo U("Setup/index");?>'},{id:'9',text:'修改密码',href:'<?php echo U("Setup/editpass");?>'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>