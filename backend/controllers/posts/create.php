<?php 


$config = require base_path('config/config.php');
$db = new Database($config['database']);

$data = null;

if (isset($_GET['id'])) {

    $sql = "select * from posts where id = :id";

    $query = $db->query($sql, ['id' => $_GET['id']]);
    $data = $query->findOrFail();
}


if($data !== null) {
    $currentUserId = 1;
    authorize($data['user_id'] === $currentUserId);
}


// $postTitle = $data['title'] ?? 'Post Details';
// $postContent = $data['content'] ?? 'No content available.';

view('posts/create.view.php', [
    'heading' => 'Create Post'
]); 

?>