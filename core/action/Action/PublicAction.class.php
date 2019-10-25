<?php
 class PublicAction extends HomeAction{
    	 
	 public function dologin(){
	     if($_POST){
		     $username = I("post.username");
			 $password = I("post.password");
			 if($username == "" or $password == ""){
			     exit($this->error("对不起,登录失败！请输入用户名或密码"));
			 }
			
			 $password = xmd5($password ,true);
			 $map['username'] = $username;
			 $map['password'] = $password;
			 $sql = M("members")->where($map)->find();
			 if($sql){
			     if(C("cfg_islogin") == 1){
			         $vipInfo = getVipInfo($sql['id']);
					 if($vipInfo['vipendtime'] < time()){
					     exit($this->error("对不起您的帐号使用期已到期请联系客服进行续期"));
					 }
			     }
			     $_SESSION['uid'] = $sql['id'];
				 $_SESSION['username'] = $username;
				 $_SESSION['oldloginip'] = $sql['loginip'];
				 $_SESSION['oldlogintime'] = $sql['logintime'];
				 $data['loginip'] = user_ip();
				 $data['logintime'] = time();
				 $data['logincount'] = array('exp','logincount+1');
				 M("members")->where($map)->data($data)->save();
				 
				 $this->success("欢迎尊贵的用户登录本站",U("User/index"));
			 }else{
			     $this->error("对不起您的帐号或密码错误");
			 }
		 
		 }else{
		     $this->error("对不起您无权访问");
		 }
	 }
	 
	 public function loginout(){
	     if(isset($_SESSION['uid'])){
		     unset($_SESSION['uid']);
			 unset($_SESSION['username']);
			 unset($_SESSION);
			 $this->success("您已成功注销本系统",U("Index/index"));
		 }else{
		     $this->error("您未登录系统,请登录",U("Index/login"));
		 }
	 }
	 
	 public function doreg(){
	     if($_POST){
		     $ip = S(user_ip());
			 if($ip['isreg'] == true){
			     $this->error("对不起同IP每小时只能注册一次");die();
			 }
		     $username = I("post.username");
			 $password = I("post.password");
			 $email = I("post.email");
			 $repassword = I("post.repassword");
			 if($username == "" or $password == "" or $email == "" or $repassword == ""){
			     exit($this->error("对不起,注册失败!原因:请填写完表单再提交"));
			 }
			 if($repassword != $password){
			     exit($this->error("两次密码不一致"));
			 }
			 $mod = M("members");
			 $data['username'] = $username;
			 if($mod->where(array('username'=>$username))->field("id")->find()){
			     exit($this->error("您的帐号已存在,请更换"));
			 }
			 $data['password'] = xmd5($password,true);
			 $data['email'] = $email;
			 $data['rmb'] = 0;
			 $data['isvip'] = C("cfg_isvip");
			 if($data['isvip'] ==1){
			     $data['vipstartime'] = time();
				 $data['vipendtime'] = time()+60*60*24*C("cfg_viptime");
			 }
			 if($mod->add($data)){
			 S(user_ip(),array('isreg' => true),3600*24);
			     $this->success("恭喜您！注册成功",U("Index/login"));
			 }else{
			     $this->error("注册失败");
			 }
			 
		 }else{
		     $this->error("对不起您无权访问");
		 }
	 }
}
?>