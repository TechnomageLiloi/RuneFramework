<?php

namespace Rune\Configuration;

/**
 * This is class, that manages configuration data.
 *
 * @link https://github.com/anton-moskalenko/rune-framework/wiki/ConfigurationManager
 * @package Configuration
 */
class Manager
{
    /**
     * Config parameters.
     *
     * @var array
     */
    private $data;

    /**
     * Configuration manager constructor.
     *
     * @param array $data Configuration values for your site
     */
    public function __construct(array $data)
    {

        $this->compile($data);
    }

    protected function compile(array $data)
    {
        // @todo assert by type -> array

        $this->data = $data;
    }

    /**
     * Set config parameter (local of global)
     *
     * @param string $name Parameter name.
     * @param $value Parameter value.
     */
    public function set(string $name, $value): void
    {
        // @todo assert not empty

        $this->data[$name] = $value;
    }

    /**
     * Get config parameter (local of global).
     *
     * @param string $name Parameter name.
     * @return mixed Parameter value.
     */
    public function get(string $name)
    {
        // @todo assert not empty

        return $this->data[$name];
    }
}