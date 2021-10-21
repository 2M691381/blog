<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8167c70e64b7fec55d759a055696541
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'blog\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8167c70e64b7fec55d759a055696541::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8167c70e64b7fec55d759a055696541::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
