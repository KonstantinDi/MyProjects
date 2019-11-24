<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SendForm extends Model
{
	private $mailSubject = 'Письмо от посетителя вашего сайта';
	public $clientName;
	public $clientSellPhone;
	public $clientEmail;
	public $clientProblemDescription;
	public $agreetoPersonalData;
	// public $verifyCode;

	public function rules()
	{
		return[
			[['clientName','clientEmail','clientProblemDescription'],'required','message'=>'Пожалуйста заполните поле формы'],
			['clientName','string','message'=>'Необходимо вводить только текст'],
			['clientSellPhone','integer','message'=>'Введите телефон цифрами без пробелов'],
			['clientEmail','email','message'=>'Email введен неверно'],
			['clientProblemDescription','string','message'=>'Необходимо вводить только текст'],
			['agreetoPersonalData','required','message'=>'Нужно ваше согласия для отправки формы'],
			// ['agreetoPersonalData','boolean']
		];
	}

    public function sendMail($email)
    {

        if ($this->validate()) {
            Yii::$app->mailer->compose('html',[
            	'name'=>$this->clientName,
            	'tel'=>$this->clientSellPhone,
            	'email'=>$this->clientEmail,
            	'problem'=>$this->clientProblemDescription
            ])
            ->setTo($email)
            ->setFrom($this->clientEmail)
            ->setSubject($this->mailSubject)
            ->send();
            return true;
        }
        return false;
    }
}

?>