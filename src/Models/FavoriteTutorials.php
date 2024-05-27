<?php
namespace Handmade\Models;

class FavoriteTutorials implements \JsonSerializable
{
    private $favoriteId;
    private $userName;
    private $tutorialId;
    private $createdAt;

    public function __construct($userName, $tutorialId)
    {
        $this->userName = $userName;
        $this->tutorialId = $tutorialId;
    }

    // Getter and Setter for favoriteId
    public function getFavoriteId()
    {
        return $this->favoriteId;
    }

    public function setFavoriteId($favoriteId)
    {
        $this->favoriteId = $favoriteId;
    }

    // Getter and Setter for userName
    public function getuserName()
    {
        return $this->userName;
    }

    public function setuserName($userName)
    {
        $this->userName = $userName;
    }

    // Getter and Setter for tutorialId
    public function getTutorialId()
    {
        return $this->tutorialId;
    }

    public function setTutorialId($tutorialId)
    {
        $this->tutorialId = $tutorialId;
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
    public static function fromArray($arr)
	{
		return new self($arr["userName"],$arr["tutorialId"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "favoriteId"=>$this->favoriteId,
            "userName"=>$this->userName,
            "tutorialId"=>$this->tutorialId
        ];
    }
}