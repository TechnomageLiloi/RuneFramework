<?php

namespace Rune\Test;

use Rune\Application as RuneApplication;

/**
 * @inheritDoc
 */
class Application extends RuneApplication
{
    /**
     * @inheritDoc
     */
    public function get(string $name, array $parameters): array
    {
        return [
            'input' => $name,
            'output' => 'Pong',
            'parameters' => $parameters
        ];
    }
}