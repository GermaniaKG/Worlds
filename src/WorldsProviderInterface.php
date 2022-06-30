<?php
namespace Germania\Worlds;

interface WorldsProviderInterface
{
    public function getWorlds(): WorldsInterface;
    public function setWorlds( WorldsInterface $worlds);
}
