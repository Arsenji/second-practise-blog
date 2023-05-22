<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7befcb08c4113df2e8a91aebc4d64db1
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\gii\\' => 8,
            'yii\\composer\\' => 13,
            'yii\\' => 4,
            'yidas\\yii2BowerAsset\\' => 21,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii/src',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'yidas\\yii2BowerAsset\\' => 
        array (
            0 => __DIR__ . '/..' . '/yidas/yii2-bower-asset',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7befcb08c4113df2e8a91aebc4d64db1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7befcb08c4113df2e8a91aebc4d64db1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7befcb08c4113df2e8a91aebc4d64db1::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit7befcb08c4113df2e8a91aebc4d64db1::$classMap;

        }, null, ClassLoader::class);
    }
}
