<?php

namespace app\models;
use yii\data\Pagination;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 *
 * @property Videos[] $videos
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Videos::className(), ['category_id' => 'id']);
    }

    public function getArticles() 
    {
        return $this->hasMany(Article::className(),['article_category'=>'id']);
    }

    public function getArticlesCount()
    {
        return $this->getArticles()->count();
        
    }

    public static function getAll()
    {
        return Category::find()->all();
        
    }

    public function getArticlesByCategory($id)
    {
        $query = Article::find()->where(['article_category' => $id]); //Запрос для пагинации
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>4,'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        $data['articles'] = $posts;
        $data['pages'] = $pages;
        return $data;
    }

    // public function getCategoryName()
    // {
    //     return $this->hasMany(Article::ClassName(),['title' => 'id']);
    // }
}

// class Customer extends ActiveRecord 
// { 
//     public function getOrders() 
//     { 
//         return $this->hasMany(Order::className(), ['customer_id' => 'id']); 
//     }
// } 

// class Order extends ActiveRecord 
// { 
//     public function getCustomer() 
//     { 
//         return $this->hasOne(Customer::className(), ['id' => 'customer_id']); 
//     } 
// }