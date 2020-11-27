<?php

namespace Rune\Test;

use PHPUnit\Framework\TestCase;

/**
 * Tests application methods.
 */
class ApplicationTest extends TestCase
{
    /**
     * Tests 'get' method.
     *
     * * Arrange: defines {@link Application} object.
     * * Act: calls {@link Application::get()}.
     * * Assert: checks API response.
     */
    public function testGet()
    {
        $application = new Application();
        $out = $application->get('ping', [
            'ping' => 'pong'
        ]);

        $this->assertEquals([
            'input' => 'ping',
            'output' => 'Pong',
            'parameters' => [
                'ping' => 'pong'
            ]
        ], $out);
    }
}