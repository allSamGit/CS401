<?php
session_start();


$presets = array();
  if (isset($_SESSION['presets'])) {
    $presets = array_shift($_SESSION['presets']);
  }
?>

<html>

<head> 
<link rel="stylesheet" href="form.css">
</head>
<style>
.error{color:red;}
</style>

<body>
<div class="Signup-Title" >

<h1>Sign Up Form</h1>

<p>Enter your information to sign up</p>
<hr>
</div>

<div class="session_error">

<?php if (isset($_SESSION['errors']['emailExists'])) { ?>
	<span class="error"><?php echo $_SESSION['errors']['emailExists'] ?></span>
	<?php } ?>
	
<?php if (isset($_SESSION['errors']['nameCheck'])) { ?>
	<span class="error"><?php echo $_SESSION['errors']['nameCheck'] ?></span>
	<?php } ?>
	
	<?php echo  "<br><br>";?>
</div>

<div class="Signup-Form">
    
  <form action="/InformationHandler.php" method="post">
  
    <label for="fname">First Name: </label>
    <input type="text" id="fname" name="firstname" value="<?php echo isset($presets['firstname']) ? $presets['firstname'] : ''; ?>" placeholder="Your name.."  >
  
      <?php if (isset($_SESSION['errors']['firstName'])) { ?>
	<span class="error"><?php echo $_SESSION['errors']['firstName']  ?></span>
	<?php } ?>
	
	<?php echo  "<br>";?>
	
    <label for="lname">Last Name: </label>
    <input type="text" id="lname" name="lastname"  value="<?php echo isset($presets['lastname']) ? $presets['lastname'] : ''; ?>" placeholder="Your last name.." >
	
   <?php if (isset($_SESSION['errors']['lastName'])) { ?>
	<span class="error"><?php echo $_SESSION['errors']['lastName'] ?></span>
	<?php } ?>
	
	<?php echo  "<br>";?>
	
	
     <label for="email"><b>Email: </b></label>
      <input type="text"  id="email" name="email"  value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?>"  placeholder="Enter Email"  required>  
	  
	  <?php if (isset($_SESSION['errors']['email'])) { ?>
	<span  class="error"><?php echo $_SESSION['errors']['email'] ?></span>
	<?php } ?> 
	
	<?php echo  "<br>";?>

      <label for="password"><b>Password: </b></label>
      <input type="password" name="password" value="<?php echo isset($presets['password']) ? $presets['password'] : ''; ?>" placeholder="Enter Password" required>
	  
	   <?php if (isset($_SESSION['errors']['password'])) { ?>
	<span  class="error"><?php echo $_SESSION['errors']['password'] ?></span>
	<?php } ?> 
	
	<?php echo  "<br>";?>

      <label for="password_match"><b>Repeat Password: </b></label>
      <input type="password" placeholder="Repeat Password" value="<?php echo isset($presets['password_match']) ? 
	  $presets['password_match'] : ''; ?>" name="password_match" required>

	 <?php if (isset($_SESSION['errors']['password_match'])) { ?>
	<span  class="error"><?php echo $_SESSION['errors']['password_match'] ?></span>
	<?php } ?> 
	
	<?php echo  "<br>";?>
	
	<input type="submit" value="Submit">
	</form>
	

   
</div>

  <?php
  unset($_SESSION['presets']);
  unset($_SESSION['errors']);
?>

</body>
</html>