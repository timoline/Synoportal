 <?php
try {
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array( 
	PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
   	));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('SET CHARACTER SET utf8');
    } catch (PDOException $e) {
		exit('Error while connecting to database.'.$e->getMessage());
	}
?>




