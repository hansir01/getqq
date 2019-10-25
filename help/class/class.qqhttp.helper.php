<?php
class QQHttp {

    var $cookie = '';
    function __cunstrut() {
    }

    function curlFunc($array)
    {
		global $qq,$cfg_user_dir;
		$cfile=$cfg_user_dir."/helper.txt";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $array['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        if( isset($array['header']) && $array['header'] ) {
            curl_setopt($ch, CURLOPT_HEADER, 1);
        }
        if(isset($array['httpheader'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $array['httpheader']);
        }
        if(isset($array['referer'])) {
            curl_setopt($ch, CURLOPT_REFERER, $array['referer']);
        }
        if( isset($array['post']) ) {
            curl_setopt($ch, CURLOPT_POST, 1 );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $array['post']);
        }
		 if( isset($array['cookiejar']) ){
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cfile); 
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cfile); 
        }
        //if( isset($array['cookie']) ){
        //    curl_setopt($ch, CURLOPT_COOKIE, $array['cookie']);
        //}
        $r['erro'] = curl_error($ch);
        $r['errno'] = curl_errno($ch);
        $r['html'] = curl_exec($ch);
        $r['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $r;
    }

    /** 
     * 获取验证码图片和cookie
     * @param Null
     * 
     * @return array('img'=>String, 'cookie'=>String)
     */
	 //http://captcha.qq.com/getimage?aid=46000101&uin=78607145&0.966684230720777&vc_type=64a8d228f6c842b345b43c982b79d7d514be72f71cd7d287
	 //vc_type 获取 http://ptlogin2.qq.com/check?uin=786071446&appid=46000101&r=
	 function getvc_type()
	{
		 global $qq;
		$vfcode = array(
            'header' => true,
            'cookiejar' => false,
            'url'=>'http://ptlogin2.qq.com/check?uin='.$qq.'&appid=46000101&r='.rand(),
        );
		$r = $this->curlFunc($vfcode);
		return $r;
	}
    function getVFCode () 
    {
        $vfcode = array(
            'header' => true,
            'cookiejar' => false,
            'url'=>'http://captcha.qq.com/getimage?aid='.$_GET['aid'].'&uin='.$_GET['uin'].'&'.$_GET['r'].'&vc_type='.$_GET['vc_type'],
        );
        $r = $this->curlFunc($vfcode);
        if ($r['http_code'] != 200 ) return false;
        $data = split("\n", $r['html']);
        preg_match('/verifysession=([^;]+);/',$data[5], $temp);
        $cookie = trim($temp[1]);
        $img = $data[10];
        return  array('img'=>$img,'cookie'=>$cookie);
    }
    /** 
     * 登陆
     * 
     * @param $cookie getvfcode中生成的cookie
     * 
     * @return array(
     *   sid=>String , //用户认证的唯一标示
     *   login => Boolean, //true 登陆成功 ，false 登陆失败
     *   server_no => String // 服务器编号
     *   active => Boolean //true 已开通 ，false 未开通 邮箱
     *   cookie => String // 获取数据cookie
     *
     * );
     */
    function preprocess($password,$verifycode) {
	 return strtoupper(md5($this->md5_3($password).strtoupper($verifycode)));
		}
    function md5_3($str) {
    return strtoupper(md5(md5(md5($str,true),true)));
             }

    function login($cookie) 
    {
		 global $qq,$verifycode,$password;
        /* 生成参数字符串 */
		$p=$this->preprocess($password,$verifycode);
        //echo $poststr = implode('&',$post);
		$poststr="aid=15004501&dumy=&fp=loginerroralert&from_ui=1&h=1&p=".strtoupper($p)."&ptlang=0&ptredirect=1&u=".strtoupper($qq)."&u1=".urlencode("http://user.qzone.qq.com/".$qq)."&verifycode=".strtoupper($verifycode);
        $login = array(
            'url'=>'http://ptlogin2.qq.com/login',
            'header' => true,
            'cookiejar' => true,
            'referer' => 'http://ui.ptlogin2.qq.com/cgi-bin/login?hide_title_bar=1&no_verifyimg=1&link_target=blank&appid=15004501&target=self&f_url=http%3A%2F%2Fcnc.qzs.qq.com%2Fqzone%2Fv5%2Floginerr.html&s_url=http%3A%2F%2Fcnc.qzs.qq.com%2Fqzone%2Fv5%2Floginsucc.html%3Fpara%3Dtoolbar',
            'httpheader'=>array(
                "Host:ptlogin2.qq.com",
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3",
                "Content-Type: application/x-www-form-urlencoded",
            ),
            'post' => $poststr ,
        );
        $data = $this->curlFunc($login);
		echo $data;
		//$data = iconv("UTF-8", "gb2312", $data);
		print_r($data);exit;
		
        //$data['html'] = iconv("gb2312", "UTF-8", $data['html']);
        if ($data['http_code'] != 200) {
            $this->error($data);
            return false;
        }
		if(substr_count($data['html'],"timeelapse")==0)
		{
		ShowMsg("Wrong!","-1");
		exit;
		}
        /* 登录后cookie的获取 ，在后续操作中用到 */
        if (preg_match_all('|Set-Cookie:([^=]+=[^;]+)|i', $data['html'], $new_cookies) ) {
            $cookiestr = implode('; ', $new_cookies[1]);
            $newcookiestr .= '; verifysession='.$cookie;//verifysession
        }
		preg_match('/skey=([^;]+);/',$data[html], $temp);
		$skey=$temp[1];
		preg_match('/ptcz=([^;]+);/',$data[html], $temp);
		$ptcz=$temp[1];
		//echo $skey;exit;
		//echo $cookiestr;exit;
		$r['skey']=$skey;
		$r['ptcz']=$ptcz;
        $r['login'] = true;
        $r['cookie'] = $newcookiestr;
		$r['cookie_base']= $new_cookies[1][1].";".$new_cookies[1][2];
		setcookie("cookie_base",$r['cookie_base']);
		return $r;
    }
	function checklogin($qq)
	{
		$openQzone = array(
            'url'=>'http://g.qzone.qq.com/cgi-bin/friendshow/friendshow_font_recent_visitor?uin='.$qq,
			'cookiejar' => true,
            'referer' => 'qzone.qq.com', 
            'httpheader'=>array(
                "Host: g.qzone.qq.com",
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3",
            ),
        );
        $data =  $this->curlFunc($openQzone);
		return $data[html];
		exit;
		//preg_match('/login_time=([^;]+);/',$data[html], $temp);
		//$login_time = trim($temp[1]);
		//print_r($data);exit;
		//return $login_time;
		//exit;
	}
	function getcontent($url)
	{
		$guestbook = array(
            'url'=> $url
        );
		$r = $this->curlFunc($guestbook);
		$data=$r[html];
		return $data;
	}
	function getcontent2($url)
	{
		$guestbook = array(
            'url'=> $url,
			'cookiejar' => true,
            'referer' => 'qzone.qq.com', 
            'httpheader'=>array(
                "Host: qzone.qzone.qq.com",
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3",
            ),
        );
		$r = $this->curlFunc($guestbook);
		$data=$r[html];
		return $data;
	}
	function getlevel($qq)
	{
		
$openQzone = array(
            'url'=>'http://vip.qzone.qq.com/fcg-bin/fcg_get_mall_ex?uin='.$qq.'&guin=&vip=need&mode=1&nf=-1',
        );
        $data =  $this->curlFunc($openQzone);
		preg_match('/level:([0-9]*),/',$data[html], $temp);
		preg_match('/vip:([0-9]*),/',$data[html], $temp1);
		preg_match('/bitmap:\'([0-9]*)\',/',$data[html], $temp2);
		$r=3;
		if($temp1[1]==1 and ($temp2[1][4]==1 or $temp[1]>=3)) $r=5;
		return $r;
	}
	function getflv($url)
	{
		//从url获取编号
		//http://www.yinyuetai.com/video/132942
		$para = array(
            'url'=> $url
        );
		$r1 = $this->curlFunc($para);
		preg_match('/name=\"videoId\" value=\"([0-9]+)\"/i',$r1[html],$videoid);//([0-9]+)
		if(empty($videoid[1])) return;
		preg_match('/<h1 id=\"videoTitle\">(.+)<\/h1>/i',$r1[html],$title);
		$ntitle=iconv("utf-8","gbk",$title[1]);
		$returnresult[1]=$ntitle;
		$poststr="flex=true&videoId=".$videoid[1];
		$flv = array(
            'url'=> "http://www.yinyuetai.com/mvplayer/get-video-info",
			'post' => $poststr,
        );
		$r = $this->curlFunc($flv);
		preg_match('/http:\/\/(.+)\.flv/i',$r[html],$flv);
		preg_match('/\/uploads\/([0-9a-zA-Z\/]+\.(jpg|gif|png))/i',$r[html],$pic);
		$returnresult[2]=$flv[0];
		if(empty($flv[0])) return;
		$returnresult[3]="http://www.yinyuetai.com".$pic[0];
		return $returnresult;
	}

}

?>
