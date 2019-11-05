<?php
  session_start();
  require_once 'form_helper.php';

  

 
 ?>
<html>

<head>
<title>Cooking With Sam</title>


<link rel="stylesheet" href="styles.css">

<link rel="shortcut icon" href="/favicon.ico?">


</head>

<body>

<div id="main">


<?php include("sidenav.html");?>
<?php include("header.html");?>

<ul> 

  <li <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { ?>
    <?php   }  ?>><a href="index.php">Home</a></li>
	
  <li <?php if($_SERVER['SCRIPT_NAME']=="/Image_Gallery.php") { ?>
    <?php   }  ?>><a href="Image_Gallery.php">Image Gallery</a></li>
	
  <li <?php if($_SERVER['SCRIPT_NAME']=="/Contact.php") { ?>
    <?php   }  ?>><a href="Contact.php">Contact</a></li>
	 
  <li style="float:right" <?php if($_SERVER['SCRIPT_NAME']=="/aboutUs.php") { ?>
 class="active"   <?php   }  ?>><a href="aboutUs.php">About Us</a></li>
 
</ul>

<?php include("aboutUs.html");?>
<?php include("footer.html");?>

</div>
</body>