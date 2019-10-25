<?php


function getQQs(){
	return explode("|",trim(file_get_contents('qq.txt')));
}

function login($ac){
    if(isset($_SESSION['uid'])){
	    $sql = M("members")->where(array("id"=>$_SESSION['uid']))->find();
		if($ac == "sitecount"){
		   $count = M("sites")->where(array("uid"=>$_SESSION['uid']))->count();
		   return $count;
		}else if($ac == "loginip"){
		   return $sql['loginip'];
		}
	}
}


function SiteSendMail($to,$uid,$webid){    
	
	     $maildata = S('mail'.md5($webid.$uid));
		 if(!$maildata){
		     $maildata = M("maildata")->where(array("webid" => $webid, "uid"=>$uid))->select();
			 if($maildata){
			     S('mail'.md5($webid.$uid),$maildata,3600);				 
			  }
		 }		 
		 if($maildata){
		              
						 $count = count($maildata);						
						 if($count == 1){
						     $info = $maildata[0];
						 }else{
						     $rand = rand(1,$count);
							 $rand = $rand-1;
							 $info = $maildata[$rand];
						 }
						
						 $mailTpl = getMailTpl($info['tplid']);
						
						 C('SMTP_SERVER',$info['mailhost']);					//邮件服务器
	                     C('SMTP_PORT',$info['mailport']);								//邮件服务器端口
	                     C('SMTP_USER_EMAIL',$info['mailuser']); 	//SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
	                     C('SMTP_USER',$info['mailuser']);			//SMTP服务器账户名
	                     C('SMTP_PWD',$info['mailpass']);							//SMTP服务器账户密码
	                     C('SMTP_MAIL_TYPE','HTML');						//发送邮件类型:HTML,TXT(注意都是大写)
	                     C('SMTP_TIME_OUT','30');							//超时时间
	                     C('SMTP_AUTH',true);								//邮箱验证(一般都要开启)
						 import('ORG.Email');//导入本类
                         $data['mailto'] 	= 	$to."@qq.com"; //收件人
                         $data['subject'] =	$mailTpl['title'];    //邮件标题
                         $data['body'] 	=	html_entity_decode(stripslashes($mailTpl['body']));    //邮件正文内容
                         $mail = new Email();
						 if($mail->send($data)){
				             $log['type'] = 1;
				         }else{
				             $log['type'] = 0;
				          }
				         $log['uid'] = $uid;
				         $log['webid'] = $webid;
				         $log['mailuser'] = $info['mailuser'];
				         $log['tpl'] = $mailTpl['body'];
						 $log['time'] = time();
						 M("maillog")->add($log);
						 
		            }
}

function getMailTpl($id){
    $info = S($id);
	if(!$info){
	     $info = M("mailTpl")->where(array("id"=>$id))->find();
		 S($id,$info,3600);
	}
	return $info;
}

function getUserVipInfo(){
     $uid = $_SESSION['uid'];
	 $sql = M("members")->where(array("id" => $uid))->field("vipstartime,vipendtime")->find();
	 return $sql;
}

function get_domain($id){
  $map['id'] = $id;
  $sql = M("sites")->where($map)->field("domain")->find();
  return $sql['domain'];
}

function getRootUrl(){
	$name = '';
	if ( isset($_SERVER['HTTP_HOST']) ){
		$name = $_SERVER['HTTP_HOST'];
	}else{
		$name = $_SERVER['SERVER_NAME'];
	}
	if ( strpos($name,':') === false && $_SERVER['SERVER_PORT'] != 80 ){
		$name .= ':'.$_SERVER['SERVER_PORT'];
	}
	$path = $_SERVER['PHP_SELF'];
	$path = substr($path,0,strrpos($path,'/')+1);

	return 'http://'.$name . $path;
}
function escape($str) {
	preg_match_all("/[\x80-\xff].|[\x01-\x7f]+/",$str,$r);
	$ar = $r[0];
	foreach($ar as $k=>$v) {
		   if(ord($v[0]) < 128)
			 $ar[$k] = rawurlencode($v);
		   else
			 $ar[$k] = "%u".bin2hex(iconv("UTF-8","UCS-2",$v));
	}
	return implode('',$ar);
}

function getRndStr(){
	$len = rand(5,11);
	static $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$s = '';
	for($i=0;$i<$len;$i++){
		if ( $i == 0 ){
			$s .= $str{rand(0,strlen($str)-1-10)};
		}else{
			$s .= $str{rand(0,strlen($str)-1)};
		}
	}
	return $s;
}

function user_ip() {
	if ( !empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ;
	}else if ( !empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'] ;
	}else if ( !empty($_SERVER['HTTP_X_REAL_IP'])){
		$ip = $_SERVER['HTTP_X_REAL_IP'] ;
	}else if ( !empty($_SERVER['REMOTE_ADDR'])){
		$ip = $_SERVER['REMOTE_ADDR'] ;
	}else{
		$ip = '127.0.0.1' ;
	}
	if ( $ip == '::1' ){
		$ip = '127.0.0.1' ;
	}
	return $ip;
}

function get_ip_city2($ip){
	$ip = @json_decode(file_Get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip),true);
	if ( isset($ip['province']) && isset($ip['city']) ){
		return trim($ip['province'] . ' ' . $ip['city'] );
	}else{
		return '-';
	}
}

function get_ip_city($ip){
	$ip = @json_decode(file_Get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip),true);
	if ( isset($ip['data']['region']) && isset($ip['data']['city']) ){
		if ( substr($ip['data']['region'],-3) == '省' ){
			$ip['data']['region'] = substr($ip['data']['region'],0,-3);
		}
		if ( substr($ip['data']['city'],-3) == '市' ){
			$ip['data']['city'] = substr($ip['data']['city'],0,-3);
		}
		return trim($ip['data']['region'] . ' ' . $ip['data']['city'] );
	}else{
		return '-';
	}
}

