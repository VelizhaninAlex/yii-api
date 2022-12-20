<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * @property Languages $languages
 * @property SourceMessage $source
 */
class Message extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 16],
            [
                ['id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => SourceMessage::className(),
                'targetAttribute' => ['id' => 'id']
            ],
            [
                ['language'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Languages::className(),
                'targetAttribute' => ['language' => 'language']
            ],
            [['id'], 'unique', 'targetAttribute' => ['language', 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $source = SourceMessage::findOne(['id' => $this->id]);

        if ($source) {
            $key = [
                'yii\i18n\DbMessageSource',
                $source->category,
                $this->language
            ];

            Yii::$app->cache->delete($key);
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('app', 'ID'),
            'language'    => Yii::t('app', 'Language'),
            'translation' => Yii::t('app', 'Translation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(Languages::className(), ['language' => 'language']);
    }

    /**
     * @return array
     */
    public function getAllLanguages()
    {
        return ArrayHelper::map(Languages::find()->all(), 'language', 'name');
    }

    /**
     * @return array
     */
    public function getAllSources()
    {
        return ArrayHelper::map(SourceMessage::find()->all(), 'id', function ($data) {
            return $data->category . ' → ' . $data->message;
        });
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(SourceMessage::className(), ['id' => 'id']);
    }

    /**
     * @return bool|string
     */
    public function getSourceCategory()
    {
        if ($this->source) {
            return $this->source->category;
        }
        return false;
    }

    /**
     * @return bool|string
     */
    public function getSourceMessage()
    {
        if ($this->source) {
            return $this->source->message;
        }
        return false;
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }
}
