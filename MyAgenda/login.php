<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'classes/noteview.class.php';

$result = new NoteView();

if (isset($_POST['username']) && isset($_POST['password'])){
	$loginuser = htmlspecialchars(stripslashes(trim($_POST['username'])));
	$loginpassword = htmlspecialchars(stripslashes(trim($_POST['password'])));
	$data = $result->PrintInformationNickname($loginuser);
}

$_SESSION['logedIn'] = false;
$_SESSION['nickname'] = '';


//logIn
if(isset($data['u_pswd'])){
	if(password_verify($loginpassword, $data['u_pswd'])){
		$_SESSION['id'] = $data['id'];
		$_SESSION['logedIn'] = true;
		$_SESSION['nickname'] = $data['u_nickname'];
		Header("Location:home.php");
	}
	else {
		echo '<script>alert("Wrong username or password");location.replace("indexNew.php");</script>';
		}
}

//logOut
if(!$_SESSION['noInput']){
	$script = '<script>alert("Wrong username or password");location.replace("indexNew.php");</script>';
	echo $script;
}else{
	Header("Location:indexNew.php");
}

?>

