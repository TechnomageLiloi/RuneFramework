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
            'page' => [
                'title' => 'Test',
                'start' => '// config[page][start]',
            ]
        ];

        $this->config = array_merge($default, $config);
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }
}