<?php

namespace app\models;

use app\models\Users;
use Yii;
use yii\base\Model;
use yii\helpers\Html;


/**
 * SignupForm is the model behind the login form.
 *
 * @property Users|null $users This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sh_users';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['first_name','last_name','username','email', 'password'], 'required'],
            [['first_name','last_name','username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            ['first_name', 'string','min'=>2,'max'=>100],
            ['last_name', 'string','min'=>2,'max'=>100],
            ['username','unique','targetClass'=>Users::className(),'message'=>'Это имя занято.'],
            ['username', 'string','min'=>2,'max'=>255],
            ['email','email'],
            ['email','unique','targetClass'=>Users::className(),'message'=>'Эта почта уже зарегистрирована.'],
            ['password', 'string','min'=>7],
        ];
    }

    public function attributeLabels(){
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'username' => 'Логин',//Ник
            'email' => 'E-mail',
            'password' => 'Пароль',
        ];
    }

    /**
     * Signs user up
     *
     * @return Users|null
     */
    public function signup()
    {
        if ($this->validate()) {
            $users = new Users();
            $users->first_name = Html::encode(strip_tags($this->first_name));
            $users->last_name = Html::encode(strip_tags($this->last_name));
            $users->username = Html::encode(strip_tags($this->username));
            $users->email = Html::encode(strip_tags($this->email));
            $users->setPassword(Html::encode(strip_tags($this->password)));
            $users->generateAuthKey();
            $users->save();
            return $users;
        }

        return null;
    }
}
