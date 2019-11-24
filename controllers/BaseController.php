<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SendForm;
use app\models\Article;
use app\models\Category;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;


class BaseController extends Controller
{


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout'=>'otherpages',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	public function actionIndex()
	{
		$this->layout = 'base';
		$sendForm = new SendForm(); // форма для отправки данных клиентского запроса на почту
		if($sendForm->load(Yii::$app->request->post()) && $sendForm->validate())
		{
			if($sendForm->sendMail('Uliya@fedorova.ru'))
			{	
				Yii::$app->session->setFlash('success');
			}
			else
			{
				Yii::$app->session->setFlash('warning');
			}
		}
		return $this->render('index',["sendForm"=>$sendForm]);
	}

	public function actionArticles()
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		Url::remember();
		$data = Article::getAll(3); // возвращает данные для вывода статей с пагинацией (количество статей на странице)
        $popular = Article::getPopular();//возвращает данные для вывода популярных статей
		$categories = Category::getAll(); //возвращает список всех категории у статей

		return $this->render('articles',["posts"=>$data['posts'], "pages"=>$data['pages'], "categories"=>$categories, 'popular'=>$popular]);
	}

	public function actionArticle($id)
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		Article::addViewSession($id);
		$article = Article::findone($id);
		if($article == null)
		{
			throw new NotFoundHttpException;
		}
		$popular = Article::getPopular();
		$categories = Category::getAll();

		return $this->render('article',['article'=>$article, 'popular'=>$popular, 'categories'=>$categories]);
	}

	public function actionCategory($id) //передается id категории, по которой будут выведены все статьи
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать

		$data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $categories = Category::getAll();
        $thisCategory = Category::findone($id);
		if($thisCategory == null)
		{
			throw new NotFoundHttpException;
		}

		return $this->render('category',['articles'=>$data['articles'], 'pages'=>$data['pages'], 'popular'=>$popular, 'categories' => $categories, 'thisCategory'=>$thisCategory]);
	}

	public function actionContacts()
	{
		$sendForm = new SendForm(); // форма для отправки данных клиентского запроса на почту
		if($sendForm->load(Yii::$app->request->post()) && $sendForm->validate())
		{
			if($sendForm->sendMail('Uliya@fedorova.ru'))
			{	
				Yii::$app->session->setFlash('success');
			}
			else
			{
				Yii::$app->session->setFlash('warning');
			}
		}
		$this->layout=false;
		return $this->render('contacts',["sendForm"=>$sendForm]);
	}

	public function actionAboutme()
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		return $this->render('aboutme');
	}

	public function actionWorkingwith()
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		return $this->render('workingwith');
	}

	public function actionWorkingmethod()
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		return $this->render('workingmethod');
	}

	public function actionTest()
	{
		$this->layout='otherpages'; //указываем с каким шаблоном работать
		 // Yii::$app->session->setFlash('msg', 'Your message goes here');

		return $this->render('test');
	}

}