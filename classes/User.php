<?php
require_once __DIR__ . '/DB.php';

class User
{
    protected $mail;
    protected $username;
    protected $password;
    
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPass($password){
        $this->password = $password;
    }

    public function store(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $query = $connection->prepare(
            'INSERT INTO `users` (
                 `mail`,`username`,`password`) 
            VALUES (    
                :mail,:username,:password)'
        );

        $data = [
            'mail' =>$this->mail,
            'username' => $this->username,
            'password' => $this->password,
        ];

        $query->execute($data);
    }

    public function getUser(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $userss = $connection->prepare("SELECT * FROM `users`;");
        $userss->execute();
        $users = $userss->fetchAll();
        return $users;
    }

    public function getAdmin(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $userss = $connection->prepare("SELECT * FROM `administrators`;");
        $userss->execute();
        $users = $userss->fetchAll();
        return $users;
    }
}
?>