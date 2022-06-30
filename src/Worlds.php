<?php
namespace Germania\Worlds;

use Germania\Worlds\Exceptions\WorldNotFoundException;


class Worlds implements WorldsInterface
{
    public $worlds = array();


    public function push( WorldInterface $world ) : self
    {
        $this->worlds[ $world->getId() ] = $world;
        return $this;
    }

    /**
     * @implements ContainerInterface
     * @return WorldInterface
     */
    public function get( $id_or_slug )
    {
        $filter = function( $world, $id ) use ($id_or_slug) {
            return ($world->getId() == $id_or_slug
            or $world->getSlug() == $id_or_slug);
        };

        $worlds = new \CallbackFilterIterator( $this->getIterator(), $filter);
        $worlds->rewind();
        if ($worlds->valid()):
            return $worlds->current();
        else:
            throw new WorldNotFoundException("Could not find product world with ID or slug '$id_or_slug'");
        endif;
    }



    /**
     * @implements ContainerInterface
     * @return boolean
     */
    public function has ($id_or_slug ) : bool
    {
        foreach ($this->worlds as $world) {
            if ($world->getId() == $id_or_slug
            or  $world->getSlug() == $id_or_slug) {
                return true;
            }
        }
        return false;
    }


    /**
     * @implements IteratorAggregate
     */
    public function getIterator() : \Traversable
    {
        return new \ArrayIterator($this->worlds);
    }


    /**
     * @implements Countable
     */
    public function count() : int
    {
        return count($this->worlds);
    }
}
