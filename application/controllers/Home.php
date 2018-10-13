<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends Infrastructure {

	//建構預載入需要執行的model
	public function __construct() {
		parent::__construct();
		$this->load->model("home_model");
	}

	public function index() {
		$this->load->view("home_view");
	}

	public function captcha(){
		$vals = array(
	        'word' => '',
	        'img_path' => 'C:\xampp\htdocs\stuHot\dist\captcha\\',
	        'img_url' => base_url().'dist/captcha/',
	        'font_path' => '',
	        'img_width' => '150',
	        'img_height' => 50,
	        'expiration' => 7200,
	        'word_length' => 4,
	        'font_size' => 100,
	        'img_id' => 'Imageid',
	        'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	        // 白底 黑字 紅色干擾線
	        'colors' => array(
	            'background' => array(255, 255, 255),
	            'border' => array(255, 255, 255),
	            'text' => array(0, 0, 0),
	            'grid' => array(255, 40, 40)
	        )
	    );
	    $cap = create_captcha($vals);
	    $_SESSION['captcha'] = $cap['word'];
	    echo $cap['image'];
	}

	public function submit(){
		$post = $this->xss($_POST);
		if(isset($post['name']) && isset($post['schoolNumber']) && isset($post['phone']) && isset($post['opinion']) && isset($post['captcha'])){
			if(mb_strlen($post['name'], "utf-8")<2 || mb_strlen($post['name'], "utf-8")>15){
				echo 2;
				exit();
			}
			if (!preg_match("/^[0-9]{8,8}$/", $post['schoolNumber'])) {
				echo 3;
				exit();
			}
			if (!preg_match("/^[0-9]{10,10}$/", $post['phone'])) {
				echo 4;
				exit();
			}
			if ($_SESSION['captcha'] != $post['captcha']) {
				echo 5;
				exit();
			}
			if(!$this->home_model->checkSchoolNumber($post['schoolNumber'])){
				echo 6;
				exit();
			}
			$token = $this->getNewToken();
			$this->home_model->addReason($post['name'],$post['schoolNumber'],$post['phone'],$post['opinion'],$token);
			$this->email->from('stuhot.system@gmail.com','樹德連署-系統信件');
			$this->email->to('s'.$post['schoolNumber'].'@stu.edu.tw');
			$this->email->subject("【連署認證信】感謝您，請執行連署的最後一步！");
			$this->email->message($this->home_model->getEmailText($post['schoolNumber']));
			if($this->email->send()){
				echo 1;
			}else{
				$this->home_model->delReason($post['schoolNumber']);
				echo 7;
			}
		}else{
			echo 444;
		}
	}

	public function check(){
		$get = $this->xss($_GET);
		if(isset($get['schoolNumber']) && isset($get['token'])){
			if($this->home_model->checkRealReason($get['schoolNumber'])){
				if($this->home_model->realReason($get['schoolNumber'],$get['token'])){
					echo '<h2>連署成功，將在兩秒後轉跳</h2>';
					echo '<script>setTimeout(function(){window.location.href ="'.base_url().'";},2000)</script>';
				}else{
					redirect("home");
				}
			}else{
				echo '<h2>已認證成功了，請勿重新認證，將在兩秒後轉跳</h2>';
				echo '<script>setTimeout(function(){window.location.href ="'.base_url().'";},2000)</script>';
			}
		}else{
			redirect("home");
		}
	}

	public function allCount(){
		echo $this->home_model->allCount();
	}

	public function getTimeLine(){
        echo $this->home_model->getTimeLine();
	}

	public function getAllPetition(){
		$post = $this->xss($_POST);
		if(isset($post['start'])){
			echo $this->home_model->getAllPetition($post['start']);
		}
	}
}
