<?php
  class ComAction extends Action{
     public function _initialize(){
	     if(!isset($_SESSION['admin'])){
		     $this->error("请先登录",U("Index/index"));
			 exit();
		 }
	     
	 }
}
?>