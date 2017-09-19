<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property integer $idpeople
 * @property string $categoriya
 * @property string $posada
 * @property string $fio
 * @property string $phone
 * @property string $inside_phone
 * @property string $mts_phone
 * @property string $lugakom_phone
 * @property integer $division_iddivision
 *
 * @property Division $divisionIddivision
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoriya', 'posada', 'phone', 'inside_phone', 'mts_phone', 'lugakom_phone', 'division_iddivision'], 'required'],
            [['division_iddivision'], 'integer'],
            [['categoriya'], 'string', 'max' => 100],
            [['posada', 'fio'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['inside_phone'], 'string', 'max' => 6],
            [['mts_phone', 'lugakom_phone'], 'string', 'max' => 20],
            [['division_iddivision'], 'exist', 'skipOnError' => true, 'targetClass' => Division::className(), 'targetAttribute' => ['division_iddivision' => 'iddivision']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpeople' => 'Idpeople',
            'categoriya' => 'Categoriya',
            'posada' => 'Posada',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'inside_phone' => 'Inside Phone',
            'mts_phone' => 'Mts Phone',
            'lugakom_phone' => 'Lugakom Phone',
            'division_iddivision' => 'Division Iddivision',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionIddivision()
    {
        return $this->hasOne(Division::className(), ['iddivision' => 'division_iddivision']);
    }
}
