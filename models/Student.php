<?php

namespace frontend\modules\registration\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $sid
 * @property string $sname
 * @property string $password
 *
 * @property Register[] $registers
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db1');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sid', 'sname', 'password'], 'required'],
            [['sid'], 'integer'],
            [['sname', 'password'], 'string', 'max' => 50],
            [['sid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Student Id',
            'sname' => 'Student name',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisters()
    {
        return $this->hasMany(Register::className(), ['sid' => 'sid']);
    }
}
