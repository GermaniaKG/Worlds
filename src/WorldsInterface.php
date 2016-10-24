<?php
namespace Germania\Worlds;

use Interop\Container\ContainerInterface;

interface WorldsInterface extends \IteratorAggregate, \Countable, ContainerInterface
{
    public function push( WorldInterface $world );
}
