<?php
/**
 * Created by PhpStorm.
 * User: саня
 * Date: 17.02.2018
 * Time: 20:07
 */

namespace app\models;


use yii\base\Model;
use Yii;


class RegistrationForm extends Model
{
    public $login;
    public $password;
    public $first_name;
    public $last_name;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['login', 'password', 'first_name', 'last_name'], 'required'],


        ];
    }



    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->login);
        }

        return $this->_user;
    }


    public function attributeLabels()
    {
        return [

            'login' => 'Логин',
            'password' => 'Пароль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',

        ];
    }

}