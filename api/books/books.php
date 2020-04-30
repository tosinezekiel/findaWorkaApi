<?php
require('../../config.php');

require('../../headers.php');

if($_SERVER['REQUEST_METHOD'] !== 'GET'){

	echo $response->error('bad request method', 401);
	return false;

}

$data = $api->getBooks();

$result=[];
$id = 1;
//transforming response
foreach($data as $list) {
	$item = [
		'id' => $id,
		'authors' => $list['authors'],
		'release_date' => $list['released'],
		'name' => $list['name'],
		'characters' => $list['characters'],
		'comment_count' => count($comment->getCommentCount($id)) > 0 ? count($comment->getCommentCount($id)) : 'null'
	];
	array_push($result, $item);
	$id++;
}


$final = $transformer->sortByKeyAsc($result,'release_date');
echo $response->success('okay',200,$final);
?>