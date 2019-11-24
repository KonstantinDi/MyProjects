<?php

namespace app\models;

use Yii;
use app\models\imageUpload;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property int $article_category
 */
class Article extends \yii\db\ActiveRecord
{
    // public $prearticle;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content','prearticle'], 'required'],
            [['content','prearticle'], 'string'],
            [['article_category'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'],'file'],
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
            'prearticle' => 'Prearticle',
            'content' => 'Content',
            'image' => 'Image',
            'article_category' => 'Article Category',
        ];
    }

    public function saveImage($filename) // сохраняет имя картинки в базу данных
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage() // функция для вывода картинки в списке статей
    {
       return ($this->image)?'/uploads/'.$this->image:'/uploads/no-image.jpg';
    }

    public function deleteImage() // удаляет картинку из папки
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete() // метод который вызывает метод deleteImage, чтобы удалить картинку из папки после удаления статьи из базы данных
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'article_category']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if($category != null)
        {
            $this->link('category', $category);
            return true;
        }
    }

    // возвращает либо строку катугории из связанной таблицы, либо "без категории"
    public function getCategoryforArticle()
    {
        if($this->category)//это связь а не свойство
        {
            return $this->category/*это связь а не свойство*/->title;
        }
        else
        {
            return null;
        }

        
    }

    public static function getAll($countOfArticlesperPage = 3)
    {
        $query = Article::find(); //Запрос для пагинации
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>$countOfArticlesperPage,'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        $data['posts'] = $posts;
        $data['pages'] = $pages;

        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('views desc')->limit(3)->all(); 

    }

   /* Описание метода прибавления +1 к просмоторам, метода основан на cookies, метод заменен на аналогичный с использованием сессий.
    public function addView()
    {
        if(Yii::$app->request->cookies->has('usercookie'))
        {
            echo '<pre>';
            var_dump(Yii::$app->request->cookies->getValue('usercookie'));
            echo '</pre>';
        }
        else
        {
            $value = rand(1000,9999).".".time();
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                    'name' => 'usercookie',
                    'value'=>$value,
                    'expire'=>time() + 3600*24
                ]));
        
        }

        // Yii::$app->response->cookies->remove('usercookie');

    }
    */

    // проверяет была ли статья с id просмотрена, если нет, то создает массив в сессии, и добавляет туда значения
    // просмотренных статей (как id=>id - ключ => значение), затем увеличивает в базе данных значение просмотров на 1.
    // принимает id статьи, и ключ - массив, куда будут записываться элементы уже посмотренных страниц.

    public function addViewSession($id,$guest = 'quest')
    {
        $session = Yii::$app->session;

        $session->open();

        
        if(isset($session[$guest]))
        {
            if(isset($session[$guest][$id]))
            {
                // echo 'уже посмотрели стаью';
                $session->close();
            }
            else
            {
                // echo 'впервые смотрим эту статью';
                $session[$guest] += [ 
                    $id=>$id 
                ];
                self::addViewInDb($id);
                $session->close();
            }
        }
        else
        {
            // echo 'впервые вообще смотрим статьи';
            $session[$guest] = [
                $id=>$id ];

            self::addViewInDb($id);
            $session->close();

        }
                // $session->remove('guest');
                // var_dump($session['guest']);
    }

    private static function addViewInDb($id)
    {
            $viewed = self::findOne($id); // находим строчку в таблице которая относиться к нашей статье или товару.
            $viewed->views++; //views название столбца просмотров в таблице, увеличиваем на один количество просмотров
            $viewed->save(); // сохраняем измененное значение в бд.
    }

}
