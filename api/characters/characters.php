<?php
require('../../config.php');

require('../../headers.php');

if($_SERVER['REQUEST_METHOD'] !== 'GET'){

	echo $response->error('bad request method', 401);
	return false;

}

$sort = array('ASC','DESC');

$data['data'] = $api->getCharacterList();

/**
	sort by name if set
*/
if(isset($_GET['name'])){
	if(in_array($_GET['name'], $sort) && !empty($_GET['name'])){

		$final = $transformer->filterResponse($data,'name',$sort);
		$final['meta_data'] = array([
			'total_characters' => count($final['data']),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
		]);
		echo $response->success('okay',200,$final);

		return true;
	}

	$final = $transformer->filterResponse($data,'name',$sort);

	$final['meta_data'] = array([
			'total_characters' => count($final['data']),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
			]);

	echo $response->success('okay',200,$final);

	return true;

}else if(isset($_GET['age'])){
	//sort by age if set
	if(in_array($_GET['age'], $sort) && !empty($_GET['agae'])){

		$final = $transformer->filterResponse($data,'age',$sort);

		$final['meta_data'] = array([
			'total_characters' => count($final['data']),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
		]);

		echo $response->success('okay',200,$data);

		return true;
	}

	$final = $transformer->filterResponse($data,'name',$sort);

	$final['meta_data'] = array([
			'total_characters' => count($final['data']),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
		]);

	echo $response->success('okay',200,$data);

	return true;

}else if(isset($_GET['gender'])){
	//filter by gender if set
	if(!empty($_GET['gender'])){
		$gender = $_GET['gender'];
		$final = $transformer->sortByGender($data['data'],ucfirst($gender));

		$final['meta_data'] = array([
			'total_characters' => count($final),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
		]);

		echo $response->success('okay',200,$final);

		return true;
	}
	$data['meta_data'] = array([
			'total_characters' => count($data['data']),
			'total_age' => 'age not specified',
			'total_heigth' => 'heigth not specified'
		]);

	echo $response->success('okay',200,$data);
	
	return true;
}

	$data['meta_data'] = array([
				'total_characters' => count($data['data']),
				'total_age' => 'age not specified',
				'total_heigth' => 'heigth not specified'
			]);
	echo $response->success('okay',200,$data);


?>