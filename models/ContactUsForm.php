<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactUsForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Проверочный код',
            'name' => 'Имя',
            'email' => 'E-mail',
            'subject' => 'Тема',
            'body' => 'Ваше сообщение',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            /*Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();*/
            Yii::$app->mailer->compose()
                ->setFrom(['artakgevorgyan188@mail.ru'=>'yii2-robokassa.local'])
                ->setTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->setHtmlBody('<b>'.$this->body.'</b>')
                ->send();
            Yii::$app->mailer->compose()
                ->setFrom(['artakgevorgyan188@mail.ru'=>'yii2-robokassa.local'])
                ->setTo([Yii::$app->params['adminEmail']=> $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->setHtmlBody('<b>'.$this->body.'</b>')
                ->send();

            return true;
        }
        return false;
    }
}