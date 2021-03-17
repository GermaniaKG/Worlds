<?php
namespace Germania\Worlds;

use Psr\Container\ContainerInterface;

interface WorldsInterface extends \IteratorAggregate, \Countable, ContainerInterface
{
    public function push( WorldInterface $world );
}
