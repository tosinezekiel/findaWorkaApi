<?php
require('../../config.php');

require('../../headers.php');

if($_SERVER['REQUEST_METHOD'] !== 'GET'){

	echo $response->error('bad request method',401);
	return false;

}
$data = $comment->getAll(); 

$result = array();

if($data->rowCount() > 0){
	while($row = $data->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$item = array(
				'id' => $id,
				'name' => $name,
				'ip_address' => $ip,
				'book_id' => $book_id,
				'comment' => $comment,
				'created_at' => $created_at,
		);
		array_push($result, $item);
	}
}

echo $response->success('okay',200,$result);



?>