<?php

namespace app\models;


/**
 * This is the model class for table "division".
 *
 * @property integer $iddivision
 * @property string $name
 * @property integer $header_idheader
 *
 * @property Header $headerIdheader
 * @property People[] $peoples
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['header_idheader'], 'required'],
            [['header_idheader'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['header_idheader'], 'exist', 'skipOnError' => true, 'targetClass' => Header::className(), 'targetAttribute' => ['header_idheader' => 'idheader']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddivision' => '№ отдела',
            'name' => 'Название отдела',
            'header_idheader' => 'Относиться к объекту почтовой связи',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeaderIdheader()
    {
        return $this->hasOne(Header::className(), ['idheader' => 'header_idheader']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::className(), ['division_iddivision' => 'iddivision']);
    }


}
