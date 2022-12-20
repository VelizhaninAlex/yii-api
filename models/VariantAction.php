<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variant_action".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $link
 */
class VariantAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variant_action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image', 'button_link','button_text'], 'required'],
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
            'image' => 'Image',
            'button_link' => 'Button link',
            'button_text' => 'Button text',
        ];
    }
}
