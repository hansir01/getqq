<?php
class ApiAction extends Action{
	public function save(){
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
         header(('Last-Modified: ' . gmdate('D, d M Y H:i:s')) . ' GMT');
         header('Cache-Control: no-cache, must-revalidate');
         header('Pramga: no-cache');
         $uid = isset($_GET['uid']) ? $_GET['uid'] : '0';
         $qq = isset($_GET['qq']) ? $_GET['qq'] : '';
         $url = isset($_GET['url']) ? urldecode($_GET['url']) : '';
         $title = isset($_GET['title']) ? urldecode($_GET['title']) : '';
         $uincookie = isset($_GET['uincookie']) ? $_GET['uincookie'] : '';
         $src = isset($_GET['srcurl']) ? $_GET['srcurl'] : '0';
         $keyword = isset($_GET['keyword']) ? urldecode($_GET['keyword']) : '';
         $srcurl = $_GET['srcurl'];
         $ip = $_GET['ip'];
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
         if (!$domainInfo) {
               die(('/* uid error at ' . date('Y-m-d H:i:s')) . ' */');
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
         $keyword = getSoKeyword($srcurl);
		 $city = get_ip_city($ip);
			     
			 /*判断当天QQ是否记录过记录过则不记录*/
			  $findQqVar = 'webid="'.$domainInfo['id'].'" and ip = "'.$ip.'" and time < '.$dayEnd.' and time > '.$dayBegin;
			 /**/
		 if(!M("qqdata")->where($findQqVar)->field("id")->find()){
			     $data['qq'] = $qq;
		         $data['uid'] = $domainInfo['uid'];
		         $data['webid'] = $domainInfo['id'];		     
		         $data['qqnick'] = $_GET['nick'];
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
}
?>