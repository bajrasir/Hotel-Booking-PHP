<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita68a9ccc03b73f9c93de93bb0d02d1b7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita68a9ccc03b73f9c93de93bb0d02d1b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita68a9ccc03b73f9c93de93bb0d02d1b7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita68a9ccc03b73f9c93de93bb0d02d1b7::$classMap;

        }, null, ClassLoader::class);
    }
}
