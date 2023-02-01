<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb1aa13d140b1a444ba388b0553a7a92c
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb1aa13d140b1a444ba388b0553a7a92c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb1aa13d140b1a444ba388b0553a7a92c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb1aa13d140b1a444ba388b0553a7a92c::$classMap;

        }, null, ClassLoader::class);
    }
}