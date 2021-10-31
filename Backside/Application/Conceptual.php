<?php

namespace Rune\Application;

/**
 * This is class, that every application should extend.
 *
 * @link https://github.com/anton-moskalenko/rune-framework/wiki/Application
 * @package Application
 */
class Conceptual
{
    /**
     * URL Regular Expression.
     * Would be checked with {@link preg_match()}.
     *
     * @var string
     */
    public static $URL = '~\/$~';

    /**
     * Frontend install directory (from public root).
     * Empty value means public root itself.
     * <tt>false</tt> if it does not need to install.
     *
     * @var string
     */
    public static $Frontend = false;

    /**
     * Layout template file.
     *
     * @var string
     */
    private $filenameLayout;

    /**
     * Sets layout template.
     *
     * @param string $layout Layout template file.
     */
    public function setLayout(string $layout): void
    {
        // @todo: assert filename
        $this->filenameLayout = $layout;
    }

    /**
     * Gets layout template.
     *
     * @return string Layout template file.
     */
    public function getLayout(): string
    {
        return $this->filenameLayout;
    }

    /**
     * Compiles page.
     *
     * @return string Full output page.
     */
    public function compile(): string
    {
        return $this->render($this->filenameLayout);
    }

    /**
     * Gets response of API method.
     *
     * @param string $name API method name.
     * @param array $parameters API parameters.
     * @return array API
     */
    public function get(string $name, array $parameters): array
    {
        return [];
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

    public function run(): string
    {
        return $this->compile();
    }
}