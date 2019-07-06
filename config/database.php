<?php 


class Database {
    private $host = "";
    private $dbname = "";
    private $username = "";
    private $password = "";
    private $conn;

    public function __construct()
    { 
    	$json = file_get_contents(__DIR__ . '/parameters.json');
    	$params = json_decode($json);
    	$this->host=$params->host;
    	$this->dbname=$params->dbname;
    	$this->username=$params->username;
    	$this->password=$params->password;
    }

    public  function getConnection()
    {
    	$this->conn = null;

    	try {
    		$this->conn = new PDO(
                'mysql:host=' . $this->host . ";dbname=" . $this->dbname, 
                $this->username, 
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)   
            );
    	} catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    public function makeTransaction($sql)
    {
    	try {
	    	$this->conn->beginTransaction();
	    	$req = $this->conn->prepare($sql);
	    	$req->execute();
	    	return $req->fetchAll(PDO::FETCH_ASSOC);
	    	$this->conn->commit();
    	} catch(PDOException $e) {
    		echo('Database Error 1 : ' . $e->getMessage());
    		$this->conn->rollback();
    	}
    }
}