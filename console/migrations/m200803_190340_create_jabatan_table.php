<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jabatan}}`.
 */
class m200803_190340_create_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jabatan}}', [
            'id' => $this->primaryKey(),
            'nama_jabatan' => $this->string(255),
        ]);

        $this->insert('jabatan', [
            'nama_jabatan' => "Deputi Sarana",
        ]);

        $this->insert('jabatan', [
            'nama_jabatan' => "Asisten Deputi Saran",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jabatan}}');
    }
}
