<form method="POST" >
    Логин <input name="login" type="text"><br>
    Пароль <input name="password" type="password"><br>
    <input name="submit" type="submit" value="Войти">

<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2015
 * Time: 16:45
 */
// Страница регистрации нового пользователя


# Соединямся с БД
$link=mysqli_connect('localhost', 'root', '','hello');

if(isset($_POST['submit']))
{
    $err = array();

    $login = $_POST['login'];
    $password = $_POST['password'];

    # проверяем, не сущестует ли пользователя с таким именем
    /*
    $query = mysqli_query($link, "SELECT COUNT(*) FROM users WHERE user_login='".$login."'");
    $row_cnt = mysqli_stmt_num_rows($query);
    if($row_cnt > 0)
        {
            echo $row_cnt;
        }
    */

    # Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
        header("Location: login.php"); exit();
    }

}

