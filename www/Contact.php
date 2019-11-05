<?php
  session_start();
  require_once 'form_helper.php';

  

 
 ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Home page – My Website</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="/favicon.ico?">

<link rel="stylesheet" href="styles.css">



</head>

<body>



<div id="main">

<div style="overflow:auto">



<?php include("sidenav.html");?>

<?php include("header.html");?>

<ul> 

  <li <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { ?>
    <?php   }  ?>><a href="index.php">Home</a></li>
 
  <li <?php if($_SERVER['SCRIPT_NAME']=="/Image_Gallery.php") { ?>
  <?php   }  ?>><a href="Image_Gallery.php">Image Gallery</a></li>
  
  
  <li <?php if($_SERVER['SCRIPT_NAME']=="/Contact.php") { ?>
 class="active" <?php   }  ?>><a href="Contact.php">Contact</a></li>
  
  <li style="float:right" <?php if($_SERVER['SCRIPT_NAME']=="/aboutUs.php") { ?>
 <?php   }  ?>><a href="aboutUs.php">About Us</a></li>
</ul>

<?php include("Contact.htm");?>
<?php include("footer.html");?>





<div id="main">

</body>
</html>