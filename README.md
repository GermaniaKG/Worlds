#Germania\Worlds

A *World* is a theoretical concept to put similar products into a common theoretical drawer, somehow. 


##Installation

```bash
$ composer require germania-kg/worlds
```

**MySQL:** This package requires a MySQL table *germania_world* which you can install using `germania_world.sql` in `sql/` directory.


##Usage

The *Worlds* class reads all worlds from the database. It implements the [container-interop](https://github.com/container-interop/container-interop) (upcoming [PSR 11](https://github.com/php-fig/fig-standards/blob/master/proposed/container.md) standard) interface. 

You can iterate over it all worlds due to its [*IteratorAggregate*](http://php.net/manual/de/class.iteratoraggregate.php) interface, and you can retrieve single *World* instances:

```php
<?php
$worlds = new Germania\Worlds\Worlds( $pdo );

// Use either ID or URL slug
$check = $worlds->has( 'my_world' );
$check = $worlds->has( 42 );

// Use either ID or URL slug
$my_world = $worlds->get( 'my_world' );
$my_world = $worlds->get( 42 );

echo $my_world->getName();
?>
```


##Development and Testing

Develop using `develop` branch, using [Git Flow](https://github.com/nvie/gitflow).   
**Currently, no tests are specified.**

```bash
$ git clone git@github.com:GermaniaKG/FilterIterators.git germania-worlds
$ cd germania-worlds
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```
