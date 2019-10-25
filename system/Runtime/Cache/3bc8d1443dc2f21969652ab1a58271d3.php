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
<form action="<?php echo U('Setup/dosave');?>" method="post" class="definewidth m20">
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">网站名称</td>
            <td><input type="text" name="cfg_sitetitle" value="<?php echo ($cfg_sitetitle); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">SEO标题</td>
            <td><input type="text" name="cfg_seotitle" value="<?php echo ($cfg_seotitle); ?>"/></td>
        </tr>
       
        <tr>
            <td class="tableleft">关键词</td>
            <td><input type="text" name="cfg_keyword" value="<?php echo ($cfg_keyword); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">网站描述</td>
            <td>
                <textarea name="cfg_desc" id="cfg_desc" cols="50" rows="5"><?php echo ($cfg_desc); ?></textarea>
            </td>
        </tr>
		<tr>
            <td class="tableleft">注册功能</td>
            <td>
                <input type="radio" name="cfg_regstatus" value="1"
                    <?php if(($cfg_regstatus) == "1"): ?>checked<?php endif; ?> /> 开启
              <input type="radio" name="cfg_regstatus" value="0"
                    <?php if(($cfg_regstatus) == "0"): ?>checked<?php endif; ?> /> 关闭
            </td>
        </tr>
		<tr>
            <td class="tableleft">默认注册类型</td>
            <td>
                <input type="radio" name="cfg_isvip" value="1"
                    <?php if(($cfg_isvip) == "1"): ?>checked<?php endif; ?> /> 高级用户
              <input type="radio" name="cfg_isvip" value="0"
                    <?php if(($cfg_isvip) == "0"): ?>checked<?php endif; ?> /> 普通用户
            </td>
        </tr>
		
		<tr>
            <td class="tableleft">高级体验期</td>
            <td> <input type="text" name="cfg_viptime" style="width:50px;" value="<?php echo ($cfg_viptime); ?>"/>*默认注册高级用户的使用天数</td>
        </tr>
		<tr>
            <td class="tableleft">网站开启</td>
            <td>
                <input type="radio" name="cfg_close" value="1"
                    <?php if(($cfg_close) == "1"): ?>checked<?php endif; ?> /> 开启
              <input type="radio" name="cfg_close" value="0"
                    <?php if(($cfg_close) == "0"): ?>checked<?php endif; ?> /> 闭关
            </td>
        </tr>
		
		<tr>
            <td class="tableleft">网站关闭提示</td>
            <td>
                 <textarea name="cfg_closemsg" id="cfg_closemsg" cols="50" rows="5"><?php echo ($cfg_closemsg); ?></textarea>
            </td>
        </tr>
        <tr>
            <td class="tableleft">邮件发送</td>
            <td>
                  <input type="radio" name="cfg_mailauto" value="1"
                    <?php if(($cfg_mailauto) == "1"): ?>checked<?php endif; ?> /> 开启
              <input type="radio" name="cfg_mailauto" value="0"
                    <?php if(($cfg_mailauto) == "0"): ?>checked<?php endif; ?> /> 闭关 *是否开启全局统计功能，关闭后全站将不能自动发送邮件服务
            </td>
        </tr>
		<tr>
            <td class="tableleft">高级会员月付</td>
            <td>
                 <input type="text" name="cfg_vipmprice" style="width:50px;" value="<?php echo ($cfg_vipmprice); ?>"/>*开通一个月的费用
            </td>
        </tr>
		<tr>
            <td class="tableleft">高级会员年付</td>
            <td>
                <input type="text" name="cfg_vipyprice" style="width:50px;" value="<?php echo ($cfg_vipyprice); ?>"/>*开通一个年的费用
            </td>
        </tr>
		
		<tr>
            <td class="tableleft">添加网站数</td>
            <td>
                <input type="text" name="cfg_sitenum" style="width:50px;" value="<?php echo ($cfg_sitenum); ?>"/>*会员最多添加网站数量
            </td>
        </tr>
		<tr>
            <td class="tableleft">邮件帐号数</td>
            <td>
                <input type="text" name="cfg_emailnum" style="width:50px;" value="<?php echo ($cfg_emailnum); ?>"/>*会员最多添加用于发送邮件的帐号数量
            </td>
        </tr>
		<tr>
            <td class="tableleft">邮件内容数</td>
            <td>
                <input type="text" name="cfg_emailtplnum" style="width:50px;" value="<?php echo ($cfg_emailtplnum); ?>"/>*邮件发送内容数量
            </td>
        </tr>
		<tr>
            <td class="tableleft">到期限制登录</td>
            <td>
               <input type="radio" name="cfg_islogin" value="1"
                    <?php if(($cfg_islogin) == "1"): ?>checked<?php endif; ?> /> 开启
              <input type="radio" name="cfg_islogin" value="0"
                    <?php if(($cfg_islogin) == "0"): ?>checked<?php endif; ?> /> 闭关*是否限制会员到期将无法登录
            </td>
        </tr>
		
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>
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