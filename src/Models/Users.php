<?php
namespace Handmade\Models;
class Users implements \JsonSerializable
{
    private $userId;
    private $userName;
    private $password;
    private $email;
    private $role;
    private $createdAt;
    private $updatedAt;

    public function __construct($userId, $userName, $password, $email)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
    }

    // Getter and Setter for userId
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    // Getter and Setter for userName
    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    // Getter and Setter for password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter and Setter for email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter and Setter for role
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    // Getter and Setter for createdAt
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    // Getter and Setter for updatedAt
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    public static function fromArray($arr)
	{
		return new self($arr["userId"], $arr["userName"],$arr["password"],$arr["email"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "userId"=>$this->userId,
            "userName"=>$this->userName,
            "password"=>$this->password,
            "email"=>$this->email,
            "role"=>$this->role,
            "createdAt"=>$this->createdAt,
            "updatedAt"=>$this->updatedAt
        ];
    }

}