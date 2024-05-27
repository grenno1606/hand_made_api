<?php
namespace Handmade\Models;

class Products implements \JsonSerializable
{
    private $productId;
    private $image;
    private $productName;
    private $originalPrice;
    private $discountPercentage;
    private $discountedPrice;
    private $createdAt;
    private $updatedAt;

    public function __construct($productId, $image, $productName, $originalPrice, $discountPercentage, $discountedPrice) 
    {
        $this->productId = $productId;
        $this->image = $image;
        $this->productName = $productName;
        $this->originalPrice = $originalPrice;
        $this->discountPercentage = $discountPercentage;
        $this->discountedPrice = $discountedPrice;
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

    // Getter and Setter for image
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    // Getter and Setter for productName
    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    // Getter and Setter for originalPrice
    public function getOriginalPrice()
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice($originalPrice)
    {
        $this->originalPrice = $originalPrice;
    }

    // Getter and Setter for discountPercentage
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;
    }

    // Getter and Setter for discountedPrice
    public function getDiscountedPrice()
    {
        return $this->discountedPrice;
    }

    public function setDiscountedPrice($discountedPrice)
    {
        $this->discountedPrice = $discountedPrice;
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
		return new self($arr["productId"], $arr["image"],$arr["productName"],$arr["originalPrice"],$arr["discountPercentage"],$arr["discountedPrice"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "productId"=>$this->productId,
            "image"=>$this->image,
            "productName"=>$this->productName,
            "originalPrice"=>$this->originalPrice,
            "discountPercentage"=>$this->discountPercentage,
            "discountedPrice"=>$this->discountedPrice,
            "createdAt"=>$this->createdAt,
            "updatedAt"=>$this->updatedAt
        ];
    }
}