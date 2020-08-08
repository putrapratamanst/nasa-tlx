<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "total_karyawan_to_jabatan".
 *
 * @property int $id
 * @property int|null $id_jabatan
 * @property int|null $total_karyawan
 */
class TotalKaryawanToJabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'total_karyawan_to_jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jabatan', 'total_karyawan'], 'integer'],
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
            'total_karyawan' => 'Total Karyawan',
        ];
    }

    public function getJabatan()
    {
        // a comment has one customer
        return $this->hasOne(Jabatan::className(), ['id' => 'id_jabatan']);
    }
}
