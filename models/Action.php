<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $button_text
 * @property string $button_link
 * @property string $condition_text
 * @property string $image
 */
class Action extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'button_text', 'button_link', 'condition_text'], 'required'],
            [['title', 'content', 'button_text', 'button_link'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'button_text' => 'Button Text',
            'button_link' => 'Button Link',
            'condition_text' => 'Condition Text',
            'image' => 'Image'
        ];
    }
}
