<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perhitungan_nasa".
 *
 * @property int $id
 * @property int|null $id_jabatan
 * @property int|null $id_aktivitas
 * @property int|null $hari
 * @property string|null $value
 */
class PerhitunganNasa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perhitungan_nasa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jabatan', 'id_aktivitas', 'hari'], 'integer'],
            [['value'], 'string', 'max' => 255],
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
            'id_aktivitas' => 'Id Aktivitas',
            'hari' => 'Hari',
            'value' => 'Value',
        ];
    }
}
