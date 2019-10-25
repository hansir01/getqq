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
<form action="<?php echo U('User/doedit');?>" method="post" class="definewidth m20">
<input type="hidden" name="id" value="<?php echo ($id); ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" value="<?php echo ($username); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="password" name="password"/></td>
        </tr>
       
        <tr>
            <td class="tableleft">邮箱</td>
            <td><input type="text" name="email" value="<?php echo ($email); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">级别</td>
            <td>
                <input type="radio" name="isvip" value="1"
                    <?php if(($isvip) == "1"): ?>checked<?php endif; ?> /> 高级用户
              <input type="radio" name="isvip" value="0"
                    <?php if(($isvip) == "0"): ?>checked<?php endif; ?> /> 普通用户
            </td>
        </tr>
        <tr>
            <td class="tableleft">到期时间</td>
            <td>开始时间:<input name="vipstartime" style="width:100px" value="<?php echo (date("Y-m-d",$vipstartime)); ?>"/>结束时间:<input name="vipendtime"  style="width:100px" value="<?php echo (date("Y-m-d",$vipendtime)); ?>"/>*高级用户的使用期</td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('User/lists');?>";
		 });

    });
</script>