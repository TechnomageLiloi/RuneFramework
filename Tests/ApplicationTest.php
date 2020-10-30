<?php

namespace Rune;

use PHPUnit\Framework\TestCase;

/**
 * Tests application methods.
 */
class ApplicationTest extends TestCase
{
    /**
     * Tests layout set/get.
     *
     * * Arrange: defines {@link Application} object.
     * * Act: calls {@link Application::setLayout()} and {@link Application::getLayout()}.
     * * Assert: checks layout is correct.
     */
    public function testLayout()
    {
        $application = new Application();
        $in = 'test';
        $application->setLayout($in);
        $out = $application->getLayout();

        $this->assertEquals($in, $out);
    }

    /**
     * Tests 'run' method.
     *
     * * Arrange: defines {@link Application} object, sets test layout.
     * * Act: calls {@link Application::run()}.
     * * Assert: checks compiled output is correct.
     */
    public function testRun()
    {
        $template = '<h1>Test</h1>';
        $application = new Application();
        $fnTest = dirname(__FILE__) . '/Test.tpl';
        file_put_contents($fnTest, $template);

        $application->setLayout($fnTest);
        $out = $application->compile();

        $this->assertEquals($template, $out);
    }

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
        $out = $application->get('', []);
        $this->assertEquals([], $out);
    }
}