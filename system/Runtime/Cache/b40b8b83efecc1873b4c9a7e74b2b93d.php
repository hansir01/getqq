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
<form action="<?php echo U('User/edit');?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="<?php echo ($user["id"]); ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">qq</td>
            <td><?php echo ($qq); ?></td>
        </tr>
		 <tr>
            <td width="10%" class="tableleft">性别</td>
            <td><?php echo ($sex); ?></td>
        </tr>
		 <tr>
            <td width="10%" class="tableleft">昵称</td>
            <td><?php echo ($qqnick); ?></td>
        </tr>
		 <tr>
            <td width="10%" class="tableleft">邮箱</td>
            <td><?php echo ($qq); ?>@qq.com</td>
        </tr>
		
        <tr>
            <td class="tableleft">访问域名</td>
            <td><?php echo ($url); ?></td>
        </tr>
       
        <tr>
            <td class="tableleft">用户ID</td>
            <td><?php echo ($uid); ?></td>
        </tr>
        <tr>
            <td class="tableleft">网站ID</td>
            <td>
               <?php echo ($webid); ?>
            </td>
        </tr>
        <tr>
            <td class="tableleft">来路</td>
            <td><?php echo ($referer); ?></td>
        </tr>
		<tr>
            <td class="tableleft">访问时间</td>
            <td><?php echo (date("Y-m-d H:i:s",$time)); ?></td>
        </tr>
		<tr>
            <td class="tableleft">访问IP</td>
            <td><?php echo ($ip); ?></td>
        </tr>
		<tr>
            <td class="tableleft">IP归属</td>
            <td><?php echo ($ipcity); ?></td>
        </tr>
		<tr>
            <td class="tableleft">搜索关键词</td>
            <td><?php echo ($keyword); ?></td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
               	 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('Visit/index');?>";
		 });

    });
</script>