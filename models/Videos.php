<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property int $category_id
 *
 * @property Category $category
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'link' => 'Link',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function changeSizeofIframe(string$subject)
    {
        //функция создана для уменьшения размера iframe из youtube, она уменьшает размер iframe и затем возвращает код фрейма, который затем можно сохранить в базу данных для дальнейшего использования.
        $pattern = "/width=\"[\d]{3}\" height=\"[\d]{3}\"/"; // патерн, на который проверсяться строка
        $replacement = "width=\"300\" height=\"200\""; //паттерн на который заменяеться строка
        $result = preg_replace($pattern, $replacement, $subject); // используемая функция php для замены
        return $result;
    }

}
