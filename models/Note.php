<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evrnt_note".
 *
 * @property integer $id
 * @property string $text
 * @property integer $creator
 * @property string $date_create
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evrnt_note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'                                                                            ], 'required'],
            [['text'], 'string'],
            [['creator'], 'integer'],
            [['date_create'], 'safe']
        ];
    }

    /**
     * Before save new note creator is current user
     * @param bool $insert
     * @return bool
     */
    public function beforeSave ($insert)
    {
        if (parent::beforeSave($insert))
        {
            if ($this->getIsNewRecord())
            {
                $this->creator = Yii::$app->user->id;
            }
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Text'),
            'creator' => Yii::t('app', 'Creator'),
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\Query\NoteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Query\NoteQuery(get_called_class());
    }
}
