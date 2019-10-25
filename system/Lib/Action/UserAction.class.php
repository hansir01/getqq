<?php
  class UserAction extends ComAction{
     public function lists(){
	     $mod = M("members");
		 if($_GET['username']){
		     $map['username'] = I("get.username");
		 }		 
		 $count = $mod->where($map)->count();
		 $listRows = 10;
		 import("ORG.Page");
		 $p = new Page($count,$listRows);
		 
		 $list = $mod->where($map)->limit($p->firstRow.','.$p->listRows)->order("id desc")->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 
	 public function edit(){
	     $map['id'] = I("get.id");
		 $sql = M("members")->where($map)->find();
		 $this->assign($sql);
	     $this->display();
	 }
	 
	 public function doedit(){
	     if($_POST){
		     $map['id'] = I("post.id");
             $data['email'] = I("post.email");
			 $data['vipendtime'] = strtotime(I("post.vipendtime"));
			 $data['isvip'] = I("post.isvip");
			 if($_POST['password'] != ""){
			     $pwd = I("post.password");
			     $data['password'] = md5($pwd."www.baidu.com");
			 }
			 M("members")->where($map)->data($data)->save();
			 $this->success("修改成功",U("User/lists"));
		 }
	 }
	 
	 public function del(){
	    $id = $_GET['id'];
		if($id > 0){
		   $db = M("members");
		   $db->where(array("id" =>$id))->delete();
		   $this->success("删除成功",U("User/lists"));
		}
	 }
	 
  }
?>