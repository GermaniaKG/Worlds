<?php
namespace Germania\Worlds;

class World extends WorldAbstract implements WorldInterface
{

    public function setId( $id )
    {
        $this->id = $id;
        return $this;
    }


    public function setName( $name )
    {
        $this->name = $name;
        return $this;
    }


    public function setSlug( $slug )
    {
        $this->slug = $slug;
        return $this;
    }


    public function setDescription( $description )
    {
        $this->description = $description;
        return $this;
    }


    public function setPhoto( $photo )
    {
        $this->photo = $photo;
        return $this;
    }

}

