<?php

namespace Rune\Configuration;

use PHPUnit\Framework\TestCase;
use Rune\Configuration\Manager;

/**
 * Tests configuration manager methods.
 */
class ManagerTest extends TestCase
{
    /**
     * Tests constructor.
     *
     * * Arrange: defines {@link Manager} object.
     * * Act: calls constructor.
     * * Assert: checks that no exceptions are thrown and value is correct.
     */
    public function testConstructor(): void
    {
        $manger = new Manager([
            'test' => true
        ]);
        $this->assertTrue($manger->get('test'));
    }

    /**
     * Tests {@link Manager::manage()} method.
     *
     * * Arrange: defines {@link Manager} object.
     * * Act: calls {@link Manager::set()} and {@link Manager::get()} methods.
     * * Assert: checks that no exceptions are thrown and value is correct.
     */
    public function testManage(): void
    {
        $manger = new Manager([]);
        $manger->set('test', true);
        $this->assertTrue($manger->get('test'));
    }
}