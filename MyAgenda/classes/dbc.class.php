<?php

class Dbc{

    //setez elementele necesare connectarii 
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dataBaseName = "notes";


  protected function connect()
  {
      //data source type
      $dsn = 'mysql:host='. $this->servername . ';' . 'dbname=' . $this->dataBaseName;
      $pdo = new PDO($dsn, $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  }
}