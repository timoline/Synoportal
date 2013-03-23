 <?php
try {
	$db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD);
} 
catch(PDOException $e) {
	echo $e->getMessage();
}
?>