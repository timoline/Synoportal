<?php
class login
{
    private $password;
    private $username;
    
    private $user_id;
    
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        
        $this->checkFields();
        $this->checkLogin();
    }
    
	private function checkFields()
    {
        if(empty($this->username))
            throw new Exception("Geen username ingevuld");
        if(empty($this->password))
            throw new Exception("Geen wachtwoord ingevuld");
    }

	private function checkLogin()
	{
        $pdo = new PDO (mysql:host=localhost;dbname='','', '');
		$salt = "@#mIa@$90()4//>a";
		$sql = "SELECT username, users_id FROM users WHERE username = :user AND `password` = :passw";
		$run = $pdo->prepare($sql);
		$data = array(
			'user' => $this->username,
			'passw' => sha1($salt.$this->password.$this->username)
		);

		$run->execute($data);
		if($run->fetchColumn())
		{
			$this->logIn();
			$sql = "SELECT
					users_id
					FROM
					users
					WHERE
					username = '".$_SESSION['username']."'";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_id'] = $row['users_id'];
		}
		else
		throw new Exception("Login of wachtwoord is fout");
		$sql = "UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE username = '$this->username'";
		$q = $pdo->prepare($sql);
		$q->execute();
	}
	
	private function logIn()
	{
	$_SESSION['username'] = $this->username;
    echo "U bent ingelogd";
    }
	
    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
?>