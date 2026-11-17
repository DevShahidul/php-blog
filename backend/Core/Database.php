<?php 

class Database {
    public $connection;
    protected $statement;

    public function __construct($config) {

        $dsn = 'pgsql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

    }

    public function query($query, $params = []) {
        
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;

    }

    public function get() {
        return $this->statement->fetchAll();
    }

    public function findOrFail() {
        $result = $this->statement->fetch();

        if (!$result){
            abort();
        }

        return $result;
    }
}