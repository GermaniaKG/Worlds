<?php
namespace Germania\Worlds;

use Interop\Container\ContainerInterface as InteropContainerInterface;
use Psr\Container\ContainerInterface;

interface WorldsInterface extends \IteratorAggregate, \Countable, ContainerInterface, InteropContainerInterface
{
    public function push( WorldInterface $world );
}
