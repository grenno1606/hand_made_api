<?php
namespace Handmade\Models;

class Tutorials implements \JsonSerializable
{
    private $tutorialId;
    private $tutorialName;
    private $video;
    private $createdAt;
    private $updatedAt;

    public function __construct($tutorialId, $tutorialName, $video)
    {
        $this->tutorialId = $tutorialId;
        $this->tutorialName = $tutorialName;
        $this->video = $video;
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

    // Getter and Setter for tutorialName
    public function getTutorialName()
    {
        return $this->tutorialName;
    }

    public function setTutorialName($tutorialName)
    {
        $this->tutorialName = $tutorialName;
    }

    // Getter and Setter for video
    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;
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
		return new self($arr["tutorialId"], $arr["tutorialName"], $arr["video"]);
	}
    function jsonSerialize():mixed
    {
        return [
            "tutorialId"=>$this->tutorialId,
            "tutorialName"=>$this->tutorialName,
            "video"=>$this->video,
            "createdAt"=>$this->createdAt,
            "updatedAt"=>$this->updatedAt
        ];
    }
}