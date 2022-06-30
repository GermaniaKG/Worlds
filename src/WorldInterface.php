<?php
namespace Germania\Worlds;

interface WorldInterface
{
    public function getId() : ?int;
    public function getName() : ?string;
    public function getSlug() : ?string;
    public function getDescription() : ?string;
    public function getPhoto() : ?string;
}

