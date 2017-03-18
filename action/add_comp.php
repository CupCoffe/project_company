<?php
require_once '../functions/functions.php';

$name_company = $_POST['name_company'];
$year = $_POST['year'];
$activity = $_POST['activity'];
$website = $_POST['website'];
$address = $_POST['address'];
$email = $_POST['email'];
$name_person = $_POST['name_person'];
$phone_number = $_POST['phone_number'];

$db = new DataBase();
$db = add_comp($db,$name_company,$year,$activity,$website,$address,$email,$name_person,$phone_number);

if ($db)
{
    echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/menu/list_comp.php\";</script>";
}
else {
   echo "<br>Інформація не додана.";
}

?>

