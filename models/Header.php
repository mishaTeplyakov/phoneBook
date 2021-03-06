<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "header".
 *
 * @property integer $idheader
 * @property string $name
 * @property string $code_amtz
 * @property string $fax
 * @property string $email
 * @property string $adress
 *
 * @property Division[] $divisions
 */
class Header extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idheader', 'code_amtz', 'fax', 'email', 'adress'], 'required'],
            [['idheader'], 'integer'],
            [['name', 'fax', 'email', 'adress'], 'string', 'max' => 255],
            [['code_amtz'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idheader' => 'Idheader',
            'name' => 'Name',
            'code_amtz' => 'Code Amtz',
            'fax' => 'Fax',
            'email' => 'Email',
            'adress' => 'Adress',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['header_idheader' => 'idheader']);
    }
}
