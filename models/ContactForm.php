<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
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
            // Поля обязательные для заполнения 
            [['name', 'email', 'subject', 'body'], 'required', 'message' => 'Поле обязательно для заполнения'],
            // Проверка поля электронной почты
            ['email', 'email'],

            [['name'],'string', 'max' => 50], 
            [['email'], 'string', 'max' => 50], 
            [['body'], 'string', 'max' => 255],

            // Капча
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Введите текст с картинки',
            'name' => 'Ваше имя/Username',
            'email' => 'Email',
            'subject' => 'Тема',
            'body' => 'Сообщение',
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
            $message = Yii::$app->mailer->compose()
                ->setTo($email)
           //  ->setTo('test-t07z8k4z3@srv1.mail-tester.com')
           //     ->setTo('forestmarket@yandex.ru')
                // ->setFrom('admin@osmanova.xn--80ahdri7a.site')
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body);

            if ($message->send()) {
                return true;
            }
        }
        return false;

        // if ($this->validate()) {
        //     $message = Yii::$app->mailer->compose()
        //         ->setTo($email)
        //         ->setFrom([$this->email => $this->name])
        //         // ->setReplyTo([$this->email => $this->name])
        //         ->setSubject($this->subject)
        //         ->setTextBody($this->body);
                
        //         if ($message->send())  return true;
        // }
        // return false;

        // if ($this->validate()) {    
        //     Yii::$app->mailer->compose() 
        //         ->setFrom([$this->email => $this->name]) /* от кого */
        //         ->setTo($email) /* куда */
        //         ->setSubject($this->subject) /* имя отправителя */
        //         ->setTextBody($this->body) /* текст сообщения */
        //         ->send(); /* функция отправки письма */

        //     return true;
        // } else {
        //     return false;
        // }
    }
}
