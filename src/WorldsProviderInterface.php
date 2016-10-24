<?php
namespace Germania\Worlds;

interface WorldsProviderInterface
{
    public function getWorlds();
    public function setWorlds( WorldsInterface $worlds);
}
