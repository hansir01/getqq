<?php
 class MailAction extends ComAction{
     public function index(){
	      $count = M("maildata")->count();
		 $listRows = 10;
		 import("ORG.Page");
		 $p = new Page($count,$listRows);
	     $list = M("maildata")->limit($p->firstRow.','.$p->listRows)->order("id desc")->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 
	 
 }
?>