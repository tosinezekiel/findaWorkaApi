<?php
require 'vendor/autoload.php';

use App\Database;

use App\http\Handler;

use App\http\Transform;

use App\Comment;

use App\http\api;

$api = new Api();

$response = new Handler();

$transformer = new Transform();

$db = new Database();

$comment = new Comment($db->dbconnect());



?>