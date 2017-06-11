<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Users model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property datetime $created_at
 * @property timestamp $updated_at
 * @property string $password write-only password
 */
class Users extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const ROLE_USER = 10;

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    public static function tableName(){
        return 'sh_users';//or return '{{%sh_users}}';
    }
    public function behaviors(){//automatic willcreate and update our datetime fields created_at and updated_at
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /* or this if created_at and updated_at as integer fields
    public function behaviors(){
        return TimestampBehavior::className();
    }*/

    /* Связи */
    /* public function getProfile()
     {
         return $this->hasOne(Profile::className(), ['user_id' => 'id']);
     }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

               /* [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
                [['username', 'email', 'status'], 'required'],
                ['email', 'email'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['password', 'required', 'on' => 'create'],
                ['username', 'unique', 'message' => 'Это имя занято.'],
                ['email', 'unique', 'message' => 'Эта почта уже зарегистрирована.'],
                ['secret_key', 'unique']*/

            ['status','default','value'=>self::STATUS_ACTIVE],
            //['status','in','range'=>[self::STATUS_ACTIVE,self::STATUS_DELETED]],
            ['role','default','value'=>self::ROLE_USER],
            //['role','in','range'=>self::ROLE_USER],
            /*[['currentPassword', 'newPassword', 'confirmPassword'], 'required'],
            [['currentPassword'], 'validateCurrentPassword'],
            [['newPassword', 'newPasswordConfirm'],'string','min'=>7],
            [['newPassword', 'newPasswordConfirm'],'filter','filter'=>'trim'],
            [['newPasswordConfirm'],'compare','compareAttribute'=>'newPassword','message'=>'Пароли не совпадают'],Passwords do not match*/
        ];
    }

    public function attributeLabels()
    {
        return [
            'currentPassword' => 'Текущий пароль',
            'newPassword' => 'Новый пароль',
            'confirmPassword' => 'Подтвердите новый пароль',
        ];
    }
    public function validateCurrentPassword()
    {
        if($this->verifyPassword($this->currentPassword)){
            $this->addError("currentPassword","Неверный текущий пароль");//Current password incorrect;
        }
    }
    public function verifyPassword($password)
    {
        $dbpassword = static::findOne(['username'=>Yii::$app->user->identity->username,'status'=>self::STATUS_ACTIVE])->password_hash;
        return Yii::$app->security->validatePassword($password,$dbpassword);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //default don`t in data from db-   return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne(['id'=>$id,'status'=>self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented,');
        //this function required to write  return static::findOne(['access_token' => $token]);
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;*/
        return static::findOne(['username'=>$username,'status'=>self::STATUS_ACTIVE]);

    }
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email'=>$email,'status'=>self::STATUS_ACTIVE]);
    }
    /**
     * Генерирует хеш из введенного пароля и присваивает (при записи) полученное значение полю password_hash таблицы user для
     * нового пользователя.
     * Вызываеться из модели RegForm.
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if(!static::isPasswordResetTokenValid()){
            return null;
        }
        return static::findOne([
            'password_reset_token'=>$token,
            'status'=>self::STATUS_ACTIVE
            ]
        );
    }
    /*public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }*/
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;//default authKey
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    //return $this->password === $password;
       // return \Yii::$app->security->validatePassword($password,$this->password);
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function generateAuthKey(){//our write function
        $this->auth_key = \Yii::$app->security->generateRandomString();//32 symbols will generate
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}
