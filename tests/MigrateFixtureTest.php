<?php

namespace Horat1us\Yii\PHPUnit\Tests;

use Horat1us\Yii\PHPUnit;

class MigrateFixtureTest extends PHPUnit\TestCase
{
    public function fixtures(): array
    {
        return [
            'migrate' => [
                'class' => PHPUnit\MigrateFixture::class,
                'migrationPath' => [],
                'migrationNamespaces' => [
                    'Horat1us\\Yii\\PHPUnit\\Tests\\Migrations',
                ],
            ],
        ];
    }

    public function testLoadAndUnload(): void
    {
        $migration = Migrations\M000000000001CreateExampleTable::class;

        $this->assertNotNull($this->app->db->getTableSchema('phpunit_example', true));
        $this->assertEquals([$migration], $this->getHistory());

        $fixture = $this->getFixture('migrate');
        $this->assertInstanceOf(PHPUnit\MigrateFixture::class, $fixture);

        $fixture->unload();
        $this->assertNull($this->app->db->getTableSchema('phpunit_example', true));
        $this->assertEquals([], $this->getHistory());

        $fixture->load();
        $this->assertNotNull($this->app->db->getTableSchema('phpunit_example', true));
        $this->assertEquals([$migration], $this->getHistory());
    }

    private function getHistory(): array
    {
        return (new \yii\db\Query())
            ->select('version')
            ->from('{{%migration}}')
            ->andWhere(['<>', 'version', \yii\console\controllers\BaseMigrateController::BASE_MIGRATION])
            ->column($this->app->db);
    }
}
