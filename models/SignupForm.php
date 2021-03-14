<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules(): array
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username'], 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 4],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup(): bool
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();

        if (!$user->save()) {
            \Yii::error('User could not be created.', VarDumper::dumpAsString($user->errors));
            return false;
        }

        return true;
    }
}
