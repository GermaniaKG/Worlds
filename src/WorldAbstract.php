<?php
namespace Germania\Worlds;

abstract class WorldAbstract implements WorldInterface
{
    public $id;
    public $slug;
    public $name;
    public $description;
    public $photo;


    public function getId()
    {
        return $this->id;
    }



    public function getName()
    {
        return $this->name;
    }



    public function getSlug()
    {
        return $this->slug;
    }



    public function getDescription()
    {
        return $this->description;
    }



    public function getPhoto()
    {
        return $this->photo;
    }


}

