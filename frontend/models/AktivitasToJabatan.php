<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aktivitas_to_jabatan".
 *
 * @property int $id
 * @property int|null $id_aktivitas
 * @property int|null $id_jabatan
 */
class AktivitasToJabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aktivitas_to_jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aktivitas', 'id_jabatan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aktivitas' => 'Id Aktivitas',
            'id_jabatan' => 'Id Jabatan',
        ];
    }

    public function getAktivitas()
    {
        return $this->hasOne(Aktivitas::className(), ['id' => 'id_aktivitas']);
    }

}
