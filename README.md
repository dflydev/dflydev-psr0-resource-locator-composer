Composer PSR-0 Resource Locator
===============================

The Composer [PSR-0][1] Resource Locator implementation leverages
[dflydev/composer-autoload][2] to locate the effective Composer autoloader
in use at runtime and accesses its namespace map.

See [dflydev/psr0-resource-locator][3] for more information on
the [PSR-0][1] Resource Locator interface.


Requirements
------------

 * PHP 5.3+
 * [dflydev/psr0-resource-locator][3]
 * [dflydev/composer-autoload][2]


Installation
------------

This library can installed by [Composer][4].


Usage
-----

```php
<?php

use Dflydev\Psr0ResourceLocator\Composer\ComposerResourceLocator;

$resourceLocator = new ComposerResourceLocator;

// Search all PSR-0 namespaces registered by Composer
// to find the first directory found looking like:
// "/Vendor/Project/Resources/mappings"
$mappingDirectory = $resourceLocator->findFirstDirectory(
    'Vendor\Project\Resources\mappings'
);

// Search all PSR-0 namespaces registered by Composer
// to find all templates directories looking like:
// "/Vendor/Project/Resources/templates"
$templateDirs = $resourceLocator->findDirectories(
    'Vendor\Project\Resources\templates',
);

```


License
-------

MIT, see LICENSE.


Community
---------

If you have questions or want to help out, join us in the [#dflydev][5]
channel on irc.freenode.net.


[1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[2]: https://github.com/dflydev/dflydev-composer-autoload
[3]: https://github.com/dflydev/dflydev-psr0-resource-locator
[4]: http://getcomposer.org/
[5]: irc://irc.freenode.net/#dflydev


