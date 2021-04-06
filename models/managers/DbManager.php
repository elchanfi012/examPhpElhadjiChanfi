<?php 

    abstract class DbManager{
        
        protected $bdd;
        private $sgbd = 'mysql';
        private $host = 'localhost';
        private $port = '3306';
        private $dbName = 'exam_php';
        private $username = 'root';
        private $password = '';
        private $charset = 'utf8mb4';

        public function __construct()
        {
            $dsn = $this->sgbd .":host=$this->host;port=$this->port;dbname=$this->dbName;charset=$this->charset";

            try {
            $this->bdd =new \PDO($dsn, $this->username, $this->password , [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            } catch (\PDOException $e){
                throw new \PDOException($e->getMessage(),(int)$e->getCode());
          
            }

        }
    }

?>