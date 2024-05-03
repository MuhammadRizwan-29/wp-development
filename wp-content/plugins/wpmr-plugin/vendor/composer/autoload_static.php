<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit712847c561707b25771ca37faddf1b59
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MRizwan\\WpmrPlugin\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MRizwan\\WpmrPlugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit712847c561707b25771ca37faddf1b59::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit712847c561707b25771ca37faddf1b59::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit712847c561707b25771ca37faddf1b59::$classMap;

        }, null, ClassLoader::class);
    }
}
