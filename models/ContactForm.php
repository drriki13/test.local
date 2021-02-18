<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    const NAME_NO_VALIDATION = 'name_no_validation';
    const ONLY_NAME = 'only_name';

    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::NAME_NO_VALIDATION] = ['email', 'subject', 'body', 'verifyCode'];
        $scenarios[self::ONLY_NAME] = ['name'];
        return $scenarios;
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'subject', 'body'], 'required'],
            ['email', 'required', 'on' => self::SCENARIO_DEFAULT],
            ['email', 'email', 'on' => self::SCENARIO_DEFAULT],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
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
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
