<?php
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Admin.php');
$addAdmin = new Admin();

$addAdmin->addNewRow($_POST);

header('Location: admin.php?currentTable='.$_POST["table"]);
?>