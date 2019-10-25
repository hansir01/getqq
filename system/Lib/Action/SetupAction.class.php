<?php
  class SetupAction extends ComAction{
     public function index(){
	     $config_old = require './config.php';
	     $this->assign($config_old);
	     $this->display();
	 }
	 
	 public function dosave(){
	     $config['cfg_sitetitle'] = I("post.cfg_sitetitle");
         $config['cfg_seotitle'] = I("post.cfg_seotitle");
		 $config['cfg_keyword'] = I("post.cfg_keyword");
		 $config['cfg_desc'] = I("post.cfg_desc");
		 $config['cfg_regstatus'] = I("post.cfg_regstatus");
		 $config['cfg_isvip'] = I("post.cfg_isvip");
		 $config['cfg_viptime'] = I("post.cfg_viptime");
		 $config['cfg_close'] = I("post.cfg_close");
		 $config['cfg_closemsg'] = I("post.cfg_closemsg");
		 $config['cfg_mailauto'] = I("post.cfg_mailauto");
		 $config['cfg_vipmprice'] = I("post.cfg_vipmprice");
		 $config['cfg_vipyprice'] = I("post.cfg_vipyprice");
		 $config['cfg_sitenum'] = I("post.cfg_sitenum");
		 $config['cfg_emailnum'] = I("post.cfg_emailnum");
		 $config['cfg_emailtplnum'] = I("post.cfg_emailtplnum");
		 $config['cfg_islogin'] = I("post.cfg_islogin");
		 $config_old = require './config.php';
		 $config_new = array_merge($config_old,$config);
		 arr2file('./config.php',$config_new);
		
		$this->success('恭喜您，配置信息更新成功！',U("Setup/index"));
	 }
	 
	 public function server(){
	 
	     $this->display();
	 }
	 
	 public function editpass(){
	     if($_POST){
		     $password = I("post.password");
		     $newpassword = I("post.newpassword");
			 $repassword = I("post.repassword");
			 if($password == "" or $newpassword == "" or $repassword == ""){
			     $this->error("表单不能为空");
				 die;
			 }
			 $sql = M("admin")->where(array("username" => $_SESSION['adminuser'],"password" => md5($password)))->find();
			 if(!$sql){
			     $this->error("旧密码不正确");
				 die;
			 }
			 if($newpassword != $repassword){
			    exit($this->error("两次新密码不正确"));
			 }
			 $data['password'] = md5($newpassword);
			 if(M("admin")->where(array("username" => $_SESSION['adminuser'],"password" => md5($password)))->data($data)->save()){
			     $this->success("密码修改成功");
			 }else{
			     $this->error("修改失败");
			 }
			 
			 die;
		 }
	     $this->display();
	 }
  }
?>