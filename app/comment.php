<?php

namespace App;

use PDO;
class Comment{
	private $conn;
	private $table = "comments";

	public $id;
	public $name;
	public $book_id;
	public $comment;
	public $created_at;
	public $ip;
	public $status;

	public function __construct($db){
		$this->conn = $db;
	}


	/**
		get all comments
	*/
	public function getAll(){
		$query = 'select * from '.$this->table.' order by id desc';
		$statement = $this->conn->prepare($query);
		$statement->execute();
		return $statement;
	}

	/**
		show single comment
	*/
	public function show(){
		$query = 'select * from '.$this->table.' where id = ?';
		$statement = $this->conn->prepare($query);
		$statement->execute([$this->id]);
		return $statement;
	}

	/**
		get comment count per book
	*/
	public function getCommentCount($book_id){
		$query = 'select * from '.$this->table.' where book_id = ?';
		$statement = $this->conn->prepare($query);
		$statement->execute([$book_id]);
		$result = [];
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				$item = [
					'id' => $id,
					'name' => $name,
					'book_id' => $book_id,
					'ip' => $ip,
					'created_at' => $created_at,
					'comment' => $comment
				];
			array_push($result, $item);
		}
		return $result;
	}

	/**
		create new comment
	*/

	public function create(){
		$query = 'insert into '.$this->table.'(name,book_id,comment,created_at,status,ip) values (?,?,?,?,?,?)';
		$statement = $this->conn->prepare($query);
		$statement->execute([$this->name,$this->book_id,$this->comment,$this->created_at,$this->status,$this->ip]);
		$this->id = $this->conn->lastInsertId();
		$data = $this->show();
		return $data;
	}
}

?>