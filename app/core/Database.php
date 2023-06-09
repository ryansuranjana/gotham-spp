<?php 

class Database {
    private $dbhost = DB_HOST,
            $dbuser = DB_USER,
            $dbpass = DB_PASS,
            $dbname = DB_NAME;

    private $dbh,
            $stmt;

    public function __construct()
    {   
        $option = [PDO::ATTR_PERSISTENT => true];
        if($_ENV['APP_DEBUG'] == 'true') {
            $option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        }
        $dsn = "mysql:host={$this->dbhost};dbname={$this->dbname}";
        
        try {
            $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $option);
        } catch (Exception $e) {
            if($_ENV['APP_DEBUG'] == 'true') {
                die($e->getMessage());
            } else {
                http_response_code(500);
                echo 'Internal server error';
                exit;
            }
        }
    }

    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }

    public function commit()
    {
        $this->dbh->commit();
    }

    public function rollBack()
    {
        $this->dbh->rollBack();
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) 
    {
        if(is_null($type)) {
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSingle()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function resultAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

$db = new Database;