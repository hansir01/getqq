<?php
 class SiteAction extends UcAction{
     public function lists(){
	     $mod = M("sites");
		 $var['uid'] = $_SESSION['uid'];
		  import("ORG.Page");
		 $count = $mod->where($var)->field("id")->count();
		 $listRows = C("page") ? C("page") : "10";
		 $p = new Page($count,$listRows);
		 
		 $list = $mod->where($var)->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
		 $this->assign("list",$list);
		 $this->assign("page",$p->show());
	     $this->display();
	 }
	 public function add(){
	     $sid = I("get.sid");
		 $sid = isset($sid) ? $sid : "";
		 $array = array();
		 if( !empty($sid) ){
		     $map['id'] = $sid;
			 $map['uid'] = $_SESSION['uid'];
			 $array = M("sites")->where($map)->find();
			 
		 }
		 $this->assign($array);
	     $this->display();
	 }
	 public function dosave(){
	     if($_POST){
		     if($_POST['sid']){
			     $map['id'] = I("post.sid");
                 $map['uid'] = $_SESSION['uid'];
				 $data['title'] = I("post.sitename");
				 $data['domain'] = I("post.sitedomain");
				 $data['aotumail'] = I("post.aotumail");
				 M("sites")->where($map)->data($data)->save();
				 $this->success("修改成功",U("Site/lists"));
			 }else{
			     $this->error("操作已中止");
			 }
		 }else{
		    $this->error("无权访问");
		 }
	 }
	 public function doadd(){
	     if($_POST){
		     $title = I("post.sitename");
			 $domain = I("post.sitedomain");
			 $type = I("post.type");
			 $subtype = I("post.subtype");
			 $provinces = I("post.provinces");
			 $city = I("post.cities");
			 if($title == "" or $domain == "" or $type == "" or $subtype == "" or $provinces == "" or $city == ""){
			     exit($this->error("请填写完整后再提交"));
			 }
			 $data['uid'] = $_SESSION['uid'];
			 $count = M("sites")->where($data)->count();
			 if($count >= C("cfg_sitenum")){
			     exit($this->error("您的数量已经达到上限"));
			 }
			 $data['title'] = $title;
			 $data['domain'] = $domain;
			 $data['subtype'] = $subtype;
			 $data['type'] = $type;
			 $data['provinces'] = $provinces;
			 $data['city'] = $city;
			 $data['webinfo'] = I("post.siteinfo");
			 $data['time'] = time();
			 $data['status'] = 1;
		     $data['aotumail'] = I("post.aotumail");
			 
			 if(M("sites")->add($data)){
			     $this->success("网站添加成功",U("Site/lists"));
			 }else{
			     
			     $this->error("添加失败,请检查是否填写完整");
			 }
		 }	   
	 }
	 
	public function getCodeJs(){
	     $sid = I("get.sid");
		 $map['uid'] = $_SESSION['uid'];
		 $map['id'] = $sid;
		 $sql = M("sites")->where($map)->field("id,serverid,title,domain")->find();
		 if(!$sql){
		     $this->error("对不起您没有添加此站");
			 exit();
		 }
		 $server = M("servers")->where(array("id" => $sql['serverid']))->field("urlhost")->find();
		 $jsurl = $server['urlhost']."?jsuid=".$sid;
		 
	     //$jsurl = (getRootUrl() . '?jsuid=') . $sid;
         $js1 = "<script type='text/javascript' src='{$jsurl}'></script>";
         $this->assign("js",$js1);
		 $this->assign($sql);
	     $this->display();
	}
 }
?>