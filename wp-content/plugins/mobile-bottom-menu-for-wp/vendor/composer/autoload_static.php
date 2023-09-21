<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit591d9f57859863b00430f094322034aa
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Boomdevs\\WpMobileBottomMenu\\' => 28,
        ),
        'A' => 
        array (
            'Appsero\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Boomdevs\\WpMobileBottomMenu\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Appsero\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsero/client/src',
        ),
    );

    public static $classMap = array (
        'Appsero\\Client' => __DIR__ . '/..' . '/appsero/client/src/Client.php',
        'Appsero\\Insights' => __DIR__ . '/..' . '/appsero/client/src/Insights.php',
        'Appsero\\License' => __DIR__ . '/..' . '/appsero/client/src/License.php',
        'Appsero\\Updater' => __DIR__ . '/..' . '/appsero/client/src/Updater.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit591d9f57859863b00430f094322034aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit591d9f57859863b00430f094322034aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit591d9f57859863b00430f094322034aa::$classMap;

        }, null, ClassLoader::class);
    }
}
