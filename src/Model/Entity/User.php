<?php
namespace App\Model\Entity;
use App\Core\AbstractEntity as AE;


class User extends AE {

    private $id;
    private $pseudo;
    private $email;
    private $avatar;
    private $birthDate;
    private $role;
    private $isBanned;
    private $endOfBan;

    public function __construct($data)
        {
            parent::hydrate($data, $this);
        }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
        /**
         * Get the value of avatar
         */ 
        public function getAvatar()
        {
            if($this->avatar != null){
                return IMG_PATH."/".$this->avatar;
            }
            else return $this->avatar = "http://place-hold.it/200x200";
            
        }
    
        /**
         * Set the value of avatar
         *
         * @return  self
         */ 
        public function setAvatar($avatar)
        {
            $this->avatar = $avatar;
    
            return $this;
        }
    
    /**
     * Get the value of birthDate
     */ 
    public function getBirthDate()
    {
        return $this->birthDate->format("d-m-Y à H:i");
    }

    /**
     * Set the value of birthDate
     *
     * @return  self
     */ 
    public function setBirthDate($birthDate)
    {
        $this->birthDate = new \DateTime($birthDate);

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function hasRole($role){
        return $this->role == $role;
    }
    
    /**
     * Get the value of isBanned
     */ 
    public function getIsBanned()
    {
        return $this->isBanned;
    }

    /**
     * Set the value of isBanned
     *
     * @return  self
     */ 
    public function setIsBanned($isBanned)
    {
        $this->isBanned = $isBanned;

        return $this;
    }

    /**
     * Get the value of endOfBan
     */ 
    public function getEndOfBan()
    {
        return $this->endOfBan;
    }

    /**
     * Set the value of endOfBan
     *
     * @return  self
     */ 
    public function setEndOfBan($endOfBan)
    {
        $this->endOfBan = $endOfBan;

        return $this;
    }
}