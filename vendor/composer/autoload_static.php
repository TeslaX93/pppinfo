<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f31e46cc0637bdb061307d829d06dc2
{
    public static $prefixesPsr0 = array (
        'p' => 
        array (
            'pppinfo' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit4f31e46cc0637bdb061307d829d06dc2::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}