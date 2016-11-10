<?php
namespace Germania\Worlds;

use Germania\Worlds\Exceptions\DatabaseException;

class PdoWorlds extends Worlds implements WorldsInterface
{
    public $worlds = array();

    public $worlds_table = "germania_world";

    /**
     * @param \PDO                $pdo          PDO Instance
     * @param WorldInterface|null $world        WorldsInterface instance result template (optional)
     * @param [type]              $worlds_table Custom table name (optional)
     */
    public function __construct( \PDO $pdo, WorldInterface $world = null, $worlds_table = null )
    {
        $this->worlds = new \ArrayObject;
        $this->worlds_table = $worlds_table ?: $this->worlds_table;

        // ID is listed twice here in order to use it with FETCH_UNIQUE as array key
        $sql = "SELECT
        id,
        id                AS id,
        world_name        AS name,
        world_description AS description,
        world_url         AS slug,
        world_photo       AS photo

        FROM {$this->worlds_table}
        WHERE is_active > 0";

        $stmt = $pdo->prepare( $sql );

        $stmt->setFetchMode( \PDO::FETCH_CLASS, $world ? get_class($world) : World::class );

        if (!$stmt->execute()):
            throw new DatabaseException("Could not retrieve Worlds from database");
        endif;

        $this->worlds = $stmt->fetchAll(\PDO::FETCH_UNIQUE);
    }


}
