<?php

namespace app\models;

use yii\base\Model;

class AppointmentForm extends Model
{
    public $project;
    public $name;
    public $email;
    public $phone;
    public $message;

    public function rules()
    {
        return [
            [['project', 'name', 'email', 'phone'], 'required'],
            ['email', 'email'],
            ['message', 'string', 'max' => 500],
        ];
    }
}
