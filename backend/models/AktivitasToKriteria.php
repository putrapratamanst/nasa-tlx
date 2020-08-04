<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aktivitas_to_kriteria".
 *
 * @property int $id
 * @property int|null $id_kriteria
 * @property int|null $id_aktivitas
 * @property int|null $id_jabatan
 * @property string|null $value
 */
class AktivitasToKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aktivitas_to_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kriteria', 'id_aktivitas', 'id_jabatan'], 'integer'],
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
            'id_kriteria' => 'Id Kriteria',
            'id_aktivitas' => 'Id Aktivitas',
            'id_jabatan' => 'Id Jabatan',
            'value' => 'Value',
        ];
    }
}
