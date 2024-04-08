<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/User.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

if(empty( $username) || empty($password)){
    return header('Location:../login.php?emptyMessage=FILL%20THE%20INPUTS');
}

$userss = new User(); 
$users = $userss->getUser();
$admins = $userss->getAdmin();

foreach ($users as $user){ 
     if( $username == $user ['username']){
        if(md5($password) == $user['password']){
            return header('Location:../page.php?user='.$user ['id']);
        } else {
        return header('Location:../login.php?errorMessage=WRONG%20CREDENTIALS!!');
     }
     }     
}

foreach ($admins as $admin){ 
     if( $username == $admin ['username']){
        if(md5($password) == $admin['password']){
            return header('Location:../adminResurces/adminPage.php?'.$admin ['id']);
        } else {
            return header('Location:../login.php?errorMessage=WRONG%20CREDENTIALS!!');
     }
     }     
}
    return header('Location:../login.php?errorMessage=WRONG%20CREDENTIALS!!');
 }
?>