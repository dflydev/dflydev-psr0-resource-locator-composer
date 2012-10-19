<?php

namespace Dflydev\Psr0ResourceLocator\Composer;

/**
 * ComposerPsr0ResourceLocator test
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class ComposerResourceLocatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Functionality
     */
    public function testFunctionality()
    {
        $resourceLocator = new ComposerResourceLocator;

        $projectRoot = dirname(dirname(dirname(dirname(__DIR__))));

        $directories = $resourceLocator->findDirectories('Dflydev\Psr0ResourceLocator\Composer');
        $this->assertCount(1, $directories);
        $this->assertEquals($projectRoot.'/src/Dflydev/Psr0ResourceLocator/Composer', $directories[0]);

        $directory = $resourceLocator->findOneDirectory('Dflydev\Composer\Autoload');
        $this->assertEquals($projectRoot.'/vendor/dflydev/composer-autoload/src/Dflydev/Composer/Autoload', $directory);
    }
}
