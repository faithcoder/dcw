<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit296a2b1ddc3fdeeb5c886ce409937be1
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit296a2b1ddc3fdeeb5c886ce409937be1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit296a2b1ddc3fdeeb5c886ce409937be1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit296a2b1ddc3fdeeb5c886ce409937be1::$classMap;

        }, null, ClassLoader::class);
    }
}