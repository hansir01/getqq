<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	     
	     $this->display();
	}
	
	public function dologin(){
	     if($_POST){
		     $name = I("post.log");
			 $pwd = I("post.pwd");
			 $map['username'] = $name;
			 $map['password'] = md5($pwd);
			 $sql = M("admin")->where($map)->find();
			 if($sql){
			     $_SESSION['admin'] = true;
				 $_SESSION['adminuser'] = $name;
				 $this->success("登录成功",U("Main/index"));
			 }else{
			     $this->error("帐号或密码错误");
			 }
		 }
	}
	public function logout(){
	     unset($_SESSION['admin']);
		 $this->success("您已成功退出系统",U("Index/index"));		 
	}
}