<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9de38bc982006f452cb725bcaaaeae1e
{
    public static $classMap = array (
        'ComposerAutoloaderInit9de38bc982006f452cb725bcaaaeae1e' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit9de38bc982006f452cb725bcaaaeae1e' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/database/Connection.php',
        'CreatePostsTable' => __DIR__ . '/../..' . '/database/migrations/CreatePostsTable.php',
        'CreateUsersTable' => __DIR__ . '/../..' . '/database/migrations/CreateUsersTable.php',
        'Request' => __DIR__ . '/../..' . '/Request.php',
        'Router' => __DIR__ . '/../..' . '/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9de38bc982006f452cb725bcaaaeae1e::$classMap;

        }, null, ClassLoader::class);
    }
}
