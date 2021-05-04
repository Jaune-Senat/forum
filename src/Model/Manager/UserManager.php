<?php
namespace App\Model\Manager;

use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class UserManager extends AM implements ManagerInterface
{
    public function __construct(){
        parent::connect();
    }

    function getAll(){
        return $this->getResults(
            "App\Model\Entity\User",
            "SELECT * FROM user"
            );
    }

    public function getOneById($id){
       return $this->getOneOrNullResult(
        "App\Model\Entity\User",
            "SELECT * FROM user WHERE id = :id",
            [
                "id" => $id
            ]
       );
    }

    public function insertUser($pseudo,$mail, $pass, $birthDate){
        return $this->executeQuery(
            "INSERT INTO user (pseudo, email, password, birthDate, role) VALUES (:pseudo, :mail, :pass, :birthDate, 'ROLE_USER')",
            [   
                "pseudo" => $pseudo,
                "mail" => $mail,
                "pass" => $pass,
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

    function getUserByPseudo($pseudo){
        return $this->getOneOrNullResult(
            "App\Model\Entity\User",
            "SELECT * FROM user WHERE pseudo = :pseudo",
            [
                "pseudo" => $pseudo
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

    function getPasswordByPseudo($pseudo){
        return $this->getOneValue(
            "SELECT password FROM user WHERE pseudo = :pseudo",
            [
                "mail" => $pseudo
            ]
        );
    }
}
