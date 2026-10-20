<?php

require('functions.php');


// Connect our postgres database;


class Database {
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    public $connection;

    public function __construct() {
        $this->host = '127.0.0.1';
        $this->port = '5432';
        $this->dbname = 'php_blog';
        $this->username = 'devsh';
        $this->password = 'Shahidul56@';


        $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}";
        $this->connection = new PDO($dsn, $this->username, $this->password);

    }

    public function query($query) {
        
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}


$db = new Database();

$post = $db->query("SELECT * FROM posts");

dd($post);



require('config/router.php');

