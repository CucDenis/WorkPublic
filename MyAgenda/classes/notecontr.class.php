<?php
include "note.class.php";
class NoteContr extends Note{

    public function AddNote($titlu, $continut, $id_user)
    {
        $this->SetNote($titlu,$continut,$id_user);
    }

    public function AddUser($signup_firstname, $signup_lastname, $signup_username, $hashpasword, $signup_email)
    {
        $this->SetNewUser($signup_firstname, $signup_lastname, $signup_username, $hashpasword, $signup_email);
    }

    public function EraseNote($id){
        $this->DeleteNote($id);
    }

    public function EditNote($id,$titlu,$continut,$old_titlu){
        $this->UpdateNote($id,$titlu,$continut, $old_titlu);
    }
}