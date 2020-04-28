<?php
/**
*Format Class
*/
class Format{
	
	public function formatDate($data){
		date_default_timezone_set("Asia/Dhaka");
		return date('F j, Y', strtotime($data));
	}

	public function formatDateTime($data){
		date_default_timezone_set("Asia/Dhaka");
		return date('F j, Y, h:i A', strtotime($data));
	}

	public function formatTime(){
		date_default_timezone_set("Asia/Dhaka");
		return date('g:i A');
	}

	public function textShorten($text, $start = 0, $limit = 400){
		$text = $text. " ";
		$text = substr($text, $start, $limit);
		$text = substr($text, $start, strrpos($text, ' '));
		$text = $text.".....";
		return $text;
	}

	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}




}
?>