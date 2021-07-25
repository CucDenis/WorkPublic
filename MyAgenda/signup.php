<?php

session_start();

include "classes/notecontr.class.php";
include 'functions_signup.php';

$signup_firstname = htmlspecialchars(stripslashes(trim($_POST['firstname'])));
$signup_lastname = htmlspecialchars(stripslashes(trim($_POST['lastname'])));
$signup_username = htmlspecialchars(stripslashes(trim($_POST['username'])));
$signup_email = htmlspecialchars(stripslashes(trim($_POST['email'])));
$signup_password = htmlspecialchars(stripslashes(trim($_POST['password'])));
$signup_retypedpassword = htmlspecialchars(stripslashes(trim($_POST['retypedpassword'])));


$user = new NoteContr();

	if($signup_password === $signup_retypedpassword){
		
		if( naturalNameValidation($signup_firstname) && naturalNameValidation($signup_lastname) && usernameValidation($signup_username) && emailValidation($signup_email) 
			&& passwordValidation($signup_password) ){

			$hashpasword = password_hash($signup_password, PASSWORD_DEFAULT);
			$user->AddUser($signup_firstname, $signup_lastname, $signup_username, $hashpasword, $signup_email);
			Header("Location:index.php");
		}
	}else{
		echo 'passwords dont match';
	}