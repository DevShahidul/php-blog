<?php

require('functions.php');
require('config/Database.php');


// Connect our postgres database;

$config = require('config/config.php');

$db = new Database($config['database']);

// $id = $_GET['id'];

// $query = "SELECT * FROM posts WHERE id = :id";

// $post = $db->query($query, ['id' => $id])->fetch();

// dd($post);



require('config/router.php');

