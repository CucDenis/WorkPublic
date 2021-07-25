<?php
session_start();

include "classes/notecontr.class.php";
include 'functions_signup.php';
include 'PHP-Class-Encryption-Algorithms-master/Encryption.php';

$note = new NoteContr();

$_SESSION['action'] = false;

if($_SESSION['modify'])
{
    $titlu = $_POST["title"]; 
    $continut = Encrypt($_POST["continut"]);
    $id_user = $_SESSION['id'];
    $old_titlu = $_SESSION['titlu'];
    $note->EditNote($id_user, $titlu, $continut,$old_titlu);
    Header("Location:home.php");

} else if(isset($_POST["title"]) && isset($_POST["continut"])){
    $title = $_POST["title"]; 
    $continut = Encrypt($_POST["continut"]);
    $id_user = $_SESSION['id'];
    $note->AddNote($title,$continut,$id_user);
    Header("Location:home.php");
}else{
    echo "Title or content not set";
}
