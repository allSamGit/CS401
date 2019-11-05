<?php

function isAccessGranted(){

if(isset($_SESSION['access_granted']) && true === $_SESSION['access_granted']){
return true;
}
else{
return false;
}
}
?>