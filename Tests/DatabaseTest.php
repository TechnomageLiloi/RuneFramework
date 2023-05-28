<?php

namespace Rune;

use PHPUnit\Framework\TestCase;
use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Rune\Engine\Domain\Manager;

/**
 * Check phpUnit testing ability.
 */
class DatabaseTest extends TestCase
{
    private static $adapter = null;

    public static function getAdapter()
    {
        if(self::$adapter === null)
        {
            Pool::getSingleton()->set(new Sparkle('prefix', function () {return 'rune_';}));

            $connection = ['host'=>'','user'=>'','password'=>'','database'=>''];

            Pool::getSingleton()->set(new Sparkle('connection', function () use ($connection) {
                return $connection;
            }));

            Manager::setConfig(Pool::getSingleton());

            Manager::getAdapter()->request('truncate table rune_blueprints;');

            self::$adapter = Manager::getAdapter();
        }

        return self::$adapter;
    }

    public function testCheck():void {$this->assertTrue(true);}
}