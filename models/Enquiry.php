<?php

namespace app\models;

use yii\base\Model;

class Enquiry extends Model
{
    public $property;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $consent;
    

    public function rules()
    {
        return [
            [['property', 'name', 'email', 'phone','consent'], 'required'],
            ['email', 'email'],
            ['message', 'string', 'max' => 500],
        ];
    }
}
