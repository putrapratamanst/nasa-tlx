<?php

use backend\helpers\Constant;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%aktivitas}}`.
 */
class m200803_185739_create_aktivitas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aktivitas}}', [
            'id' => $this->primaryKey(),
            'nama_aktivitas' => $this->string(255),
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Membuat Laporan",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Optimalisasi Aset",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Memeriksa Keuangan",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Pengawasan Fasilitas",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Koordinasi",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Perawatan dan Pemeliharaan Sarana",
        ]);

        $this->insert('aktivitas', [
            'nama_aktivitas' => "Mengurus Administrasi",
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aktivitas}}');
    }
}
