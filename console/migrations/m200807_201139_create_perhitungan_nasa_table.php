<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perhitungan_nasa}}`.
 */
class m200807_201139_create_perhitungan_nasa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perhitungan_nasa}}', [
            'id' => $this->primaryKey(),
            'id_jabatan' => $this->integer(),
            'id_aktivitas' => $this->integer(),
            'hari' => $this->integer(),
            'value'=> $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%perhitungan_nasa}}');
    }
}
