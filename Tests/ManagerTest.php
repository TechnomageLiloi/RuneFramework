<?php

namespace Rune;

use PHPUnit\Framework\TestCase;
use Rune\Manager;

/**
 * Tests manager methods.
 */
class ManagerTest extends TestCase
{
    /**
     * Tests constructor.
     *
     * * Arrange: defines {@link Manager} object.
     * * Act: calls constructor.
     * * Assert: checks that no exceptions are thrown.
     */
    public function testConstructor()
    {
        $manger = new Manager([

        ]);
        $this->assertTrue($manger instanceof Manager);
    }

    /**
     * Tests {@link Manager::manage()} method.
     *
     * * Arrange: defines {@link Manager} object.
     * * Act: calls constructor.
     * * Assert: checks that no exceptions are thrown.
     */
    public function testManage()
    {
        $_SERVER['REQUEST_URI'] = '/';
        $manger = new Manager([
            Manager::APPLICATION_LIST => []
        ]);
        $this->assertEquals('Application with this URL not found.', $manger->run());
    }
}