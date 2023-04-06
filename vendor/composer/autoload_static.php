<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit809f396425f93c3f3e110238f3d1f767
{
    public static $files = array (
        '7dd996d98a91d095f100c75e0b9e2391' => __DIR__ . '/..' . '/spatie/async/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
            'Spatie\\Async\\' => 13,
        ),
        'P' => 
        array (
            'Predis\\' => 7,
        ),
        'L' => 
        array (
            'Laravel\\SerializableClosure\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Spatie\\Async\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/async/src',
        ),
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
        'Laravel\\SerializableClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/laravel/serializable-closure/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit809f396425f93c3f3e110238f3d1f767::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit809f396425f93c3f3e110238f3d1f767::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit809f396425f93c3f3e110238f3d1f767::$classMap;

        }, null, ClassLoader::class);
    }
}
