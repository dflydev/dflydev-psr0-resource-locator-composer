<?php

/*
 * This file is a part of dflydev/psr0-resource-locator-composer.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dflydev\Psr0ResourceLocator\Composer;

use Dflydev\Psr0ResourceLocator\AbstractPsr0ResourceLocator;
use Dflydev\Composer\Autoload\ClassLoaderLocator;

/**
 * Composer PSR-0 Resource Locator
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class ComposerResourceLocator extends AbstractPsr0ResourceLocator
{
    private $classLoaderLocator;

    /**
     * Constructor
     *
     * @param ClassLoaderLocator $classLoaderLocator
     */
    public function __construct(ClassLoaderLocator $classLoaderLocator = null)
    {
        $this->classLoaderLocator = $classLoaderLocator ?: new ClassLoaderLocator;
    }

    /**
     * {@inheritdoc}
     */
    protected function loadMap()
    {
        return $this->classLoaderLocator->getReader()->getPrefixes();
    }
}
