<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aktivitas_to_kriteria}}`.
 */
class m200803_185823_create_aktivitas_to_kriteria_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aktivitas_to_kriteria}}', [
            'id' => $this->primaryKey(),
            'id_kriteria' => $this->integer(),
            'id_aktivitas' => $this->integer(),
            'id_jabatan' => $this->integer(),
            'value' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aktivitas_to_kriteria}}');
    }
}
