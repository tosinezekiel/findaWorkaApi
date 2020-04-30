<?php
require('../../config.php');

require('../../headers.php');

if($_SERVER['REQUEST_METHOD'] !== 'POST'){

	echo $response->error('bad request method',401);
	return false;

}
if(isset($_REQUEST['name']) && isset($_REQUEST['book_id']) && isset($_REQUEST['comment'])){

		
		if(strlen($_REQUEST['comment'] > 500)){
			echo $response->error('comment character must be less or equal to 500',500);
			return false;
		}else if(empty($_REQUEST['name']) || empty($_REQUEST['book_id']) || empty($_REQUEST['comment'])){
			echo $response->error('one more parameters are empty',500);
			return false;
		}
		$date = date('Y-d-mTG:i:sz', time());
		$ip = $_SERVER['REMOTE_ADDR'];

		$comment->name = $_REQUEST['name'];
		$comment->book_id = (int) $_REQUEST['book_id'];
		$comment->comment = $_REQUEST['comment'];
		$comment->created_at = $date;
		$comment->ip = $ip;
		$comment->status = "created";
		$data = $comment->create();
		$result = $data->fetch(PDO::FETCH_ASSOC);
		echo $response->success('comment created successfully',201,$result);

}else{
	echo $response->error('one more parameters is not set; unprocessible entity',422);
	return false;
}



?>