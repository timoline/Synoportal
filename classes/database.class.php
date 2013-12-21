 <?php
class Database {

    private $_db = null;

    /**
     * Constructor, makes a database connection
     */
    public function __construct($config) {

        try {
            $this->_db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_user'], $config['db_pass'], array( 
      			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
   			));
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->query('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            exit('Error while connecting to database.'.$e->getMessage());
        }
    }

    private function printErrorMessage($message) {
        echo $message;
    }

    /**
     * Get login 
     */
     public function getLogin($username, $password) {
        try {
            $sth = $this->_db->prepare("SELECT id FROM users WHERE username= ? AND password= ? ");

            $sth->bindValue(1, $username, PDO::PARAM_STR);
            $sth->bindValue(2, $password, PDO::PARAM_STR);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_OBJ);
			return $row->id;
        } catch (PDOException $e) {
            $this->printErrorMessage($e->getMessage());
        }
    }

    /**
     * Update login 
     */
     public function updateLogin($password) {
        try {
            $sth = $this->_db->prepare("UPDATE users SET password= ? WHERE username='admin'");

            $sth->bindValue(1, $password, PDO::PARAM_STR);
            $sth->execute();

			return $sth->rowCount();
        } catch (PDOException $e) {
            $this->printErrorMessage($e->getMessage());
        }
    }
	
	/**
	* Count data
	*/
    public function countTableData($tablename) {
        try {
            $sth = $this->_db->prepare("
            SELECT
            	COUNT(*) as c
            FROM 
            	$tablename");
      			
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();

            $rows = $sth->fetchAll(PDO::FETCH_OBJ);
			return $rows;
        } catch (PDOException $e) {
            $this->printErrorMessage($e->getMessage());
        }
    }
	
	/**
	* Get data
	*/
    public function getTableData($tablename, $start, $limit) {
        try {
            $sth = $this->_db->prepare("
            SELECT
            	*
            FROM 
            	$tablename
			ORDER BY
            	ordering ASC 
			LIMIT 
				$start, $limit");
	         			
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();

            $rows = $sth->fetchAll(PDO::FETCH_OBJ);
			return $rows;
        } catch (PDOException $e) {
            $this->printErrorMessage($e->getMessage());
        }
    }
}
?>




