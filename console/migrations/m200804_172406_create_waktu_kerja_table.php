<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%waktu_kerja}}`.
 */
class m200804_172406_create_waktu_kerja_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%waktu_kerja}}', [
            'id' => $this->primaryKey(),
            'id_jabatan' => $this->integer(),
            'hari' => $this->integer(),
            'waktu_masuk' => $this->string(255),
            'waktu_keluar' => $this->string(255),
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 1,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "17:00",
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 2,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "17:00",
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 3,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "17:00",
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 4,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "17:00",
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 5,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "17:00",
        ]);

        $this->insert('waktu_kerja', [
            'id_jabatan' => 1,
            'hari' => 6,
            'waktu_masuk'=> "08:00",
            'waktu_keluar'=> "12:00",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%waktu_kerja}}');
    }
}
