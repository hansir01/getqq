<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/static/admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/Css/style.css" />
    <script type="text/javascript" src="/static/admin/Js/jquery.js"></script>
    <script type="text/javascript" src="/static/admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/static/admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/static/admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/static/admin/Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">    
    用户ID：
    <input type="text" name="uid" id="uid"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
	    <th>网站编号</th>
        <th>用户id</th>
        <th>网站域名</th>
        <th>网站分类</th>
        <th>网站名称</th>
		<th>邮件状态</th>
		<th>统计状态</th>
        <th>操作</th>
    </tr>
    </thead>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		    <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["uid"]); ?></td>
            <td><?php echo ($vo["domain"]); ?></td>
            <td><?php echo ($vo["subtype"]); ?>/<?php echo ($vo["type"]); ?></td>
            <td><?php echo ($vo["title"]); ?></td>
			<td><?php echo ($vo["aotumail"]); ?></td>
			<td><?php echo ($vo["status"]); ?></td>
            <td>
                <a href="<?php echo U("Visit/index",array("sid"=>$vo[id]));?>">查看访客</a>                
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>		
</table>
<div class="inline pull-right page">
    <?php echo ($page); ?>      
	  </div>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>