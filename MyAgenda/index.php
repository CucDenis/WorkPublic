<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'classes/noteview.class.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$function = new \Twig\TwigFunction('decrypt', function ($string) {

    try
      {
        $ENC_METHOD = "AES-256-CBC"; 
        $ENC_KEY = "1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF"; 
        $ENC_IV = "1234567890ABCDEF1234567890ABCDEF"; 
        $output = false;

        $key = hash('sha256', $ENC_KEY);
        
        $iv = substr(hash('sha256', $ENC_IV), 0, 16);

       $output = openssl_decrypt(base64_decode($string), $ENC_METHOD, $key, 0, $iv);
       return $output;
      }
     catch (Exception $e)
      {
        return "Caught exception: ".$e->getMessage();
      }
});
$twig->addFunction($function);

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



echo $twig->render('index.tpl.html', ['result_notes' => $result_notes, 'user' => $user, 'LoggedIn' => $LoggedIn, 'buttonL' => $button ]);