<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80f20b1db955b974e0faccd907432c0e
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DbHandler' => __DIR__ . '/../..' . '/models/DbHandler.php',
        'MySqlHandler' => __DIR__ . '/../..' . '/models/MySqlHandler.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit80f20b1db955b974e0faccd907432c0e::$classMap;

        }, null, ClassLoader::class);
    }
}
