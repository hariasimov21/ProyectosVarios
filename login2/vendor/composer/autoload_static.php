<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ba24198eed5e3a3b625baed6621651d
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hybridauth\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hybridauth\\' => 
        array (
            0 => __DIR__ . '/..' . '/hybridauth/hybridauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ba24198eed5e3a3b625baed6621651d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ba24198eed5e3a3b625baed6621651d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
