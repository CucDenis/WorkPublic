<?php
$extenstion = FALSE;
$constants = FALSE;

echo '<pre>';

if(in_array('libsodium', get_loaded_extensions())){

  $extenstion = TRUE;
  echo 'Libsodium IS installed.<br>';

}else{

  echo 'Libsodium IS NOT installed.<br>';

  }

$constantsArray = get_defined_constants(true);

if(isset($constantsArray['libsodium']) && $constantsArray['libsodium']){

  $constants = TRUE;

  echo 'You HAVE predefined Libsodium constants.<br>';

}else{

  echo 'You DO NOT have any predefined Libsodium constants.<br>';

}

if($extenstion === TRUE && $constants === TRUE){

  foreach($constantsArray['libsodium'] as $constant=>$value){

    if(preg_match('/CRYPTO_SECRETBOX_NONCEBYTES|CRYPTO_SECRETBOX_KEYBYTES/', $constant)){

      echo 'Your predefined constant\'s name is set as this: ' . $constant . ' To use in your functions: random_bytes(' . $constant . ');' .  '<br>';

    }

  }    

echo 'Here is a full list of your Libsodium constants:<br>';
print_r(get_defined_constants(true)['libsodium']);

}

//***Leave these commented out when you first run the test.***

//To see ALL of your constants uncomment this line:
//print_r(get_defined_constants(true));

//To see ALL of your extensions uncomment this line:
//print_r(get_loaded_extensions());

echo '</pre>';

$encryption = new Encryption();
echo 'ana are mere';
$encrypted = $encryption->Encrypt("ana are mere");

echo 'encrypted:'.($encrypted);
echo 'decrypted:'.($encryption->Decrypt ($encrypted));
