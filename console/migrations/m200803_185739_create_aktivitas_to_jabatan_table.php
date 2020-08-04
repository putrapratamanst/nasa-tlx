<?php

use backend\helpers\Constant;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%aktivitas}}`.
 */
class m200803_185739_create_aktivitas_to_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aktivitas_to_jabatan}}', [
            'id' => $this->primaryKey(),
            'id_aktivitas' => $this->integer(),
            'id_jabatan' => $this->integer(),
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 1,
            'id_jabatan' => Constant::DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 2,
            'id_jabatan' => Constant::DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 3,
            'id_jabatan' => Constant::DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 4,
            'id_jabatan' => Constant::DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 5,
            'id_jabatan' => Constant::DEPUTI_SARANA
        ]);


        //ASSISTEN
        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 5,
            'id_jabatan' => Constant::ASISTEN_DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 6,
            'id_jabatan' => Constant::ASISTEN_DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 1,
            'id_jabatan' => Constant::ASISTEN_DEPUTI_SARANA
        ]);

        $this->insert('aktivitas_to_jabatan', [
            'id_aktivitas' => 7,
            'id_jabatan' => Constant::ASISTEN_DEPUTI_SARANA
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aktivitas_to_jabatan}}');
    }
}
