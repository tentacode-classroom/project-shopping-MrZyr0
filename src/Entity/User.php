<?php


class User
{
    private $id;
    private $email;
    private $password;
    private $firstId;
    private $lastId;

    public function __construct(string $Id, string $email, string $password, string $firstId, string $lastId)
    {
        $this->id = $Id;
        $this->email = $email;
        $this->password = $password;
        $this->firstId = $firstId;
        $this->lastId = $lastId;
    }


    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId($id)
    {
        return $this->id;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail($email)
    {
        return $this->email;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword($password)
    {
        return $this->password;
    }


    public function setFirstId(string $firstId)
    {
        $this->firstId = $firstId;
    }

    public function getFirstId($firstId)
    {
        return $this->firstId;
    }


    public function setLastId(string $lasttId)
    {
        $this->lastId = $lastId;
    }

    public function getLastId($lastId)
    {
        return $this->last;
    }

}
