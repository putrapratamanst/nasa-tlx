<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aktivitas".
 *
 * @property int $id
 * @property string|null $nama_aktivitas
 */
class Aktivitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aktivitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_aktivitas'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_aktivitas' => 'Nama Aktivitas',
        ];
    }
}
