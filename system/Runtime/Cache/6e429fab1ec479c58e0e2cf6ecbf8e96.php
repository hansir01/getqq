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
	<script type="text/javascript" src="/static/js/showdate.js"></script>

 

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
<form class="form-inline definewidth m20" action="<?php echo U("Visit/doexpor");?>" method="post">    
  选择时间: <input type="text" id="st" name="st" onclick="return Calendar('st');" value="" class="text" style="border:1px solid #888; vertical-align:middle;width:85px;"/>-<input type="text" id="et" onclick="return Calendar('et');" value="" name="et" class="text" style="border:1px solid #888; vertical-align:middle;width:85px;"/>
  <input type="submit" class="btn btn-primary" onclick="return selectDate()" value="确认导出" />
</form>

</body>
</html>
<script>
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

function selectDate(){
		var st=document.getElementById('st').value;
		var et=document.getElementById('et').value;
		if(st == ""){
		     alert("请选择开始时间");
		     return false;
		}else if(et == ""){
		     alert("请选择结束时间");
		     return false
		}
		
		return duibi(st,et);
}

</script>