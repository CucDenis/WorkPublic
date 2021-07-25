<?php

function naturalNameValidation($name)
{
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        echo '<script>alert("Only letters and white space allowed");location.replace("signup_form.php");</script>';
        return false;
      }
      else{
        return true;
      }
}

function usernameValidation($username)
{
    if(!preg_match("/^[a-zA-Z0-9]{5,}$/", $username)) {
        echo '<script>alert("Username needs to have more then 5 characters. Useing alphanumeric characters.");location.replace("signup_form.php");</script>';
        return false;
    }
    else{
        return true;
    }
}

function emailValidation($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return false;
    }
    else{
        return true;
    }
}

function passwordValidation($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");location.replace("signup_form.php");</script>';
        return false;
    }else{
        //echo 'Strong password.';
        return true;
    }
}
