<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\ImageUpload;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\modules\admin\controllers\behaviors\AccessBehavior;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            AccessBehavior::className(),
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article(); // Юерем модель таблицы статей чтобы записать в нее инфу

        $Imagemodel = new ImageUpload(); //модель проверки и загрузки (перезагрузки) картинки  в папку

        $categories = ArrayHelper::map(Category::find()->all(),'id','title'); // записываем в переменную список существующих категорий, чтобы при создании новой статии просто выбирать её категорию из слайдера

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Если в массив пост попали данные из формы и они были провалидированны

            $downloadImage = UploadedFile::getInstance($Imagemodel,'image');
            //создаем объект из файла, данные которого были загружены.

            if($downloadImage !== null)
            {
                $model->saveImage($Imagemodel->uploadFile($downloadImage, $model->image));
                //сначала загружаем фаил нужную директорию с помощью функции uploadFile(),затем дабавляем название изображения созданной этой функцией в базу данных.
                $model->save();
            }
            else
            {
                $model->save();
            }
            //Сохраняем данные в базу данных.
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,'categories' => $categories,'Imagemodel' => $Imagemodel,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $Imagemodel = new ImageUpload(); //модель проверки и загрузки (перезагрузки) картинки  в папку

        $categories = ArrayHelper::map(Category::find()->all(),'id','title'); // кладем в переменную массив из всех категорий в виде ( id категории => title название категории)

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $downloadImage = UploadedFile::getInstance($Imagemodel, 'image');
            if($downloadImage !== null)
            {
                $model->saveImage($Imagemodel->uploadFile($downloadImage, $model->image));
                $model->save();
            }
            else
            {
                $model->save();
            }



            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,'categories' => $categories,'Imagemodel'=>$Imagemodel,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload;

        if (yii::$app->request->isPost)
        {
            $article = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if($article->saveImage($model->uploadFile($file, $article->image)))
            {
                return $this->redirect(['view','id'=>$article->id]);
            }

        }
        return $this->render('image',['model'=>$model]);
    }

    public function actionSetCategory($id)
    {
        $article = $this->findModel($id); // берем статью и все ее данные из таблицы по id
        $selectedCategory = $article->article_category; //кладем в переменную номер категории статьи с которой работаем
        $categories = ArrayHelper::map(Category::find()->all(),'id','title'); // кладем в переменную массив из всех категорий в виде ( id категории => title название категории)
        if(Yii::$app->request->isPost) // если была нажата кнопка измениния категории в виде
        {   
            $category = Yii::$app->request->post('category'); // кладем в переменную полученное значение категории из массива post
            $article->saveCategory($category); // сохраняем измененную категорию в таблицу с помощью функции saveCategory
            if($article->saveCategory($category)) // если сохранение прошло успешно, то
            {
                return $this->redirect(['view','id'=>$article->id]); // возвращаем пользователя на страницу вида view.php.
            }
        }
        // выводим вид странци category.php и отправляем ему данные в переменных:
        return $this->render('category', [
            'article'=>$article, // массив с данными статьи
            'selectedCategory'=>$selectedCategory, // номер категории этой статьи
            'categories'=>$categories, // массив из всех существующих категорий
        ]);
    }

    public function actionSetPreArticle($id)
    {
        // echo 'понятно';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('shortdescription', [
            'model' => $model,
        ]);
    }


}