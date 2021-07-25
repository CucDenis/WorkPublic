<?php

    // THIS FUNCTION WILL ENCRYPT THE PASSED STRING
    function Encrypt($string)
    {
      $ENC_METHOD = "AES-256-CBC"; // THE ENCRYPTION METHOD.
      $ENC_KEY = "1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF1234567890ABCDEF"; // ENCRYPTION KEY
      $ENC_IV = "1234567890ABCDEF1234567890ABCDEF"; // ENCRYPTION IV.
      try
       {
         $output = false;
         $key = hash('sha256', $ENC_KEY);
         $iv = substr(hash('sha256', $ENC_IV), 0, 16);
         $output = openssl_encrypt($string, $ENC_METHOD, $key, 0, $iv);
         $output = base64_encode($output);
         return $output;
       }
       catch (Exception $e)
        {
          return "Caught exception: ".$e->getMessage();
        }
    }

    // THIS FUNCTION WILL DECRYPT THE ENCRYPTED STRING.
    function Decrypt($string)
    {
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
    }