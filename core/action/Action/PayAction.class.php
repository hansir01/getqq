<?php
class PayAction extends Action{
	private $key = "45513fb321bd38f4ad13ba1a62eef2f7";
	private $partner = "40120141942206829";
	private $webid = 19;
	public function index() {
		$this->display();
	}

	public function payto() {
		if($_GET) {
			if($_GET['payAmount'] <= 0) {
				$this->error("金额错误");
				die();
			}
			if($_GET['account'] == "") {
				$this->error("请填写要开通的帐号");
			}
			$money = $_GET['payAmount']; //充值金额
		$order = $_GET['order'];//生成唯一订单号		
		$paytype = '';//支付类型默认为支付宝
		//以下是扩展字段信息,可为空。付款成功后系统会将此信息返回
		$extend['ex1'] = I("get.account");//扩展字段一 可留空
		$extend['ex2'] = I("get.amount");//扩展字段二 可留空
		/*
		*  此处可以加入订单入库业务逻辑,如订单判断是否已经存在,可根据您的需要进行编写业务逻辑
		*  
		*/


		/*
		*====================================================================
        *以下是通过商户平台服务器验证系统进行获取支付类型
		*====================================================================
		*/

		$sendData['key'] = $this->key;
		$sendData['money'] = $money;
		$sendData['order'] = $order;
		$sendData['parnert'] = $this->partner;
		$sendData['paytype'] = $paytype;
		$sendData['webid'] = $this->webid;
		$sendData['extend'] = $extend;
		$sendData['sign'] = $this->markSign($this->key.$money.$order.$this->partner.$paytype);
		$str = $this->getSendData($sendData);
		echo $str;
		}
	}

	public function Notify() {
		$order = $_POST['ordernum'];//您网站平台的订单号
        $sysOrder = $_POST['sysorder'];//商户平台订单号
        $tradOrder = $_POST['tradorders'];//第三方支付平台交易号
        $paytype = $_POST['type'];//支付类型
        $money = $_POST['tradrmb'];//用户实际支付金额
        $status = $_POST['status'];//交易状态
        $extend = $_POST['extend'];//扩展字段信息
        $sign = $this->markSign($this->key.$money.$order.$this->partner.$paytype.$this->webid);
		//echo $Key."--".$money."--".$order."--".$Partner."--".$paytype."--".$Webid."<br>";die();
        if($sign == $_POST['sign']){
		    //请在此加入您的业务逻辑判断
			if($status == "success"){
			      //交易 付款成功
				  $account = $extend['ex1'];
				  $time = $extend['ex2'];
				  $arr = explode("vipmprice",$time);
				  $arr1 = explode("vipyprice",$time);
				  if($arr[1] != "") {
				  	$price = C("cfg_vipmprice")*$arr[1];
				  	$time = time()+30*24*3600*$arr[1];
				  }else if($arr1[1] != "") {
				  	$price = C("cfg_vipmprice")*$arr1[1];
				  	$time = time()+30*24*3600;
				  	$time = $time*360*$arr1[1];
				  }else{
				  	die();
				  }

				  if($money < $price) {
				  	 die();
				  }
				  $data['vipstartime'] = time();
				  $data['vipendtime'] = $time;
				  $data['isvip'] = 1;
				  $where['username'] = $account;
				  $info = M("members")->where($where)->field("id")->find();
				  if(M("members")->where($where)->data($data)->save()){
				     //更新文件缓存
					 S("vip".$info['id'],$data,3600);
				  }
			  
				  
				  
				  
			      echo 'success';//此行请勿删除
			}else{
                  echo 'error';//此行请勿删除			
			}
			
			
			
        	
        }else{
        	echo 'error:signError';//签名错误
        }
	}


	private function getSendData($data, $type="sendOrder") {
	 //$data = array ('test' => 'hellword');
	 //$data['host'] = $_SERVER["HTTP_HOST"];
	 if($type == "sendOrder"){
	 	$url = 'http://www.239.la/index.php?r=payserver';
	 }else if($type == "query"){
	 	$url = 'http://www.239.la/index.php?r=payserver/api/query';
	 }

	 $data = http_build_query($data);
	 $opts = array (
	  'http' => array (
	  'method' => 'POST',
	  'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
		     "Content-Length: " . strlen($data) . "\r\n",
	  'content' => $data
	  ),
	 );
	 $context = stream_context_create($opts);
	 $html = file_get_contents($url, false, $context);
	 return $html;
}

private function markSign($str) {
    $sign = md5($str);
	return $sign;
}

public function query() {
	header("Centent-Type:text/html;charset=UTF-8");   //设置系统编码格式
	    $order = $_POST['G_order'];
        $sign = $this->markSign($this->key.$order.$this->partner.$this->webid);
        $sendData['order'] = $order;
        $sendData['sign'] = $sign;
        $sendData['key'] = $this->key;
        $sendData['partner'] = $this->partner;
        $sendData['webid'] = $this->webid;
        $str = $this->getSendData($sendData, "query");//返回JSON数据 返回信息:订单号、支付宝交易号、订单金额、实际支付金额、交易状态
        $array = json_decode($str, true);
       
        //echo $array['msg'];
        if($array['status'] == "success"){
        	if($array['data']['tradstatus'] == "success") {
        		$this->success("付款成功");
        	}else if($array['data']['tradstatus'] == ""){
        		$this->error("未查询到付款信息");
        	}
        }else{
        	echo $array['msg'];
        }
}
}
?>