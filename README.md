#Germania\Worlds

A *World* is a theoretical concept to put similar products into a common theoretical drawer, somehow. 


##Installation

```bash
$ composer require germania-kg/worlds
```

**MySQL:** This package requires a MySQL table *germania_world* which you can install using `germania_world.sql` in `sql/` directory.


##Usage

The *Worlds* class reads all worlds from the database. Its *WorldsInterface* extends the [container-interop](https://github.com/container-interop/container-interop) (upcoming [PSR 11](https://github.com/php-fig/fig-standards/blob/master/proposed/container.md) standard) as well as [*IteratorAggregate*](http://php.net/manual/de/class.iteratoraggregate.php), and [SPL Countable](http://php.net/manual/de/class.countable.php).

To retrieve a single *World* instance:

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
$ git clone git@github.com:GermaniaKG/Worlds.git germania-worlds
$ cd germania-worlds
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```
