<?php
include "dbc.class.php";
class Note extends Dbc{
    
      protected function SetNote($titlu, $continut, $id_user)
      {
        $sql = "INSERT INTO agenda1(titlu, continut, id_user)
        VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$titlu, $continut, $id_user]);
      }

      protected function SetNewUser($signup_firstname, $signup_lastname, $signup_username, $hashpasword, $signup_email)
      {
        $sql = "INSERT INTO users(u_firstname, u_lastname, u_nickname, u_pswd, u_email) 
        Values (?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$signup_firstname, $signup_lastname, $signup_username, $hashpasword, $signup_email]);
      }

      protected function GetNoteId($id)
      {
        $sql = "SELECT * FROM agenda1 WHERE id_user = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
        return $results;
      }

      protected function GetNoteNickname($nickname)
      {
        $sql = "SELECT * FROM users WHERE u_nickname = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$nickname]);

        $results = $stmt->fetch();
        return $results;
      }

      protected function GetNoteTitle_ID($title, $id)
      {
        $sql = "SELECT * FROM agenda1 WHERE titlu = ? AND id_user = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $id]);

        $results = $stmt->fetch();
        return $results;
      }

      protected function UpdateNote($id,$titlu,$continut,$old_titlu)
      {
        $sql = "UPDATE agenda1
        SET titlu = ?, continut = ?
        WHERE id_user = ? AND titlu = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$titlu, $continut, $id, $old_titlu]);
      }
    
      protected function DeleteNote($id){
        
        $sql = "DELETE FROM agenda1
        WHERE id = ?;";
    
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}