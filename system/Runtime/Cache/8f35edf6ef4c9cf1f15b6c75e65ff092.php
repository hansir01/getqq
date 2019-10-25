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
    网站ID：
    <input type="text" name="sid" id="sid"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
	用户ID：
    <input type="text" name="uid" id="uid"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">数据导出</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>访客QQ</th>
        <th>访问域名</th>
        <th>用户ID</th>
		<th>来路</th>
        <th>访问时间</th>
        <th>操作</th>
    </tr>
    </thead>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><a class="blue12"  target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($vo["qq"]); ?>&site=zzsoft&menu=yes" title="点击对话该访客">
							<?php echo ($vo["qq"]); ?>&nbsp;<img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo ($vo["qq"]); ?>:52" alt="联系访客" title="联系访客"></td>
            <td><?php echo ($vo["webid"]); ?></td>
            <td><?php echo ($vo["uid"]); ?></td>
			<td><?php echo ($vo["referer"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>
            <td>
                <a href="<?php echo U("Visit/item","id=$vo[id]");?>">详情</a> </a>                
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

				window.location.href="expor.html";
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