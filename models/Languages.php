<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $language
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $widget_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Message $message
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language', 'name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['language', 'name'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 255],
            [['status'], 'boolean'],
            [['widget_id'], 'string', 'max' => 16],
            [['language'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('app', 'ID'),
            'language'    => Yii::t('app', 'Language'),
            'name'        => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'status'      => Yii::t('app', 'Status'),
            'widget_id' => Yii::t('app', 'Widget ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['language' => 'language']);
    }

    /**
     * @inheritdoc
     * @return LanguagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LanguagesQuery(get_called_class());
    }

    /**
     * @param string $language Язык в системе
     * @return bool
     */
    public function checkExist($language)
    {
        $message = Message::findOne(['language' => $language]);
        if ($message) {
            $this->addError('language', Yii::t('app', 'error-exist-language'));
            return false;
        }
        return true;
    }
}
