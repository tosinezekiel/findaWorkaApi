<?php
namespace App\http;
class Handler{

	/**
		success response wrapper
	*/
	public function success($message, $status,$data){
		$response = array(['data' => $data, 'message' => $message, 'status_code' => $status,'method'=> $_SERVER['REQUEST_METHOD']]);
		return json_encode($response);
	}

	/**
		error response wrapper
	*/
	public function error($message, $status){
		$response =  array(['status' => $message,'status_code' => $status,'method'=> $_SERVER['REQUEST_METHOD']]);
		return json_encode($response);
	}
}


?>