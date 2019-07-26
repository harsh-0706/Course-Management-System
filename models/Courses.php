<?php

namespace frontend\modules\registration\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property string $cid
 * @property string $cname
 * @property string $professor
 * @property int $credits
 * @property int $lab
 *
 * @property Register[] $registers
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
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
            [['cid', 'cname', 'professor', 'credits', 'lab'], 'required'],
            [['credits', 'lab'], 'integer'],
            [['cid'], 'string', 'max' => 10],
            [['cname', 'professor'], 'string', 'max' => 50],
            [['cid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Course Id',
            'cname' => 'Course name',
            'professor' => 'Professor',
            'credits' => 'Credits',
            'lab' => 'Lab',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisters()
    {
        return $this->hasMany(Register::className(), ['cid' => 'cid']);
    }
}
