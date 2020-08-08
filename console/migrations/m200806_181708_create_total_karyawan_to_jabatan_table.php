<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%total_karywan_to_jabatan}}`.
 */
class m200806_181708_create_total_karyawan_to_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%total_karyawan_to_jabatan}}', [
            'id' => $this->primaryKey(),
            'id_jabatan' => $this->integer(),
            'total_karyawan' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%total_karyawan_to_jabatan}}');
    }
}
