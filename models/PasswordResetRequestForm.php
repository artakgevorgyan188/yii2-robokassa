<?php
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\Users;
/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\models\Users',
                'filter' => ['status' => Users::STATUS_ACTIVE],
                'message' => 'У Нас нет пользователь с этим адресом электронной почты.'//There is no user with this email address.
            ],
        ];
    }
    public function attributeLabels(){
        return [
            'email' => 'E-mail',
        ];
    }
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user Users */
        $user = Users::findOne([
            'status' => Users::STATUS_ACTIVE,
            'email' => $this->email,
        ]);
        if (!$user) {
            return false;
        }

        if (!Users::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }
        return Yii::$app->mailer->compose('passwordResetToken', ['user' => $user])
            ->setFrom(['artakgevorgyan188@mail.ru' => 'yii2-robokassa.local'])
            ->setTo($this->email)
            ->setSubject('Восстановление пароля для сайта yii2-robokassa.local')//Password reset for
            ->send();
    }
}