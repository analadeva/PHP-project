<?php
if($_SERVER['REQUEST_METHOD']!== 'POST'){
    header("Location:/../signin.php");
}

require_once('functions.php');
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/User.php';


$mail = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);


if(empty( $username) || empty($password) || empty($mail)){
    return header('Location:../signin.php?emptyMessage=ALL%20INPUTS%20ARE%20REQUIRED');
}

if(!usernameExist($username)){
    return header("Location:../signin.php?usertaken=*Username%20taken");
}

if(!emailExist($mail)){
    return header("Location:../signin.php?emailTaken=*A%20user%20with%20this%20email%20already%20exists");
}

if(!isValidUsername($username)){
    return header("Location:../signin.php?validUsername=*Username%20cannot%20contain%20empty%20spaces%20or%20special%20signs");
}

if(!paswordValid($pass)){
    return header("Location:../signin.php?validPass=*Password%20must%20have%20at%20least%20one%20number,%20one%20special%20sign%20and%20one%20uppercase%20letter;");
}

if(!emailValidate($mail)){
    return header("Location:../signin.php?emailNoValide=*mail%20must%20have%20at%20least%205%20charecters%20before%20@");
}
   

$user = new User(); 

$user->setMail($mail);
$user->setUsername($username);
$user->setPass($password);

$user->store();

header('Location:../page.php');
?>