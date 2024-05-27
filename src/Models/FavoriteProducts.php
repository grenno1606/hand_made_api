<?php
namespace Handmade\Models;

class FavoriteProducts implements \JsonSerializable
{
    private $favoriteId;
    private $userName;
    private $productId;
    private $createdAt;

    public function __construct($userName, $productId)
    {
        $this->userName = $userName;
        $this->productId = $productId;
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

    // Getter and Setter for productId
    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
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
		return new self($arr["userName"],$arr["productId"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "favoriteId"=>$this->favoriteId,
            "userName"=>$this->userName,
            "productId"=>$this->productId
        ];
    }
}