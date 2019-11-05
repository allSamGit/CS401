<?php
session_start();

require_once('Dao.php');
require_once('form_helper.php');

$email = $_POST['login'];
$password = $_POST['password'];

$dao =new Dao();
// $valid = $dao->isValidUser($username, $password);

$messages = array();

$_SESSION['presets'] = array($_POST);

$valid = true;


if (empty($email) || empty($password)) {
$messages['emailandpassword'] = "EMAIL OR PASSWORD IS Empty";
} 

if(!valid_length($email, 1 ,50)){
	 $messages['email'] ="Enter your email";	  
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$messages['email']="Enter a valid email address.";
}
 
 
 
 if(!valid_length($password, 1 ,120)){
	 $messages['password'] ="Enter your password";
	  
 }
 


$valid = $dao->checkEmailAndPassword($email, $password);
$_SESSION['name']=$dao->getNameAndStatus($email);

   
	   
		if($valid){
		$_SESSION['access_granted']=true;
		$_SESSION['sentiment']="good";
		session_regenerate_id(true);
		
		
		$_SESSION['username']=$_SESSION['name'];
		$_SESSION['userid']=$user['id']; 
		redirectSuccess("welcome.php",NULL);

		
		}
	 
	 //we had errors
      else{
		  
		$_SESSION['sentiment']="bad";
		$messages['message'] = "Invalid username or password";
		$_SESSION['messages']=$messages;
        $_SESSION['email'] = $email;
		redirectError("login.php?error=true",$messages,$presets);
	 }
