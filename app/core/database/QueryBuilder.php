<?php 

    class QueryBuilder 
    {
        protected $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function create() 
        {
    
        }
        public function read($table) 
        {

            $statement = $this->pdo->prepare('select * from {$table}');

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);
    
        }
        public function update() 
        {
    
        }
        public function delete() 
        {
    
        }
    }