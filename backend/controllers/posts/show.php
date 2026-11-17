<?php 


$config = require base_path('config/config.php');
$db = new Database($config['database']);

$sql = "select * from posts where id = :id";

$query = $db->query($sql, ['id' => $_GET['id']]);
$data = $query->findOrFail();


$currentUserId = 1;
authorize($data['user_id'] === $currentUserId);


// $postTitle = $data['title'] ?? 'Post Details';
// $postContent = $data['content'] ?? 'No content available.';


view('posts/show.view.php', [
    'heading' => 'Post Details',
    'postTitle' => $data['title'] ?? 'Post Details',
    'postContent' => $data['content'] ?? 'No content available.'
]); 

?>