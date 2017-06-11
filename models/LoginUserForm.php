<?php

namespace app\models;

use app\models\Users;
use Yii;
use yii\base\Model;


/**
 * LoginUserForm is the model behind the login form.
 *
 * @property Users|null $user This property is read-only.
 *
 */
class LoginUserForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $status;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'default'],
            [['email', 'password'], 'required', 'on' => 'loginWithEmail'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function attributeLabels(){
        return [
            'username' => 'Логин',//Ник
            'email' => 'Емайл',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить'
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()):
            $user = $this->getUsers();
            if (!$user || !$user->validatePassword($this->password)):
                $field = ($this->scenario === 'loginWithEmail') ? 'email' : 'логин';
                $this->addError($attribute, 'Неправильный '.$field.' или пароль.');
            endif;
        endif;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {

            if($this->rememberMe){
                $u = $this->getUsers();
                $u->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUsers(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]] or by [[email]]
     *
     * @return Users|null
     */
    public function getUsers()
    {
        if ($this->_user === false):
            if($this->scenario === 'loginWithEmail'):
                $this->_user = Users::findByEmail($this->email);
            else:
                $this->_user = Users::findByUsername($this->username);
            endif;
        endif;
        return $this->_user;
    }
}
