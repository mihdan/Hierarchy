<?php
/*
 * This file is part of the Hierarchy package.
 *
 * (c) Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GM\Hierarchy\Finder;

/**
 * A wrapper around a callback. Useful for tests and quick and dirty customizations.
 *
 * @author  Giuseppe Mazzapica <giuseppe.mazzapica@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @package Hierarchy
 */
final class CallbackTemplateFinder implements FinderInterface
{
    use FindFirstTemplateTrait;

    /**
     * @var callable $finder
     */
    private $finder;

    /**
     * @param callable $finder
     */
    public function __construct(callable $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @inheritdoc
     */
    public function find($template, $type)
    {
        $callback = $this->finder;

        return $callback($template, $type);
    }
}
