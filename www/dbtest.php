<?php 

require_once('Dao.php');
require_once('form_helper.php'); 

$dao =new Dao();

$exists = $dao -> userExists('john@example.com');
var_dump($exists);

$exists=$dao->userExists('doesnotexist@gmail.com');
var_dump($exists);


$firstname="New User";
$lastname="New User2";
$email="newuser@mail.com";
$password="superpassword";

if($dao->userExists($email))
{
	echo "Can't add user.Already exists.";
}
else{
  if($dao -> addUser($firstname,$lastname,$email,$password)){
	echo "User Successfully added";
  }
  else{
	echo "oh no!Something unexpected happened";	
  }
}

if ($dao->checkEmailAndPassword($email,$password)){
	echo "welcome back $firstname!";
}
else{
	echo "<br> Invalid email or password.";
	echo "$email, $password";
}

$getname=$dao->getNameAndStatus($email);
var_dump($getname[0][1]);
var_dump($getname[0][0]);

if ($dao->getNameAndStatus($email)){
	echo "welcome back $firstname!";
}
else{
	echo "<br> Invalid email or password.";
	echo "$email, $password";
}


$valid = $dao->checkEmailAndPassword($email,$password);


	   
/**		if(!$valid){
		redirectSuccess("welcome.php");
			echo "redirect success";
		}
	 
	 //we had errors
      else{
	   redirectError("login.php",$errors,$presets);
	   echo "redirect error";
	 }
*/
		
	

?>