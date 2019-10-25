<?php
 class TjAction extends Action{
     public function index(){
	      if (isset($_GET['jsuid']) && is_numeric($_GET['jsuid'])) {
		     header('Content-type: application/x-javascript; charset=utf-8');
             header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
             header(('Last-Modified: ' . gmdate('D, d M Y H:i:s')) . ' GMT');
             header('Cache-Control: no-cache, must-revalidate');
             header('Pramga: no-cache');
             $uid = $_GET['jsuid'];
			 $data = M("sites")->where(array('id'=>$uid))->find();
             if (!$data) {
                die('/* UID ERROR */');
             }
             $qq = getQQs();
             $qq = $qq[rand(0, count($qq) - 1)];
             //$url = getRootUrl();
			 $url = "http://".$_SERVER['HTTP_HOST'].'/index.php/Do/save/';
			 $js = file_get_contents('jstpl.js');
			
             $js = str_replace('{qq}', "1000".rand(10001,99999) , $js);
		 $js = str_replace('{qq1}', "1000".rand(10001,99999) , $js);
             $js = str_replace('{uid}', $uid, $js);
             $js = str_replace('{_URL}', $url, $js);
			 echo $js;
		 }
	 
	 }
     public function index2(){
	     import("@.Action.JavaScriptPacker");
	     if (isset($_GET['jsuid']) && is_numeric($_GET['jsuid'])) {
             header('Content-type: application/x-javascript; charset=utf-8');
             header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
             header(('Last-Modified: ' . gmdate('D, d M Y H:i:s')) . ' GMT');
             header('Cache-Control: no-cache, must-revalidate');
             header('Pramga: no-cache');
             $uid = $_GET['jsuid'];
             //$data = $db->fetch_first('SELECT `id` FROM `users` WHERE `id`=' . $uid);
			 $data = 'd';
             if (!$data) {
                die('/* UID ERROR */');
             }
             $qq = getQQs();
             $qq = $qq[rand(0, count($qq) - 1)];
             //$url = getRootUrl();
			 $url = "http://".$_SERVER['HTTP_HOST'].'/index.php/Do/index/';
			 $js = file_get_contents('jstpl.js');
			
             $js = str_replace('{_QQ}', $qq, $js);
             $js = str_replace('{_UID}', $uid, $js);
             $js = str_replace('{_URL}', $url, $js);
             $JSPacker = new JavaScriptPacker($js, 'Normal', TRUE, FALSE);
             $js = $JSPacker->pack();
             $js = ('eval(unescape("' . escape($js)) . '"))';
             $JSPacker = new JavaScriptPacker($js, 'Normal', TRUE, FALSE);
             $js = $JSPacker->pack();
             $js = ('eval(unescape("' . escape($js)) . '"))';
             $eval = getRndStr();
             $js = (((((((('var/*' . getRndStr()) . "*/{$eval}/*") . getRndStr()) . '*/=/*') . getRndStr()) . '') . getRndStr()) . '*/') . $js;
             $unescape = getRndStr();
             $js = (((((((('var/*' . getRndStr()) . "*/{$unescape}/*") . getRndStr()) . '*/=/*') . getRndStr()) . '*/\\u0075\\u006e\\u0065\\u0073\\u0063\\u0061\\u0070\\u0065;/*') . getRndStr()) . '*/') . $js;
             $js = str_replace('eval(', $eval . '(', $js);
             $js = str_replace('unescape(', $unescape . '(', $js);
             $js = explode('%28', $js);
             for ($i = 0; $i < count($js); $i++) {
                  $js[$i] = ((((('/*' . getRndStr()) . '*/') . $js[$i]) . '/*') . getRndStr()) . '*/';
             }
             $js = implode('%28', $js);
             $js = str_replace('(', ('/*' . getRndStr()) . '*/(', $js);
             $js = str_replace(')', ((('/*' . getRndStr()) . '*/)/*') . getRndStr()) . '*/', $js);
             echo $js . '//jsmi.net By xuanku/**/';
             die;
         }
	 }
 }
?>