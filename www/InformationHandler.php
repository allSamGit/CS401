
<?php
session_start();

require_once 'Dao.php';

$dao = new Dao();

$firstname =$lastname = $email = $password = $password_match = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$firstname= test_input($_POST['firstname']);
$lastname=test_input($_POST['lastname']);

$email= test_input($_POST['email']);
$password = test_input($_POST['password']);
$password_match = test_input($_POST['password_match']);


}




$errors=array();



$_SESSION['presets'] = array($_POST);


	  if(strlen($firstname) <=0 || strlen($firstname)>50){ 
	    
		 $errors['firstName']= "first name is required. Must be less than 50 characters.";
		  
	}
	  if(strlen($lastname) <=0 || strlen($lastname)>50){ 
	   
		 $errors['lastName'] = "last name is required. Must be less than 50 characters.";
		  
	}
	 
	  if(strlen($email) <=0 || strlen($email)>50){ 
	  
	     
		 $errors['email']= "email is required. Must be less than 50 characters.";
		
		  
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errors['email'] = "Must be valid email address.";
		 
	  }
	  
     if(!valid_length($password, 3 ,128)){
		 
		 $errors['password'] ="Passwords length doesn't meet the requirement.";
		 
		  
	 }else if($password != $password_match){
		
		 $errors['password_match'] = "Passwords do not match.";
		 
		 
	 }
	 $email_exists = $dao->checkEmailExists($email);
	 
		
		if ($email_exists) {
		$errors['emailExists'] = "EMAIL ALREADY EXISTS";
	
		}


	function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }
	 
/*	 function addUser(){
		$password = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
	    $dao -> addUser($firstname,$lastname,$email,$password);
     } */
	 
	 
	 //error free page
	 if(empty($errors)){
		 
	//	addUser();
	    $password = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
	    $dao -> addUser($firstname,$lastname,$email,$password);
		 $_SESSION['sentiment'] = "good";
		 header('Location: welcome.php');
	 }
	 
	 //we had errors
	 else{
		 		
		$_SESSION['errors']=$errors;
		$_SESSION['sentiment'] = "bad";
        $_SESSION['email'] = $email;

		header('Location: signupForm.php');
	 }


		 
	 
	 
	function test_input($data) {
		 
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}		


    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $errors['nameCheck'] = "Only letters and white space allowed";
    } 
 
  

?>
		



	
<p> First Name: <?php echo htmlspecialchars($firstname) ?></p>
<?php if (isset($firstNameError)) { ?>
  <span id="firstNameError" class="error"> <?php echo $firstNameError ?> </span>
<?php } ?>

<p> Last Name: <?php echo htmlspecialchars($lastname) ?></p>
<?php if (isset($lastNameError)) { ?>
  <span id="lastNameError" class="error"><?php echo $lastNameError ?></span>
<?php } ?>


<p> email: <?php echo htmlspecialchars($email) ?> </p>
<?php if (isset($emailError)) { ?>
  <span id="emailError" class="error"><?php echo $emailError ?></span>
<?php } ?>

<p> Password: <?php echo htmlspecialchars($password) ?> </p>
<?php if (isset($passwordError)) { ?>
  <span id="passwordError" class="error"><?php echo $passwordError ?></span>
<?php } ?>

<p> Password match: <?php echo htmlspecialchars($password_match) ?> </p>
<?php if (isset($passwordMatchError)) { ?>
  <span id="passwordMatchError" class="error"><?php echo $passwordMatchError ?></span>
<?php } ?>

	

	 


	