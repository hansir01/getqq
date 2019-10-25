<?php
class SiteAction extends ComAction{
     public function index(){
	     if($_GET['uid']){
		     $map['uid'] = I("get.uid");
		 }
		 $count = M("sites")->where($map)->count();
		 $listRows = 10;
		 import("ORG.Page");
		 $p = new Page($count,$listRows);
	     $list = M("sites")->where($map)->limit($p->firstRow.','.$p->listRows)->order("id desc")->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 
}
?>