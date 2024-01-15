<?php
// create class 
class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;
	
	private $dbh;
	private $error;
	private $stmt;
	
	public function __construct() {
		
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$options = array (
			// This attribute controls whether a persistent connection
			PDO::ATTR_PERSISTENT => true,
			// This attribute sets the error handling 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		);

		// Create a new PDO instanace
		try {
			$this->dbh = new PDO ($dsn, $this->user, $this->pass, $options);
		}		// Catch any errors
		catch ( PDOException $e ) {
			$this->error = $e->getMessage();
		}
	}
	
	// Prepare statement with query
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}
	
	// Bind values
	public function bind($param, $value, $type = null) {
		if (is_null ($type)) {
			switch (true) {
				case is_int ($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool ($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null ($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	
	// Execute 
	public function execute(){
		return $this->stmt->execute();
	}
	
	// Get fetch set as array of objects
	public function fetchAll(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	// fetch Asoc
	public function fetchasoc(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	// fetch single se form object
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
	// fetch  row count
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	// Returns last inserted 
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
}