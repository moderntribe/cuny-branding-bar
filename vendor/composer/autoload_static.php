<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit388b9e5f6e79a77ddb91a7462ef080e6
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CUNY\\Branding_Bar\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CUNY\\Branding_Bar\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit388b9e5f6e79a77ddb91a7462ef080e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit388b9e5f6e79a77ddb91a7462ef080e6::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit388b9e5f6e79a77ddb91a7462ef080e6::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}