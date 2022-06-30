<?php
namespace Germania\Worlds;

class World extends WorldAbstract implements WorldInterface
{

    public function setId( $id ) : self
    {
        $this->id = $id;
        return $this;
    }


    public function setName( $name ) : self
    {
        $this->name = $name;
        return $this;
    }


    public function setSlug( $slug ) : self
    {
        $this->slug = $slug;
        return $this;
    }


    public function setDescription( $description ) : self
    {
        $this->description = $description;
        return $this;
    }


    public function setPhoto( $photo ) : self
    {
        $this->photo = $photo;
        return $this;
    }

}

