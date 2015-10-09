
<?php
session_start();
/*if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
echo "Вы обновили эту страницу ".$_SESSION['counter']++." раз(а).<br> ";*/

/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.10.2015
 * Time: 16:58
 */
// Скрипт проверки


# Соединямся с БД
$link=mysqli_connect('localhost', 'root', '','hello');

/*if (!isset($_SESSION['login'])) $_SESSION['login'] = $_POST['login'];
if ($_SESSION['login']=='admin') echo "You logged as admin<br>";*/

if (isset($_COOKIE['id']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."'");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_id'] !== $_COOKIE['id']))
    {

        echo "error";
    }
    else
    {

        echo "Привет, ".$userdata['user_login'].". Всё работает!";

    }
}
else
{
    echo "Включите cookie";
}

