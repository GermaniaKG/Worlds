<?php
namespace Germania\Worlds;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class PimpleServiceProvider implements ServiceProviderInterface
{

    /**
     * @var array
     */
    public $config = [
            'pdo' => null,
            'worlds_table' => null
        ];


    /**
     * @param array|null $config Service Configuration
     */
    public function __construct( array $config = array() )
    {
        $this->config = array_merge($this->config, $config );
    }


    /**
     * @implements ServiceProviderInterface
     */
    public function register(Container $dic)
    {

        /**
         * @return array
         */
        $dic['Worlds.Config'] = function( $dic ) {
            return $this->config;
        };

        /**
         * @return PDO
         */
        $dic['Worlds.PDO'] = function( $dic ) {
            return null;
        };


        /**
         * @return PdoWorlds
         */
        $dic['Worlds.All'] = function( $dic ) {
            $worlds_config = $dic['Worlds.Config'];
            $worlds_table  = $worlds_config['worlds_table'];

            $pdo           = $dic['Worlds.PDO' ];
            return new PdoWorlds( $pdo, null, $worlds_table );
        };



    }
}
