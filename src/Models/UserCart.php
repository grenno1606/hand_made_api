<?php
namespace Handmade\Models;

class UserCart implements \JsonSerializable
{
    private $cartId;
    private $userName;
    private $productId;
    private $quantity;
    private $createdAt;

    public function __construct($userName, $productId, $quantity)
    {
        $this->userName = $userName;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    // Getter and Setter for cartId
    public function getCartId()
    {
        return $this->cartId;
    }

    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
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

    // Getter and Setter for quantity
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
		return new self($arr["userName"],$arr["productId"],$arr["quantity"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "cartId"=>$this->cartId,
            "userName"=>$this->userName,
            "productId"=>$this->productId,
            "quantity"=>$this->quantity
        ];
    }
}