function get_qqVisiter($qq){
	$html = file_Get_contents('http://115.28.223.97/api.php?friendshow=show&qq='.$qq);
    preg_match("/\"uin\":(.*?),/is",$html,$qq);
	$qq = $qq[1];
	preg_match("/\"name\":(.*?),/is",$html,$name);
	$data['qq'] = $qq;
	$data['nickname'] = $name[1];
	return $data;

}

function get_paipai($qq){
   $html = file_Get_contents('http://bbs.paipai.com/home.php?mod=space&uid='.$qq);
	$html = str_replace(array("\r","\n","\t"," "),'',$html);
	$html=iconv("GBK","UTF-8",$html);//引擎为gbk
	$visit = _substr($html,'最近访客','</ul>');
	
	$data['qq'] = _substr($visit,'title="','">');
	

	if ( !$data['qq'] ){
		$data['qq'] = 0;
	}
	
	if ( $data['qq'] ){
		$html = file_Get_contents('http://meishi.qq.com/profiles/'.$data['qq']);
		$data['sex'] = _substr($html,'<span class="re">','<');
		$html = str_replace(array("\r","\n","\t"," "),'',$html);
		$data['nickname'] = _substr($html,'100"/>','<');
	}
	if ( !isset($data['sex']) || $data['sex']!='男' &&  $data['sex']!='女'  &&  $data['sex']!='未知' ){
		$data['sex'] = '未知';
	}
	
	if ( !$data['nickname'] ){
		$data['nickname'] = '-';
	}
	
	return $data;
}

function _substr($html,$start,$end = false){
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

function xmd5($str ,$flg = false){
    if($flg == true){
	   return md5($str."www.baidu.com");
	}else{
	   return md5($str);
	}
}

function getVipInfo($uid){
     $vipInfo = S("vip".$uid);
     if(!$vipInfo){
         $vipInfo = M("members")->where(array('id' => $uid))->field("vipstartime,vipendtime")->find();
		 S("vip".$uid,$vipInfo,3600);
     }
	 return $vipInfo;
}

function getCount($ac){
   if($ac == "alluser"){
      return M("members")->count();
   }else if($ac == "allsite"){
       return M("sites")->count();
   }
}

function getSoKeyword($url){
     $search_1="google.com"; //q= utf8
     $search_2="baidu.com"; //wd= gbk
     $search_3="yahoo.cn"; //q= utf8
     $search_4="sogou.com"; //query= gbk
     $search_5="soso.com"; //w= gbk
     $search_6="bing.com"; //q= utf8
     $search_7="youdao.com"; //q= utf8
  
     $google=preg_match("/google.com/",$url);//记录匹配情况，用于入站判断。
     $baidu=preg_match("/baidu.com/",$url);
     $yahoo=preg_match("/yahoo.cn/",$url);
     $sogou=preg_match("/sogou.com/",$url);
     $soso=preg_match("/soso.com/",$url);
     $bing=preg_match("/bing.com/",$url);
     $youdao=preg_match("/youdao.com/",$url);
	 if($google){
	     $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
         $s_s_keyword=urldecode($s_s_keyword);
	     
	 }else if($baidu){
	     $s_s_keyword=get_keyword($url,'wd=');//关键词前的字符为"wd="。
         $s_s_keyword=urldecode($s_s_keyword);
        // $s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk         
	    
	 }else if($yahoo){
	     $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
         $s_s_keyword=urldecode($s_s_keyword);
	    
	 }else if($sogou){
	     $s_s_keyword=get_keyword($url,'query=');//关键词前的字符为"query="。
         $s_s_keyword=urldecode($s_s_keyword);
		 $s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk 
	 }else if($soso){
	     $s_s_keyword=get_keyword($url,'query=');//关键词前的字符为"w="。
         $s_s_keyword=urldecode($s_s_keyword);
         //$s_s_keyword=iconv("GBK","UTF-8",$s_s_keyword);//引擎为gbk
	 }else if($bing){
	     $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
         $s_s_keyword=urldecode($s_s_keyword);
	 }else if($youdao){
	     $s_s_keyword=get_keyword($url,'q=');//关键词前的字符为"q="。
         $s_s_keyword=urldecode($s_s_keyword);
	    
	 }
	 return $s_s_keyword;
}

function get_keyword($url,$kw_start)
  {
   $start=stripos($url,$kw_start);
   $url=substr($url,$start+strlen($kw_start));
   $start=stripos($url,'&');
    if ($start>0)
    {
     $start=stripos($url,'&');
     $s_s_keyword=substr($url,0,$start);
    }
    else
    {
    $s_s_keyword=substr($url,0);
    }
   return $s_s_keyword;
  }
  
 function exportexcel($data=array(),$title=array(),$filename='report'){
     header("Content-type:application/octet-stream");
     header("Accept-Ranges:bytes");
     header("Content-type:application/vnd.ms-excel");  
     header("Content-Disposition:attachment;filename=".$filename.".xls");
     header("Pragma: no-cache");
     header("Expires: 0");
     //导出xls 开始
     if (!empty($title)){
         foreach ($title as $k => $v) {
             $title[$k]=iconv("UTF-8", "GB2312",$v);
         }
         $title= implode("\t", $title);
         echo "$title\n";
     }
     if (!empty($data)){
         foreach($data as $key=>$val){
             foreach ($val as $ck => $cv) {
                 $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
             }
             $data[$key]=implode("\t", $data[$key]);
             
         }
         echo implode("\n",$data);
     }
 }
?>