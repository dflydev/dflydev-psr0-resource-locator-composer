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

    /**
     * Test swapping out implementation
     */
    public function testImplementation()
    {
        $reader = $this->getMock('Dflydev\Composer\Autoload\ClassLoaderReaderInterface');

        $reader
            ->expects($this->once())
            ->method('getPrefixes')
            ->will($this->returnValue(array(
                'Dflydev\Psr0ResourceLocator\Composer' => array(realpath(__DIR__.'/../../..')),
            )));

        $reader
            ->expects($this->once())
            ->method('getFallbackDirs')
            ->will($this->returnValue(array()));

        $classLoaderLocator = $this->getMock('Dflydev\Composer\Autoload\ClassLoaderLocator');

        $classLoaderLocator
            ->expects($this->once())
            ->method('getReader')
            ->will($this->returnValue($reader));

        $resourceLocator = new ComposerResourceLocator($classLoaderLocator);

        $projectRoot = dirname(dirname(dirname(dirname(__DIR__))));

        $directories = $resourceLocator->findDirectories('Dflydev\Psr0ResourceLocator\Composer');
        $this->assertCount(1, $directories);
        $this->assertEquals($projectRoot.'/tests/Dflydev/Psr0ResourceLocator/Composer', $directories[0]);

        $directory = $resourceLocator->findOneDirectory('Dflydev\Psr0ResourceLocator\Composer');
        $this->assertEquals($projectRoot.'/tests/Dflydev/Psr0ResourceLocator/Composer', $directory);
    }
}
