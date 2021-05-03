<?php
namespace App\Model\Manager;

use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class UserManager extends AM implements ManagerInterface
{
    public function __construct(){
        parent::connect();
    }

    public function getAll(){
        return;
    }

    public function getOneById($id){
        return;
    }

    public function insertUser($pseudo, $pass, $mail, $birthDate){
        return $this->executeQuery(
            "INSERT INTO user (pseudo, password, email, birthDate, role) VALUES (:pseudo :pass, :mail, :birthDate 'ROLE_USER')",
            [   
                "pseudo" => $pseudo,
                "pass" => $pass,
                "mail" => $mail,
                "birthDate" => $birthDate
            ]
        );
    }

    function getUserByEmail($mail){
        return $this->getOneOrNullResult(
            "App\Model\Entity\User",
            "SELECT * FROM user WHERE email = :mail",
            [
                "mail" => $mail
            ]
        );
    }

    function getPasswordByEmail($mail){
        return $this->getOneValue(
            "SELECT password FROM user WHERE email = :mail",
            [
                "mail" => $mail
            ]
        );
    }

}
