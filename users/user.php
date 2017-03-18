<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Компанії</title>
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
    <!--<script src="js/prefixfree.min.js"></script>-->
    <link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include("../classes/db.class.php");

if (isset($_POST['login']))
{
    $u_login = $_POST['login'];
    if ($u_login == '')
    {
        unset($login);
    }
}

if (isset($_POST['password']))
{
    $u_password=$_POST['password']; if ($u_password =='')
    {
        unset($u_password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($u_login) or empty($u_password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo '<script type="text/javascript"> window.location = "http://php-1-01.host-panel.net/project/index.html";</script>';
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$u_login = stripslashes($u_login);
$u_login = htmlspecialchars($u_login);
$u_password = stripslashes($u_password);
$u_password = htmlspecialchars($u_password);
//удаляем лишние пробелы
$u_login = trim($u_login);
$u_password = trim($u_password);

$db = new Database();

$stmt=$db -> select_name('users',array('users.login'=>$u_login));

        if (empty($stmt['login'])) {
            //exit ("Введений логін або пароль не вірні.");
            echo '<script type="text/javascript"> window.location = "http://php-1-01.host-panel.net/project/index.html";</script>';
        } else {
            if ($stmt['password'] == $u_password) {
                echo '<script type="text/javascript"> window.location = "http://php-1-01.host-panel.net/project/menu/list_comp.php";</script>';
            } /*else {
                echo "Введені вами логін або пароль не вірні<a href='../index.html'><img src='../img/back.png'></a>";
                //sleep(3);
                //echo '<script type="text/javascript"> window.location = "http://php-1-01.host-panel.net/tasks/project/index.html";</script>';
            }*/
    }

echo '<script type="text/javascript"> window.location = "http://php-1-01.host-panel.net/project/index.html";</script>';


?>
</body>
</html>


