<?php
include "classes/notecontr.class.php";

session_start();

function Delete( $id ){
    $note = new NoteContr();
    $note->EraseNote( $id );
}

if(isset($_POST['delete'])){
    Delete($_POST['delete']);
    Header("Location:index.php");
} else if(isset($_POST['edit'])){
    $_SESSION['modify'] = true;
    $_SESSION['titlu'] = $_POST['titluNota'];
    Header("Location:edit_notepage.php");
}
