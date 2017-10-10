<?php

namespace app\controllers;


use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public function signupAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form-data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('user')) $_SESSION['success'] = "Вы успешно зарегистрировались!";
            else $_SESSION['errors'] = "Ошибка! Попробуйте позже!";
            redirect();
        }
        View::setMeta('Регистрация');
    }

    public function loginAction()
    {
        if ($_POST) {
            $user = new User();
            if ($user->login()) $_SESSION['success'] = "Вы успешно авторизированы!";
            else $_SESSION['errors'] = "Логин либо пароль введены не верно!";
            redirect();
        }
        View::setMeta('Вход');
    }

    public function logoutAction()
    {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/user/login');
    }
}