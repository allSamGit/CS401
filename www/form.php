<?php
session_start();

?>

<html>

<head> 
<link rel="stylesheet" href="form.css">
</head>

<body>

<?php
if (isset($_SESSION['message'])) {
   echo "<div class='message'>{$_SESSION['message']}</div>";
}
?>


<div class="Signup-Title" >

<h1>Sign Up Form</h1>

<p>Enter your information to sign up</p>
<hr>
</div>


<div class="Signup-Form">
    
  <form action="/login_handler.php" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
	
    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="Your city.." required>
	
    <label for="postal code">Postal code</label>
    <input type="text" id="pcode" name="postalcode" placeholder="ex:83706" required>
	
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
	
	<input type="submit" value="Submit">
	</form>

   
</div>

</body>
</html>