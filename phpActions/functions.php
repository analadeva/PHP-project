<?php
declare(strict_types=1);
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/User.php';

function usernameExist(string $username):bool {
  $userss = new User();
  $users = $userss->getUser();
  foreach($users as $user){
    if($user['username']===$username){
       return false;
    }
  }
  return true;
}

function emailExist(string $mail):bool 
{
  $userss = new User();
  $users = $userss->getUser();
  foreach($users as $user){
    if($user['mail']===$mail){
       return false;
    }
  }
  return true;
   }

  function isValidUsername(string $username):bool
{
    $pattern = "/^[a-zA-Z0-9]+$/";

    if (preg_match($pattern, $username)) {
      return true; 
    } 
   return false; 
}

function paswordValid($password) {
  $number_pattern = '/\d/';
  $special_pattern = '/[^a-zA-Z\d]/';
  $uppercase_pattern = '/[A-Z]/';

  $number = (bool)preg_match($number_pattern, $password);
  $special = (bool)preg_match($special_pattern, $password);
  $uppercase = (bool)preg_match($uppercase_pattern, $password);

  return $number && $special && $uppercase;
}

function emailValidate(string $mail): bool
{
  $atPosition = strpos($mail, '@');
    if ($atPosition !== false) {
      if( $atPosition >= 5){
        return true; 
      }    
    }       
  return false; 
}


?>