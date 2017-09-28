<?php

namespace app\models;


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
            [['categoriya', 'posada','fio', 'phone', 'inside_phone', 'division_iddivision', 'header_idheader'], 'required'],
            [['division_iddivision'], 'integer'],
            [['categoriya'], 'string', 'max' => 100],
            [['posada', 'fio'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['inside_phone'], 'string', 'max' => 6],
            [['mts_phone', 'lugakom_phone'], 'string', 'max' => 20],
            [['header_idheader'], 'exist', 'skipOnError' => true, 'targetClass' => Header::className(), 'targetAttribute' => ['header_idheader' => 'idheader']],
            [['division_iddivision'], 'exist', 'skipOnError' => true, 'targetClass' => Division::className(), 'targetAttribute' => ['division_iddivision' => 'iddivision']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpeople' => 'Id',
            'categoriya' => 'Категория',
            'posada' => 'Должность',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'inside_phone' => 'Внутренний телефон',
            'mts_phone' => 'МТС',
            'lugakom_phone' => 'Лугаком',
            'header_idheader' => 'Относиться к объекту связи',
            'division_iddivision' => 'Относиться к отделу',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisionIddivision(){
        return $this->hasOne(Division::className(), ['iddivision' => 'division_iddivision']);
    }

    public function getHeaderidheader(){
        return $this->hasOne(Header::className(),['idheader' => 'header_idheader']);
    }

}
