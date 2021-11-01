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
    const APPLICATION_LIST = 'application.list';

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

        $applications = $this->config->get(self::APPLICATION_LIST);

        foreach($applications as $pattern => $applicationClass)
        {
            if(!preg_match($pattern, $url))
            {
                continue;
            }

            /** @var RuneApplication $application */
            $application = new $applicationClass();

            if(isset($_POST['method']))
            {
                // API Request
                return json_encode([
                    'response' => $application->get($_POST['method'], $_POST['parameters'])
                ]);
            }

            return $application->compile();
        }

        return 'Application with this URL not found.';
    }
}