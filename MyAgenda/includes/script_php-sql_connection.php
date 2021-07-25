<?php

class sqlConnection {
  //setez elementele necesare connectarii specifice
  public $dataBaseName;
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $tableName;
  public $conn;

  function __construct(){
      
  }

    //methods

  function OpenConnection()  
  {  
    // Create connection
    $this->conn = new mysqli($this->servername, $this->username, $this->password);
    
    // Check connection
    if ($this->conn->connect_error) {

      die("Connection failed: " . $conn->connect_error);

    }

    echo "Connected successfully";
   }  

   function StopConnection()
   {
     $this->conn->close();
     if ($this->conn->connect_error) {
 
       die("Connection failed to stop: " . $conn->connect_error);
 
     }
 
     echo "Connection stoped successfully";
   }

  function CreateDataBase($dataBaseName){
    $this->dataBaseName = $dataBaseName;
    $sql = "CREATE DATABASE $dataBaseName";

    if($this->conn->query($sql) === TRUE) {

      echo "Database created successfully";

    } else {

      echo "Error creating database: " . $this->conn->error;

      }
  }

  function CreateTable($tableName){
    $this->tableName = $tableName;
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);
    $sql = "CREATE TABLE $tableName(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        titlu VARCHAR(30) NOT NULL,
        descriere VARCHAR(100) NOT NULL,
        continut VARCHAR(500),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

    if($this->conn->query($sql) === TRUE) {

      echo "Table $tableName created successfully";

    } else {

      echo "Error creating table $tableName: " . $this->conn->error;

      }
  }

  function DeleteTable($tableName)
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);
    $sql = "DROP TABLE $tableName;";

    if($this->conn->query($sql) === TRUE) {

      echo "Table $tableName deleted successfully";

    } else {

      echo "Error deleting table $tableName: " . $this->conn->error;

      }
  }

  function InputRecord($titlu, $descriere, $continut)
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);
    $sql = "INSERT INTO $this->tableName (titlu, descriere, continut)
    VALUES ('$titlu', '$descriere', '$continut')";

    if ($this->conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $this->conn->error;
    }

    $this->conn->close();
  }

  function DeleteRecord($tableName,$titlu){
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);

    $sql = "DELETE FROM $tableName
    WHERE titlu = '$titlu';";

    if ($this->conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $this->conn->error;
    }

    $this->conn->close();
  }

  function CheckUserAndPassword($user, $password, $dataBaseName, $tableName)
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $dataBaseName);
    $sql = "SELECT count(*) $tableName
    WHERE user = '$user' AND password = '$password'; ";

    if($this->conn->query($sql) === TRUE){
      return true;
    }
    else{
      return false;
    }
    $this->conn->close();
  }

  function AddUser($firstName, $secondName, $username, $password, $email, $dataBaseName, $tableName){
    
    $sql = "INSERT INTO $tableName (firstName, secondName, user, pswd, email)
    VALUES ('$firstName', '$secondName','$user', '$password', '$email')";

    if($this->conn->query($sql) === TRUE){
      echo("User added");
    }
    else{
      echo "Error: " . $sql . "<br>" . $this->conn->error;
    }
    $this->conn->close();
  }

}
   //echo phpinfo();