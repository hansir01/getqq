<?php
  class HomeAction extends Action{
     public function _initialize(){
	     if(C('cfg_close') == 0){
		     $this->error(C("cfg_closemsg"),'',36000);
			 exit();
		 }
	     $this->assign($this->getConfig());
	 }
	 
	 public function getConfig(){
	     $config['cfg_sitetitle'] = C("cfg_sitetitle");
         $config['cfg_seotitle'] = C("cfg_seotitle");
		 $config['cfg_keyword'] = C("cfg_keyword");
		 $config['cfg_desc'] = C("cfg_desc");
	     return $config;
	 }
  }
?>