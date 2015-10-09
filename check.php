<?php
session_start();
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2015
 * Time: 16:58
 */
// Скрипт проверки


# Соединямся с БД
$link=mysqli_connect('localhost', 'root', '','hello');



if (isset($_COOKIE['id']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."'");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_id'] !== $_COOKIE['id']))
    {

        echo "Ошибка";
    }
    else
    {

        echo "Привет, ".$userdata['user_login'].". Всё работает!";

        if ($_SESSION['login']=='admin') echo "<br>Внимание!Вы зашли как администратор";

    }

}
else
{
    echo "Включите cookie";
}
echo '<form method="POST" >';
echo '<input name="submit" type="submit" value="Назад">';
if(isset($_POST['submit']))
    header("Location: login.php"); exit();




