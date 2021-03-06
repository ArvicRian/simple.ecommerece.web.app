<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62e9243ebbf93b9087a4422caa654e7e
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62e9243ebbf93b9087a4422caa654e7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62e9243ebbf93b9087a4422caa654e7e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit62e9243ebbf93b9087a4422caa654e7e::$classMap;

        }, null, ClassLoader::class);
    }
}
