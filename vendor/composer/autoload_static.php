<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit21c61e052ded04f58da3b77c1c3c02b9
{
    public static $prefixLengthsPsr4 = array (
        'A' =>
        array (
            'Adpc\\Lottie\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Adpc\\Lottie\\' =>
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit21c61e052ded04f58da3b77c1c3c02b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit21c61e052ded04f58da3b77c1c3c02b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit21c61e052ded04f58da3b77c1c3c02b9::$classMap;

        }, null, ClassLoader::class);
    }
}
