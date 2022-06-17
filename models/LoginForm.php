<?php


namespace models;


use core\Application;
use core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return[
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = (new User)->findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email','No user found under this email address');
            return false;
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('password','Incorrect password');
            return false;
        }
        return Application::$app->login($user);
    }
}