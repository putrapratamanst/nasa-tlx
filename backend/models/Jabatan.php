<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $id
 * @property string|null $nama_jabatan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_jabatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jabatan' => 'Nama Jabatan',
        ];
    }

    public function listJabatan(){
        return self::find()->all();
    }
    public function detailJabatan($id){
        return self::find()->where(['id' => $id])->one();
    }
}
