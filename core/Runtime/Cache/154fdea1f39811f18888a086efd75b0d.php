<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script language="javascript">
//*====================================================================
//*                 www.239.la
//*
//*                 易收宝 提供技术支持
//*
//*====================================================================

//绑定支付宝账号的网址：http://www.Youlisp.cn/Download.asp

var MyAccount	=	'';					

var ordernum	=	'<?php echo date("YmdHis").rand(2000,9999);?>';						//此处生成订单号

var remark	=	'不要修改付款说明的信息，否则不会自动到账';						//此处是备注内容

var TheMoney	=	'';						//(可选) 直接获取固定金额，当没有获取固定金额时，会出现选择金额的按扭

var IsNotify	=	1								//是否启用跳转功能 值为“1”或“0”(1:付款成功后，自动跳转 0:付款成功后，不自动跳转)

//您只要在上方配置参数即可，下方的源码可以不用动了

//*=================================================================================

//----------此分界线下方的源码无需更改----------此分界线下方的源码无需更改----------

//*=================================================================================

</script>
<title>易收宝_支付宝充值_自动到账</title>
<meta name="keywords" content="易收宝" />
<meta name="description" content="易收宝" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/static/img/css.css" type="text/css" />
<script language="javascript">
	function ChangeMoney(yuan){
		var Money;
		if(document.getElementById("OtherAmount").checked==true){
			Money=document.getElementById('OtherMoney').value;
		}else{
			Money=yuan;
		}
		if(Money>0){
			document.getElementById("payAmount").value=Money;
			document.getElementById("price").innerHTML='￥'+Money;
		}
	}
	function ChangeStep(n){
		//检测是否启用跳转功能
		if(IsNotify==1){
			if(n==1){
				document.getElementById('step1').style.display='';
				document.getElementById('step2').style.display='none';
			}else if(n==2){
				document.getElementById('step1').style.display='none';
				document.getElementById('step2').style.display='';
			}
		}
	}
	//获得n位随机字母或数字字符
	function generateMixed(n) {
		var res = "";
		var chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		for(var i = 0; i < n ; i ++) {
			var id = Math.ceil(Math.random()*35);
			res += chars[id];
		}
		return res;
	}
	//提交查询
	function Submit_G(){
		document.getElementById("G_order").value=document.getElementById("order").value;
				document.getElementById("g").submit();
	}
</script>
</head>
<body>
<div class="recharge">
   <div class="recharge-inner">
      <div class="recharge-con clearfix">
         <!-- 左侧表单 -->
         <div id="step1" name="step1" style="display:;" class="recharge-form">
            <form name="f" id="f" action="<?php echo U("Pay/payto");?>" method="get" target="_blank">
			
			<input name="payAmount" id="payAmount" type="hidden">
               <ul>
                  <li class="clearfix">
                     <label class="label-left">开通帐号：</label>
					 <input name="account" type="user"/>
                     <input name="order" id="order" class="ipt-name" type="hidden" />
                  </li>
                  <li class="clearfix" id="SelectAmount" name="SelectAmount" style="display:;">
                     <label class="label-left">选 择：</label>
                     <span class="amount-value"><input type="radio" name="amount" value="vipmprice1" onclick="javascript:ChangeMoney(<?php echo C("cfg_vipmprice")*1;?>);" />一月</span>
                     <span class="amount-value"><input type="radio" name="amount" value="vipmprice3" onclick="javascript:ChangeMoney(<?php echo C("cfg_vipmprice")*3;?>);" />三月</span>
                     <span class="amount-value"><input type="radio" name="amount" value="vipyprice1" onclick="javascript:ChangeMoney(<?php echo C("cfg_vipyprice")*1;?>);" checked="checked" />一年</span>
                     <span class="amount-value"><input type="radio" name="amount" value="vipyprice2" onclick="javascript:ChangeMoney(<?php echo C("cfg_vipyprice")*2;?>);" />二年</span>
                     <span class="amount-value-ipt">
					 <i><input type="radio" name="amount" id="OtherAmount" onclick="javascript:ChangeMoney(0);" />其它</i> 
					 <input class="ipt-value" name="OtherMoney" id="OtherMoney" type="text" value="0.01" onKeyUp="javascript:ChangeMoney(0);" onBlur="javascript:ChangeMoney(0);" onfocus="javascript:ChangeMoney(0);" onkeypress="return event.keyCode>=48&&event.keyCode<=57||event.keyCode==46" onpaste="return !clipboardData.getData('text').match(/\D/)" ondragenter="return false" style="ime-mode:Disabled" />
					 </span>
                  </li>
                  <li class="clearfix">
                     <label class="label-left">确认金额：</label>
                     <span class="txt-price" id="price"></span>
                  </li>
                  <li class="clearfix">
                     <label class="label-left">备 注：</label>
                     <input name="memo" id="memo" class="ipt-name" type="text" value="" readonly="true"/>
                  </li>
                  <li class="clearfix">
                     <input class="recharge-btn" type="submit" value="支付宝充值" onclick="javascript:ChangeStep(2);" />
                  </li>
               </ul>
				<script language="javascript">
				//document.getElementById("optEmail").value=MyAccount;//加载站长支付宝账号
				document.getElementById("order").value=ordernum;//加载用户名
				document.getElementById("memo").value=remark;//加载备注
				if(TheMoney==''){
					ChangeMoney(<?php echo C("cfg_vipyprice")*1;?>);			//默认选择充值金额
				}else{
					document.getElementById('SelectAmount').style.display='none';
					ChangeMoney(TheMoney);		//固定金额
				}
				</script>
            </form>
        </div>
         
		 <div id="step2" name="step2" style="display:none;" class="recharge-form">
            <form name="g" id="g" action="<?php echo U("Pay/query");?>" method="post" target="_blank">
	
				<input name="G_order" id="G_order" type="hidden">
               <ul>
                  <li class="clearfix">
                     <a href="javascript:ChangeStep(1);"><< 返回重新支付</a>
					 <br /><br />
					 <input class="recharge-btn-2" type="button" value="已付款 获取商品" onclick="javascript:Submit_G();" /> （付款成功后，请点击获取商品）
                  </li>
               </ul>
            </form>
        </div>
		 
		 <!-- 右侧文字 -->
         <div class="right-tips">
		 	<p><STRONG><FONT color=#ff0000>重要提示</FONT></STRONG>：</p>
			<p>支付宝付款时，请<STRONG><FONT color=#0000ff>不要修改</FONT></b>支付宝的<b><FONT color=#ff0000>“付款说明”和“备注”</FONT></b>，否则不能自动到账。</p>
		 </div>
      </div>
      
      <!-- 底部链接 -->
      <div class="recharge-bottom">
         <ul class="clearfix">
            <li><a href="/">返回主页</a></li>
            <li><a href="http://www.239.la" target="_blank">易收宝(支付宝即时到账)接口</a></li>
         </ul>
      </div>
   </div>
</div>
</body>
</html>