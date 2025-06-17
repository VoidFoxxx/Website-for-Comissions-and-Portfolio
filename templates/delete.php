<?php
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Admin.php');
$deleteAdmin = new Admin();
$table = $_POST["table"];
$deleteAdmin->deleteRow($_POST["ID"],$table);

header('Location: admin.php?currentTable='.$_POST["table"]);
?>