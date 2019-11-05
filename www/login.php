<?php
session_start();

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

$presets = array();
  if (isset($_SESSION['presets'])) {
    $presets = array_shift($_SESSION['presets']);
  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="comments.css">
    <link rel="stylesheet" type="text/css" href="form.css">
  </head>

  <body>
 
  
 <div class="session_error">
 
	
  <?php if (isset($_SESSION['messages']['message'])) { ?>
	<span  class="message"><?php echo $_SESSION['messages']['message'] ?></span>
<?php } ?>



</div>

    <form method="POST" action="login_handler.php">
      <div>LOGIN</div>
      <input type="text" name="login" value="<?php echo isset($presets['login']) ? $presets['login'] : ''; ?>" 
	  placeholder="Your email..">
	  
	  <?php if (isset($_SESSION['messages']['email'])) { ?>
	<span  class="message"><?php echo $_SESSION['messages']['email'] ?></span>
	<?php } ?>
	
	
	
      <div>PASSWORD</div>
      <input type="password" name="password" value="<?php echo isset($presets['password']) ? $presets['password'] : ''; ?>"placeholder="Your password..">
	  
	  <?php if (isset($_SESSION['messages']['password'])) { ?>
	<span  class="message"><?php echo $_SESSION['messages']['password'] ?></span>
	<?php } ?>
	  
	    
	
      <div><input type="submit"/></div>
	  
    </form>
	
<?php
  unset($_SESSION['messages']);
  unset($presets);
  
  
?>
	


  </body>
</html>
