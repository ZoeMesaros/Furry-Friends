<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2635fd7d36c3672ee639df709eaa0707
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit2635fd7d36c3672ee639df709eaa0707', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2635fd7d36c3672ee639df709eaa0707', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2635fd7d36c3672ee639df709eaa0707::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}