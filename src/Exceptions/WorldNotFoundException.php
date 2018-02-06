<?php
namespace Germania\Worlds\Exceptions;

use Interop\Container\Exception\NotFoundException as InteropContainerNotFoundException;
use Psr\Container\NotFoundExceptionInterface;

class WorldNotFoundException extends \Exception implements NotFoundExceptionInterface, InteropContainerNotFoundException
{

}
