<?php
class IndexAction extends HomeAction {
    public function index(){
	     
		 $this->display();
    }
	
	public function reg(){
	     
	     $this->display();
	}
	public function login(){
	     $this->display();
	}
	public function test(){
	   //SiteSendMail(309103103,3,4);
	   $time = "vipmprice1";
	     $arr = explode("vipmprice",$time);
				  $arr1 = explode("vipyprice",$time);
				  if($arr[1] != "") {
				  	$price = C("cfg_vipmprice")*$arr[1];
				  	$time = time()+30*24*3600*$arr[1];
				  }else if($arr1[1] != "") {
				  	$price = C("cfg_vipmprice")*$arr1[1];
				  	$time = time()+30*24*3600;
				  	$time = $time*360*$arr1[1];
				  }else{
				  	die();
				  }
		echo $time;
	}
}
?>