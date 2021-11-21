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
     * Run manager of applications.
     *
     * @return string HTML output
     */
    public static function run(): string
    {
        $url = $_SERVER['REQUEST_URI'];

        return 'Application with this URL not found.';
    }
}