<?php

namespace Horat1us\Yii\PHPUnit\Tests;

use Horat1us\Yii\PHPUnit;
use PHPUnit\Framework\Attributes\DataProvider;

class AliasesTest extends \PHPUnit\Framework\TestCase
{
    public static function aliasesProvider(): array
    {
        return [
            ['yii\\phpunit\\MigrateFixture', PHPUnit\MigrateFixture::class],
            ['yii\\phpunit\\TestCase', PHPUnit\TestCase::class],
            ['yii\\phpunit\\TestLogger', PHPUnit\TestLogger::class],
            ['yii\\phpunit\\TestMailer', PHPUnit\TestMailer::class],
        ];
    }

    #[DataProvider('aliasesProvider')]
    public function testAlias(string $alias, string $class): void
    {
        $this->assertTrue(class_exists($alias));
        $this->assertSame($class, (new \ReflectionClass($alias))->getName());
    }

    public function testUnknownClass(): void
    {
        $this->assertFalse(class_exists('yii\\phpunit\\Unknown'));
    }
}
