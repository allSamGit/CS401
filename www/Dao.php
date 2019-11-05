<?php

Class Dao{
	
 private $host = 'us-cdbr-iron-east-05.cleardb.net';
  private $dbname = 'heroku_f5f174a4827f380';
  private $username = 'b8fbc5b0f01b40';
  private $password = 'c5867c35';

// Create connection
public function getConnection(){
	
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
	   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	   
    } catch (Exception $e) {
      echo print_r($e,1);
    }
    return $connection;
  
}
public function userExists($email){
	$conn = $this->getConnection();
	$stmt= $conn->query("SELECT * FROM User WHERE email='$email'");
	
	if($stmt->fetch()){
		return true;
	}
	else{
		return false;
	}
}

public function addUser($firstname,$lastname,$email,$password){

	$conn=$this->getConnection();
	$query ="INSERT INTO user (FirstName,LastName,Email,password) VALUES (:firstname,:lastname,:email,:password)";
	$stmt = $conn->prepare($query);	
	$stmt->bindparam(':firstname',$firstname);
	$stmt->bindparam(':lastname',$lastname);
	$stmt->bindparam(':email',$email);
	$stmt->bindparam(':password',$password);
	
	try{
	$stmt->execute();
	return true;
	}
	catch(PDOException $e)
	{
		return false;
	}
	

}



public function saveUser($first_name, $last_name, $email, $password){
  try {
    $conn = $this->getConnection();
    $query = $conn->prepare("INSERT INTO user(firstName, lastName, email, user_password) VALUES (:user_firstName, :user_lastName, :user_email, :user_password)");

    $query->bindParam(':user_firstName', $first_name);

    $query->bindParam(':user_lastName', $last_name);
  

    $query->bindParam(':user_email', $email);
   

    $query->bindParam(':user_password', $password);

    $query->execute();
   

    $userid = $this->getUserID($email);
    $query = $conn->prepare("INSERT INTO user(userid) VALUES (:user_id)");
    $query->bindParam(':user_id', $userid);

    $query->execute(); 

  } catch (PDOException $e) {
    echo "PDO error :" . $e->getMessage();
  }

  // $conn->close();
}

public function checkEmailExists($email){
  $conn = $this->getConnection();

  $query = "SELECT email FROM user WHERE email = :user_email";
  $query = $conn->prepare($query);
  $query->bindParam(":user_email", $email);
  $query->execute();
  $result = $query->fetchAll();
  return reset($result);
}

public function checkEmailAndPassword($email, $password){
  $conn = $this->getConnection();
  $password = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
  $queryStm = "SELECT email, password FROM user WHERE email = :user_email AND password = :user_password";
  $query = $conn->prepare($queryStm);
  $query->bindParam(":user_email", $email);
  $query->bindParam(":user_password", $password);
  $query->execute();
  $result = $query->fetchAll();
  return reset($result);
}

public function getProfileInfo($email){

  $userid = $this->getUserID($email);

  $conn = $this->getConnection();
  $query = "SELECT userInformation_location, userInformation_bio,
    userInformation_company, user_skill, user_position, user_preference,
      image_path FROM user_information WHERE user_id = :user_id";
  $query = $conn->prepare($query);
  $query->bindParam(":user_id", $userid);
  $query->execute();
  $result = $query->fetchAll();
  return $result;
}


public function getNameAndStatus($email){
  $conn = $this->getConnection();

  $query = "SELECT firstname, lastName FROM user WHERE email = :user_email";
  $query = $conn->prepare($query);
  $query->bindParam(":user_email", $email);
  $query->execute();
  $result = $query->fetchAll();
  return $result;
}

private function getUserID($email){
  $conn = $this->getConnection();

  $query = "SELECT UserID FROM user WHERE email = :user_email";
  $query = $conn->prepare($query);
  $query->bindParam(":user_email", $email);
  $query->execute();
  $result = $query->fetchAll();
  return $result[0]["UserID"];
}


public function saveImage($email, $imagePath){

  $userid = $this->getUserID($email);

  $conn = $this->getConnection();

  $query = "UPDATE user_information SET image_path = :image_path WHERE user_id = :user_id";

  $query = $conn->prepare($query);
  $query->bindParam(":image_path", $imagePath);
  $query->execute();
}

public function updatePassword($email, $password){
  $conn = $this->getConnection();
  $query = "UPDATE user SET password = :user_password WHERE email = :user_email";

  $password = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");

  $query = $conn->prepare($query);
  $query->bindParam(":user_password", $password);
  $query->bindParam(":user_email", $email);
  $query->execute();

}

public function deleteAccount($email){
  $conn = $this->getConnection();
  $query = "DELETE FROM user WHERE email = :user_email";

  $query = $conn->prepare($query);
  $query->bindParam(":user_email", $email);
  $query->execute();

}

public function deleteAccountInfo($email){

  $userid = $this->getUserID($email);

  $conn = $this->getConnection();
  $query = "DELETE FROM user WHERE userID = :user_id";

  $query = $conn->prepare($query);
  $query->bindParam(":user_id", $userid);
  $query->execute();

}

public function validateUser($email,$password)
{
  $conn = $this->getConnection();
  $query = "SELECT password FROM user WHERE email=:email";

  $query = $conn->prepare($query);
  $query->bindParam(":email", $email);
  $query->execute();
  $row=$query->fetch();
  
  if(!$row){
	  return false;
  }
  $digest=$row['password'];
  
  return password_verify($password,$digest);
}


}