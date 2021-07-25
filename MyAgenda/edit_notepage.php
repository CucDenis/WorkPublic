<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'classes/noteview.class.php';


$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$function = new \Twig\TwigFunction('decrypt', function ($string) {

  try
    {
      $ENC_METHOD = "AES-256-CBC"; // THE ENCRYPTION METHOD.
      $ENC_KEY = "1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF"; // ENCRYPTION KEY
      $ENC_IV = "1234567890ABCDEF1234567890ABCDEF"; // ENCRYPTION IV.
      $output = false;
      // hash
      $key = hash('sha256', $ENC_KEY);
      // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
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

$result = new NoteView();
$data = $result->PrintInformationTitle_ID($_SESSION['titlu'], $_SESSION['id']);

$titluNota = '';
$continutNota = '';
$modify = $_SESSION['modify'];

if(isset($data['titlu']) && isset($data['continut']))
{
    $titluNota = $data['titlu'];
    $continutNota = $data['continut'];
}

echo $twig->render('notepage.tpl.html', ['titluNota' => $titluNota, 'continutNota' => $continutNota, 'modify' => $modify, 'id' =>  $_SESSION['id']]);