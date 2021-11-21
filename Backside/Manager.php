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
        $base = $this->config->get('base');

        $partsUrl = explode('/', $url);
        array_shift($partsUrl);

        foreach ($partsUrl as $key => $partUrl) {
            $partsUrl[$key] = ucfirst($partUrl);
        }

        // Try to apply application from file.

        $classApplicationFile = sprintf('%s/%s/Application.php', $base['root'], implode('/', $partsUrl));
        if(file_exists($classApplicationFile)) {
            $namespaceApplicationString = $this->extractNamespace($classApplicationFile);

            if(!is_null($namespaceApplicationString))
            {
                $classApplicationNamespace = sprintf('%s\Application', $namespaceApplicationString);

                if(class_exists($classApplicationNamespace)) {
                    $namespaceApplication = new $classApplicationNamespace($this->config);
                    return $namespaceApplication->compile();
                }
            }
        }

        // Try to apply namespace application.

        $classApplicationNamespace = sprintf('%s/Application', implode('/', $partsUrl));
        if(class_exists($classApplicationNamespace)) {
            $namespaceApplication = new $classApplicationNamespace($this->config);
            return $namespaceApplication->compile();
        }

        // @todo: assert base application

        // Try to apply base application.
        $classBaseApplication = $base['application'];
        if(class_exists($classBaseApplication)) {
            $baseApplication = new $classBaseApplication($this->config);
            return $baseApplication->compile();
        }

        return 'Application with this URL not found.';
    }

    private function extractNamespace($filename): ?string {
        $ns = null;
        $handle = fopen($filename, 'r');
        if($handle) {
            while (($line = fgets($handle)) !== false) {
                if (strpos($line, 'namespace') === 0) {
                    $parts = explode(' ', $line);
                    $ns = rtrim(trim($parts[1]), ';');
                    break;
                }
            }
            fclose($handle);
        }
        return $ns;
    }
}