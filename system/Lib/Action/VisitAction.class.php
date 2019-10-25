<?php
 class VisitAction extends ComAction{
     public function index(){
	     $uid = I("get.uid");
		 $sid = I("get.sid");
		 if($uid){
		     $map['uid'] = $uid;
		 }else if($sid){
		     $map['webid'] = $sid;
		 }
		 
		 $count = M("qqdata")->where($map)->count();
		 $listRows = 10;
		 import("ORG.Page");
		 $p = new Page($count,$listRows);
	     $list = M("qqdata")->where($map)->limit($p->firstRow.','.$p->listRows)->order("id desc")->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 
	 public function expor(){
	     $this->display();
	 }
	 public function doexpor(){
	     
	     $list = M("qqdata")->order("id desc")->field("qq,sex,qqnick")->select();
		 foreach ($list as $key => $val){
		     $list[$key]['mail'] = $val['qq']."@qq.com";
		 }
		 exportexcel($list,array('qq号','性别','昵称','qq邮箱'),$filename='qqdata_');
	 }
	 
	 public function item(){
	     $id = I("get.id");
		 $sql = M("qqdata")->where(array("id"=>$id))->find();
		 $this->assign($sql);
	     $this->display();
	 }
 }
?>