<?php
require_once 'header.php';
require_once '../functions/functions.php';

if($_POST['id_company']) {

    $id_company = $_POST['id_company'];
    $address = $_POST['address'];
    $name_person = $_POST['name_person'];
    $phone_number = $_POST['phone_number'];

    $db = new Database();
    $db = add_adr_by_id($db,$id_company,$address);
    $id = $db->lastId;

    $db= add_per_by_id($db,$id,$name_person,$phone_number);

    if ($db) {
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/action/list_office.php?id_company=$id_company\";</script>";
    } echo "Дані не додані";

}

if($_POST['name_company']){

    $name_company = $_POST['name_company'];
    $address = $_POST['address'];
    $name_person = $_POST['name_person'];
    $phone_number = $_POST['phone_number'];

    $db = new Database();

    $stmt = select_by_compname($db,$name_company);
    $id_company = $stmt['id_company'];

    $db=add_adr_by_id($db,$id_company,$address);
    $id=$db->lastId;

    $db = add_per_by_id($db,$id,$name_person,$phone_number);

    if($db){
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/action/list_office.php?id_company=$id_company\";</script>";
    } echo "Дані не додані";
}

?>



