<?php 


$config = require('config/config.php');
$db = new Database($config['database']);

$sql = "select * from posts where id = :id";

$query = $db->query($sql, ['id' => $_GET['id']]);
$data = $query->fetch();

if (!$data) {
    abort();
}

$currentUserId = 12;

if($data['author_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}


$postTitle = $data['title'] ?? 'Post Details';
$postContent = $data['content'] ?? 'No content available.';

$heading = 'Post Details';

require('views/post.view.php'); 

?>