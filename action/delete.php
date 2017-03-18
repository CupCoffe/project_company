<?php
require_once 'header.php';
require_once '../functions/functions.php';
$db = new Database();

if($_GET['id_company']) {
    $id_company = $_GET['id_company'];

    $db = delete_comp($db,$id_company);

    if ($db) {
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/menu/list_comp.php\";</script>";
    } else {
        echo "<br>Інформація успішно видалена.";
    }
}

if ($_GET['id_address']){
    $id_address = $_GET['id_address'];

    $db = delete_adr($db,$id_address);

    if ($db) {
        echo "<script type=\"text/javascript\"> window.location = \"http://php-1-01.host-panel.net/project/menu/list_comp.php\";</script>";
    } else {
        echo "<br>Інформація не видалена.";
    }
}
?>

</body>
</html>
