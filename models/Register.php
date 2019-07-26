<?php

namespace frontend\modules\registration\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property int $sid
 * @property string $cid
 *
 * @property Student $s
 * @property Courses $c
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register';
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
            [['sid', 'cid'], 'required'],
            [['sid'], 'integer'],
            [['cid'], 'string', 'max' => 10],
            [['sid', 'cid'], 'unique', 'targetAttribute' => ['sid', 'cid']],
            [['sid'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['sid' => 'sid']],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['cid' => 'cid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Student id',
            'cid' => 'Course Id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Student::className(), ['sid' => 'sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Courses::className(), ['cid' => 'cid']);
    }
}
