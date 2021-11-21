<?php

namespace Rune\Application;

/**
 * This is class, that every application should extend.
 *
 * @package Application
 */
class Conceptual
{
    /**
     * Get base output.
     *
     * @return string HTML output.
     */
    protected function get(): string
    {
        return '';
    }

    /**
     * Compiles page.
     *
     * @return string Full output page.
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            // API Request
            return json_encode([
                'response' => $this->api($_POST['method'], $_POST['parameters'])
            ]);
        }

        return $this->get();
    }

    /**
     * Gets response of API method.
     *
     * @param string $name API method name.
     * @param array $parameters API parameters.
     * @return array API
     */
    public function api(string $name, array $parameters): array
    {
        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        // @todo Add php-judex exception.
        throw new \Exception('No API method.');
    }

    /**
     * Render template/layout output.
     *
     * @param string $template Template file.
     * @param array $data Variable values.
     * @return string compiled template
     */
    protected function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }
}