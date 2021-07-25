<?php

include "includes/script_php-sql_connection.php";

class User {
    public $username;
    public $password;

    function __construct(){

    }

    //methods

    function LogIn($username, $password){
        $conn = new sqlConnection();
        if($conn->CheckUserAndPassword($this->user, $this->password, "Users", "LogIns"))
        {
            echo("Access granted");
        } else{
            echo("Access denied");
        }
    }

    function SignUp($firstName, $secondName, $username, $password, $email){
        $conn = new sqlConnection();
        if(!$firstName->is_null() && !$secondName->is_null() && !$username->is_null() && !$password->is_null() && !$email->is_null())
        {
            $conn->AddUser();
        }
    }
}