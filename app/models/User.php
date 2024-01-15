<?php
class User
{
    // `id_user`, `nom`, `email`, `password`, `role` 
    private $id_user;
    private $nom;
    private $IMAGE;
    private $email;
    private $password;
    private $role;
    public function __construct()
    {

    }


    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

  
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

 
    public function getNom()
    {
        return $this->nom;
    }

   
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

  
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

  
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

   
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of IMAGE
     */ 
    public function getIMAGE()
    {
        return $this->IMAGE;
    }

 
    public function setIMAGE($IMAGE)
    {
        $this->IMAGE = $IMAGE;

        return $this;
    }
}