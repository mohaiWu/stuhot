<?php
date_default_timezone_set("Asia/Taipei");

class Infrastructure extends CI_Controller {

	public function __construct(){
		parent::__construct();
		session_start();
		header("X-Frame-Options: DENY");
		// if(!((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on')||(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])&&$_SERVER['HTTP_X_FORWARDED_PROTO']=='https'))){
		//     Header("HTTP/1.1 301 Moved Permanently");
		//     if(preg_match("/www/i", $_SERVER['SERVER_NAME'])){
		//     	header('Location: https://stuhot.at.tw'.$_SERVER['REQUEST_URI']);
		//     }else{
		//     	header('Location: https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
		//     }
		//     exit();
		// }else{
		//     if(preg_match("/www/i", $_SERVER['SERVER_NAME'])){
		// 		Header("HTTP/1.1 301 Moved Permanently");
		//     	header('Location: https://stuhot.at.tw'.$_SERVER['REQUEST_URI']);
		// 		exit();
		//     }
		// }
	}

	//資料消毒
	public function xss(array $array){

		foreach ($array as &$value){
			if(is_array($value)){
				$value = $this->xss($value);
			}else{
				$value = $this->security->xss_clean($value);
			}
		}
		
		return $array;
	}

	//亂數
	public function getNewToken(){
        $key = '';
        $word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $len = strlen($word);
        for ($i = 0; $i < 20; $i++) {
            $key .= $word[rand() % $len];
        }
        return $key;
    }
}

?>