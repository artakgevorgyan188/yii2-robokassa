<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sh_news".
 *
 * @property string $id
 * @property string $datetime
 * @property string $title
 * @property string $text
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sh_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetime', 'title', 'text'], 'required'],
            [['datetime'], 'safe'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime' => 'Datetime',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
