<?php
namespace Germania\Worlds;

abstract class WorldAbstract implements WorldInterface
{

    /**
     * @var string|null
     */
    public $id;

    /**
     * @var string|null
     */
    public $slug;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string|null
     */
    public $photo;


    public function getId() : ?int
    {
        return $this->id;
    }



    public function getName() : ?string
    {
        return $this->name;
    }



    public function getSlug(): ?string
    {
        return $this->slug;
    }



    public function getDescription(): ?string
    {
        return $this->description;
    }



    public function getPhoto(): ?string
    {
        return $this->photo;
    }


}

