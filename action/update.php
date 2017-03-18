<?php
require_once 'header.php';
require_once '../classes/db.class.php';
require_once '../functions/functions.php';
$db = new Database();

if($_POST['id_company'] && $_POST['name_company'] && $_POST['website'] && $_POST['activity']) {
    $id_company = $_POST['id_company'];

    $name_company = $_POST['name_company'];
    $year = $_POST['year'];
    $website = $_POST['website'];
    $activity = $_POST['activity'];

    $db=update_comp($db,$name_company,$year,$website,$activity,$id_company);

    if ($db) {
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/action/edit.php?id_company=$id_company\";</script>";
    } else {
        echo "<br>Інформація не додана.";
    }

}

if ($_POST['address'] && $_POST['name_person'] && $_POST['phone_number']){

    $id_address = $_POST['id_address'];
    $id_person = $_POST['id_person'];
    $address = $_POST['address'];
    $name_person = $_POST['name_person'];
    $phone_number = $_POST['phone_number'];

    $db=update_adr($db,$id_address,$address);
    $db=update_per($db,$id_person,$name_person,$phone_number);

    if ($db) {
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/action/edit.php?id_address=$id_address\";</script>";
    } else {
        echo "<br>Інформація не додана.";
    }

}
?>

</body>
</html>
