<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit377985e8501b92c5c7bcb859292934fd
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit377985e8501b92c5c7bcb859292934fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit377985e8501b92c5c7bcb859292934fd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
