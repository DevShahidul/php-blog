<?php 


$config = require('config/config.php');
$db = new Database($config['database']);

// $sql = "select * from posts where id = :id";

// $query = $db->query($sql, ['id' => $_GET['id']]);
// $data = $query->findOrFail();


$currentUserId = 12;
authorize($data['author_id'] === $currentUserId);


// $postTitle = $data['title'] ?? 'Post Details';
// $postContent = $data['content'] ?? 'No content available.';

$heading = 'Create Post';

require('views/post-create.view.php'); 

?>