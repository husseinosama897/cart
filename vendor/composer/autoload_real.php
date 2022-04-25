<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc1a792d7552bed85d33bfd5e238e452c
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

        spl_autoload_register(array('ComposerAutoloaderInitc1a792d7552bed85d33bfd5e238e452c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc1a792d7552bed85d33bfd5e238e452c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc1a792d7552bed85d33bfd5e238e452c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
