<form method="POST" >
    Логин <input name="login" type="text"><br>
    Пароль <input name="password" type="password"><br>
    <input name="submit" type="submit" value="Войти">

<?php
session_start();
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2015
 * Time: 16:54
 */
// Страница авторизации

# Соединямся с БД
$link=mysqli_connect('localhost', 'root', '','hello');

if(isset($_POST['submit']))
{
    # берем запись из БД с логином, который был введен в текстовое поле
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".$_POST['login']."'");
    $data = mysqli_fetch_assoc($query);

    # Сравниваем пароли
    if($data['user_password'] == $_POST['password'])
    {


        # Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        $_SESSION['login'] = $_POST['login'];


        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        echo  "Неверный логин/пароль";
    }


}
?>

