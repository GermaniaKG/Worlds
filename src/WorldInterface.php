<?php
namespace Germania\Worlds;

interface WorldInterface
{
    public function getId();
    public function getName();
    public function getSlug();
    public function getDescription();
    public function getPhoto();
}

