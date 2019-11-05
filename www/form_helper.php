<?php

function redirectError($location,$errors,$presets=NULL){
	 
	 $SESSION["errors"]=$errors;
	 
	 if($presets) {
		 $_SESSION['presets']=$presets;
	 }
	 header("Location: $location");
}

function redirectSuccess($location,$user=NULL){
	if($user){
		$_SESSION['user']=$user;
	}
	header("Location: $location");
}

function valid_length($field, $min, $max){
		 $trimmed = trim ($field);
		 return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	 }
?>