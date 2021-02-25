<?php

var_dump($_POST);

ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
     
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    
// подключаемся к базе
    include ($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
    $result = mysqli_query(Connect::getConnection(),"SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    
    $line = mysqli_fetch_assoc($result);

    var_dump(   $line);
    if (empty($line['password']))
    {
    //если пользователя с введенным логином не существует
    exit ("Извинитеn, введённый вами login или пароль неверный. 111");
    }
    else {
    //если существует, то сверяем пароли
    if (hash_equals( $line['password'], crypt($_POST['password'], $line['password']))) {
        ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$line['login']; 
    $_SESSION['id']=$line['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    header('Location: page.php');
    }
 else {
    //если пароли не сошлись

    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }


    
    ?>