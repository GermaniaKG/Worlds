<?php
namespace Germania\Worlds;

class WorldFilterIterator extends \FilterIterator
{
    public $world_id;

    public function __construct(\Traversable $iterator , WorldInterface $world)
    {
        parent::__construct( $iterator instanceOf \IteratorAggregate ? $iterator->getIterator() : $iterator);

        $this->world_id = $world->getId();
    }

    public function accept()
    {
        $current = $this->getInnerIterator()->current();
        return ($current instanceOf WorldsProviderInterface
            and $current->getWorlds()->has( $this->world_id ));
    }
}
