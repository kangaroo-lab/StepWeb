<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb5ed049920e13732b3816af4bb82caa
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticIniteb5ed049920e13732b3816af4bb82caa::$prefixesPsr0;
            $loader->classMap = ComposerStaticIniteb5ed049920e13732b3816af4bb82caa::$classMap;

        }, null, ClassLoader::class);
    }
}
