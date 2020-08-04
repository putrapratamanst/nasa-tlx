<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kriteria_analisis}}`.
 */
class m200803_185125_create_kriteria_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kriteria}}', [
            'id' => $this->primaryKey(),
            'nama_kriteria' => $this->string(255),
        ]);

        $this->insert('kriteria', [
            'nama_kriteria' => "Norma Waktu",
        ]);

        $this->insert('kriteria', [
            'nama_kriteria' => "Volume Kerja",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kriteria}}');
    }
}
