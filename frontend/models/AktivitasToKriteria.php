<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "aktivitas_to_kriteria".
 *
 * @property int $id
 * @property int|null $id_kriteria
 * @property int|null $id_aktivitas
 * @property int|null $id_jabatan
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
            [['value'], 'string'],
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
        ];
    }

    public function detailAktivitasToKriteria($idJabatan, $idKriteria)
    {
        return AktivitasToKriteria::find()->where(['id_jabatan' => $idJabatan])->andWhere(['id_kriteria' => $idKriteria])->all();
    }

    public function detailAktivitasToKriteriaAndJabatan($idJabatan, $idKriteria, $idAktivitas)
    {
        return AktivitasToKriteria::find()->where(['id_jabatan' => $idJabatan])->andWhere(['id_kriteria' => $idKriteria])->andWhere(['id_aktivitas' => $idAktivitas])->one();
    }
}
