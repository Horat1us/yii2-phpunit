<?php

namespace Horat1us\Yii\PHPUnit\Tests\Migrations;

use yii\db\Migration;

class M000000000001CreateExampleTable extends Migration
{
    public function safeUp()
    {
        $this->createTable('phpunit_example', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('phpunit_example');
    }
}
