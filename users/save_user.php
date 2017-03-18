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
if (isset($_POST['login']))
{
    $u_login = $_POST['login']; if ($u_login == '')
    {
        unset($u_login);
    }
}

if (isset($_POST['password']))
{
    $u_password=$_POST['password']; if ($u_password =='')
    {
        unset($u_password);
    }

}

if (empty($u_login) or empty($u_password))
{
    exit ("Ви ввели не всю інформацію, заповніть поля будь-ласка!");
}

$login = stripslashes($u_login);
$login = htmlspecialchars($u_login);
$password = stripslashes($u_password);
$password = htmlspecialchars($u_password);

//удаляем лишние пробелы
$u_login = trim($u_login);
$u_password = trim($u_password);


include_once '../classes/db.class.php';

$db = new Database();
$db->select_name('users',array('login'=>$u_login));

        if (!empty($db)) {
            exit ("Введений вами логін вже зареєстрований. Введіть інший логін.");
        }  else {
            $db->insert('users',array('login'=>$u_login,'password'=>$password));

        }
        if ($db) {
            echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/menu/list_comp.php\";</script>";
        } else {
            echo "Ви не зареєстровані";
        }


?>
</body>
</html>
