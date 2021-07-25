<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'classes/noteview.class.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$note = new NoteView();

$user = 'Not Logged In';
$LoggedIn = false;
$button = 'LogIn';
$_SESSION['modify'] = false;
$_SESSION['noInput'] = false;
$result_notes = '';

if(isset($_SESSION['logedIn'])){
  if ($_SESSION['logedIn']) {
      $user = $_SESSION['nickname'];
      $button = 'LogOut';
      $LoggedIn = true;
      $_SESSION['noInput'] = true;
      $result_notes = $note->PrintInformationId($_SESSION['id']);
}else {
    $button = 'LogIn';
    $LoggedIn = false;
    $_SESSION['noInput'] = false;
  }
}



echo $twig->render('indexNew.tpl.html', ['result_notes' => $result_notes, 'user' => $user, 'LoggedIn' => $LoggedIn, 'buttonL' => $button ]);
