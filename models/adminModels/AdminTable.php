<?php

namespace app\models\adminModels;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 */
class AdminTable extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

     public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // return $this->authKey;
    }

    public function validateAuthKey($authKey)
     {
    //     return $this->authKey === $authKey;
    }

    public static function findByUsername($user)
    {
        return AdminTable::find()->where(['login'=>$user])->one();
    }

    public function validatePassword($password)
    {   
        return ($this->password == $password) ? true : false;
    }

}
