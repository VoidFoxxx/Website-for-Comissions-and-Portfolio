<?php
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Admin.php');
$editAdmin = new Admin();

$editAdmin->editRow($_POST);

header('Location: admin.php?currentTable='.$_POST["table"]);
?>