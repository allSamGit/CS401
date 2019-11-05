<?php

function redirectError($location,$errors,$presets=NULL){
	 
	 $SESSION["errors"]=$errors;
	 
	 if($presets) {
		 $_SESSION['presets']=$presets;
	 }
	 header("Location: $location");
	 die;
}

function redirectSuccess($location,$user=NULL){
	if($user){
		$_SESSION['user']=$user;
	}
	header("Location: $location");
}
?>