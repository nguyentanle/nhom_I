<?php
// CORS support
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once '../config/database.php';
spl_autoload_register(function ($className) {
  require '../models/' . $className . '.php';
});

$input = json_decode(file_get_contents('php://input'), true);

$username = $input['username'];
$content = $input['comment'];
$idPost = $input['idPost'];

date_default_timezone_set('Asia/Bangkok');
$date = date('Y-m-d h:i:s');

$comment = new Comment();
$comment->insert($username, $content, $idPost, $date);

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") exit();