<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3192a63135a90ff5815237a7135e7210
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3192a63135a90ff5815237a7135e7210::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3192a63135a90ff5815237a7135e7210::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
