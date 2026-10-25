<?php

/**
 * Backward compatibility with the `yii\phpunit` namespace of yiisoft/yii2-phpunit (the code this package started from):
 * the classes are aliased to `Horat1us\Yii\PHPUnit` on first use.
 */
spl_autoload_register(static function (string $class): void {
    $aliases = [
        'yii\\phpunit\\MigrateFixture' => \Horat1us\Yii\PHPUnit\MigrateFixture::class,
        'yii\\phpunit\\TestCase' => \Horat1us\Yii\PHPUnit\TestCase::class,
        'yii\\phpunit\\TestLogger' => \Horat1us\Yii\PHPUnit\TestLogger::class,
        'yii\\phpunit\\TestMailer' => \Horat1us\Yii\PHPUnit\TestMailer::class,
    ];
    if (array_key_exists($class, $aliases)) {
        class_alias($aliases[$class], $class);
    }
});
