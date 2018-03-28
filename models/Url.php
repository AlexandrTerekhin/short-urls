<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property string $url
 * @property string $short_url
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'short_url'], 'string', 'max' => 255],
            [['url'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'short_url' => 'Short Url',
        ];
    }

    /**
     * @inheritdoc
     * @return UrlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UrlQuery(get_called_class());
    }

    public function generateShortUrl()
    {
        $randomString = Yii::$app->getSecurity()->generateRandomString(Yii::$app->params['shortUrlLength']);

        if(!$this::findOne(['short_url' => $randomString])) {
            return $randomString;
        }

        return $this->generateShortUrl();
    }
}
