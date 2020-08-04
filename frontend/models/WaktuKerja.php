<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "waktu_kerja".
 *
 * @property int $id
 * @property int|null $id_jabatan
 * @property int|null $hari
 * @property string|null $waktu_masuk
 * @property string|null $waktu_keluar
 */
class WaktuKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'waktu_kerja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jabatan', 'hari'], 'integer'],
            [['waktu_masuk', 'waktu_keluar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jabatan' => 'Id Jabatan',
            'hari' => 'Hari',
            'waktu_masuk' => 'Waktu Masuk',
            'waktu_keluar' => 'Waktu Keluar',
        ];
    }

    public function waktuKerjaByJabatan($idJabatan)
    {
        return self::find()->where(['id_jabatan' => $idJabatan])->all();
    }
    public function waktuKerjaById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}
