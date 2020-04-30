<?php
namespace App\http;

class Transform{
	/**
		sorting in ascending order
	*/
	public function sortByKeyAsc($array, $key){
		if(is_array($array)){ 
			array_multisort(array_column($array, $key), SORT_ASC, $array);
			return $array;
		}
	}

	/**
		sorting in descending order
	*/
	public function sortByKeyDesc($array, $key){
		if(is_array($array)){ 
			array_multisort(array_column($array, $key), SORT_DESC, $array);
			return $array;
		}
	}

	/**
		filter response for ASC or DESC
	*/
	public function filterResponse($array,$key,$sort){
		if(is_array($array)){ 
			switch ($sort) {
				case 'ASC':
					$response = $this->sortByKeyAsc($array, $key);
					break;
				case 'DESC':
					$response = $this->sortByKeyDesc($array, $key);
					break;
				default:
					$response = $array;
					break;
			}
			return $response;
		}
	}

	/**
		filter by gender
	*/
	public function sortByGender($array,$gender){
		
		$result = array_filter($array,function($el) use ($gender){
			return $el['gender'] == $gender;
		});
		return $result;
	}
	
}

?>