<?php

namespace Rune;

use Rune\Services\Manager as ConfigurationManager;
use Rune\Application as RuneApplication;

/**
 * This is class, that manages all applications.
 *
 * @link https://github.com/anton-moskalenko/rune-framework/wiki/Manager
 * @package Application
 */
class Manager
{
    /**
     * Configuration manager.
     *
     * @var \Rune\Services\Manager
     */
    private $config;

    /**
     * Manager constructor.
     *
     * @param array $data Configuration for your site
     */
    public function __construct(array $data)
    {
        // @todo Add protected method.
        $this->config = new ConfigurationManager($data);
    }

    /**
     * Run manager of applications.
     *
     * @return string HTML output
     */
    public function run(): string
    {
        $url = $_SERVER['REQUEST_URI'];

        // @todo: assert base application

        $classBaseApplication = $this->config->get('base')['application'];
        if(class_exists($classBaseApplication)) {
            $baseApplication = new $classBaseApplication($this->config);
            return $baseApplication->compile();
        }

        return 'Application with this URL not found.';
    }
}