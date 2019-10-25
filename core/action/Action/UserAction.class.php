<?php
  class UserAction extends UcAction{
     public function index(){
	     $sid = I("get.sid");
		 $var = 'uid = '.$_SESSION['uid'];
		 
		 if($sid>0){
		     $var .= ' and webid = '.$sid;
		 }
		 if($_GET['st'] != "" and $_GET['et'] != ""){
		     $st = strtotime($_GET['st']);
			 $et = strtotime($_GET['et']." 23:59:59");
		     $var .= ' and time > '.$st.' and time < '.$et;
		 }
		 
		 $mysite = M("sites")->where(array("uid"=>$_SESSION["uid"]))->field("id,title")->order("id desc")->select();
		 
		 import("ORG.Page");
		 $count = M("qqdata")->where($var)->field("id")->count();
		 $listRows = C("page") ? C("page") : "10";
		 $p = new Page($count,$listRows);	
		 
	     $list = M("qqdata")->where($var)->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
		 $this->assign("mysite",$mysite);
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
         $this->display();
	 }
	 
	 public function domain(){
	     $this->display();
	 }
	 
	 
	 public function mail(){
	     $mod = M("maildata");
		 $var['uid'] = $_SESSION["uid"];
		 import("ORG.Page");
		 $count = $mod->where($var)->field("id")->count();
		 $listRows = C("page") ? C("page") : "10";
		 $p = new Page($count,$listRows);	
		 $list = $mod->where($var)->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 
	 
	 public function mailtpl(){
	     $map['uid'] = $_SESSION['uid'];
		 $list = M("mailTpl")->where($map)->select();
		 $this->assign("list",$list);
	     $this->display();
	 }
	 
	 public function mailadd(){
	     $map['uid'] = $_SESSION['uid'];
		 $list = M("sites")->where($map)->select();
		 $count = count($list);
		 if($count >= C("cfg_emailnum")){
		     exit($this->error("对不起！您的邮件服务器信息已经达到上限".C("cfg_emailnum")."请删除后再添加"));
		 }
		 $tpllist = M("mailTpl")->where($map)->select();
		 if( !$tpllist ){
		     exit($this->error("对不起！您还没有添加邮件内容请先添加后再添加邮件服务器信息"));
		 }
		 $this->assign("tpllist",$tpllist);
		 $this->assign("list",$list);
	     $this->display();
	 }
	 
	 public function mailaddtpl(){
	     
		 $id = I("get.id");
		 if($id != ""){
		     $array = M("mailTpl")->where(array("id"=>$id))->find();
			 
		 }else{
		     $array = array();
		 }
		 $this->assign($array);
	     $this->display();
	 }
	 
	 public function maildeltpl(){
         $id = I("get.id");
		 if($id != ""){
		     $array = M("mailTpl")->where(array("id"=>$id,"uid" => $_SESSION['uid']))->find();
             if($array){
			     M("mailTpl")->where(array("id"=>$id,"uid" => $_SESSION['uid']))->delete();
				 $this->success("删除成功");
				 die();
			 }
		 }
		 $this->error("删除失败");
	 }
	 
	 public function domailtplSave(){
	     if($_POST){
		     if($_POST['title'] == ""){
			     $this->error("请输入邮件标题");
				 exit();
			 }
			 if($_POST['body'] == ""){
			     $this->error("请输入邮件内容");
				 exit();
			 }
			 $data['title'] = I("post.title");
			 $data['body'] = I("post.body");
			 if($_POST['id'] > 0){
			     M("mailTpl")->where(array("id"=>$_POST['id']))->data($data)->save();
			 }else{
			     $data['uid'] = $_SESSION['uid'];
				 $data['time'] = time();
				 $count = M("mailTpl")->where(array("id"=>$_POST['id']))->count();
				 if($count >= C("cfg_emailtplnum")){
				     exit($this->error("对不起您的模板数已经达到上限"));
				 }
				 M("mailTpl")->add($data);
			 }
			 $this->success("操作成功",U("User/mailtpl"));
		 }
	 } 
	 
	 public function doMainSave(){
	     if($_POST){
		     $data['mailhost'] = I("post.mailhost");
			 $data['mailport'] = I("post.mailport");
			 $data['mailuser'] = I("post.mailuser");
			 $data['mailpass'] = I("post.mailpass");
			 $data['tplid'] = I("post.tplid");
			 if($data['mailhost'] == "" or $data['mailport'] == "" or $data['mailuser'] == "" or $data['mailpass'] == "" or $data['tplid'] == ""){
			    exit($this->error("请填写完表单后再提交"));
			 }
			 $data['webid'] = I("post.webid");
			 $sid = I("post.sid");
			 $mod = M("maildata");
			 if($sid){
			     $var['id'] = $sid;
				 $var['uid'] = $_SESSION["uid"];
				 $mod->where($var)->data($data)->save();
			 }else{
			     $data['time'] = time();
				 $data['uid'] = $_SESSION["uid"];
				 $data['status'] = 1;
				 $data['count'] = 0;
				 $mod->add($data);
		    }
			$this->success("操作成功",U("User/mail"));
		 }
	 }
	 
	 public function pass(){
	     
	     $this->display();
	 }
	 
	 public function dopass(){
	     if($_POST){
		     if($_POST['password'] == ""){
			     exit($this->error("旧密码不能为空"));
			 }
			 if($_POST['newpass'] == ""){
			     exit($this->error("请输入新密码"));
			 }
			 if($_POST['newpass'] != $_POST['renewpass']){
			     exit($this->error("两次新密码不一致"));
			 }
			 $map['id'] = $_SESSION['uid'];
			 $map['password'] = xmd5($_POST['password'],true);
			 $sql = M("members")->where($map)->field("id")->find();
			 if($sql){
			     $data['passswrod'] = xmd($_POST['password'],true);
				 M("members")->where($map)->data($data)->save();
				 unset($_SESSION['uid']);
				 unset($_SESSION['username']);
				 $this->success("密码修改成功,请重新登录",U("Index/index"));
			 }else{
			     $this->error("对不起旧密码错误");
			 }
		 }
	 }
	 
	 public function delmail(){
	     if($_POST){
	         if($_POST['id'] == ""){
			     $this->error("参数错误");
			 }else{
			     M("maildata")->where(array("id" => I("post.id"),'uid'=>$_SESSION['uid']))->delete();
				 $this->success("操作成功");
			 }
		 }
	 }
	 
	 public function edit(){
	 
	     $this->display();
	 }
	 
	 public function expor(){
	     if($_POST){
		     $st = strtotime($_POST['st']);
			 $et = strtotime($_POST['et']." 23:59:59");
			 $var = 'uid = '.$_SESSION['uid'];
			 if($_POST['webid'] == 0){
			     $var .= ' and webid = '.$_POST['webid'];
			 }
		     
		     $var .= ' and time > '.$st.' and time < '.$et;
		     $list = M("qqdata")->order("id desc")->where($var)->field("qq,sex,qqnick")->order("id desc")->select();
		     foreach ($list as $key => $val){
		        $list[$key]['mail'] = $val['qq']."@qq.com";
		    }
		 exportexcel($list,array('qq号','性别','昵称','qq邮箱'),$filename='qqdata_');		     
		 }else{
	         $mysite = M("sites")->where(array("uid"=>$_SESSION["uid"]))->field("id,title")->order("id desc")->select();
		     $this->assign("list",$mysite);
	         $this->display();
		 }
	 }
  }
?>