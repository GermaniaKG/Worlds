<?php
namespace Germania\Worlds;

use Germania\Worlds\Exceptions\WorldNotFoundException;
use Germania\Worlds\Exceptions\DatabaseException;

class Worlds implements WorldsInterface
{
    public $worlds = array();



    public function __construct( \PDO $pdo, WorldInterface $world = null )
    {
        $this->worlds = new \ArrayObject;

        // ID is listed twice here in order to use it with FETCH_UNIQUE as array key
        $sql = 'SELECT
        id,
        id                AS id,
        world_name        AS name,
        world_description AS description,
        world_url         AS slug,
        world_photo       AS photo

        FROM germania_world
        WHERE is_active > 0';

        $stmt = $pdo->prepare( $sql );

        $stmt->setFetchMode( \PDO::FETCH_CLASS, $world ? get_class($world) : World::class );

        if (!$stmt->execute()):
            throw new DatabaseException("Could not retrieve Worlds from database");
        endif;

        $this->worlds = $stmt->fetchAll(\PDO::FETCH_UNIQUE);
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
    public function has ($id_or_slug )
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
    public function getIterator()
    {
        return new \ArrayIterator($this->worlds);
    }


    /**
     * @implements Countable
     */
    public function count()
    {
        return count($this->worlds);
    }
}
