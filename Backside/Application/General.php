<?php

namespace Rune\Application;

use Rune\Application\Conceptual as ConceptualApplication;

/**
 * @inheritDoc
 */
class General extends ConceptualApplication
{
    private array $config;

    /**
     * Application constructor.
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public function setConfig(array $config): void
    {
        $default = [
            'title' => 'Test',
            'start' => '// config[page][start]',
            'scripts' => []
        ];

        $this->config = array_merge($default, $config);
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return json_encode(['response' => $this->api($_POST['method'], $_POST['parameters'])]);
        }

        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }
}