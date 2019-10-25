<?php
 class UcAction extends HomeAction{
     public function _initialize(){
	     parent::_initialize();
	     if(!isset($_SESSION['uid'])){
		     exit($this->error("对不起,您无权访问,请登录后再使用",U("Index/login")));
		 }
	 }
 }
?>