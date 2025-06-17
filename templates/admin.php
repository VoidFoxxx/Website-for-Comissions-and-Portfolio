<?php 

include_once "partials/header.php";

if(!isset($_SESSION['loggedIn'])){
    header("Location: home.php");
}
if($_SESSION['role'] != "admin"){
    header("Location: home.php");
}

require_once('../_inc/classes/Database.php');
require_once('../_inc/classes/Admin.php');
$admin = new Admin();
$tables = $admin->getTables();
if(isset($_GET["currentTable"])){
    $currentTable = $_GET["currentTable"];
}else{
    $currentTable = "users";
}
$tableData = $admin->getTableData($currentTable);
if($tableData != null){
    $tableKeys = array_keys($tableData[0]);
}else{
    $tableKeys = 0;
}





?>
<div class="container3d">
    <form method="get">
        <?php
            for($i=0;$i<count($tables);$i++){
                echo('<input type="submit" value="'.$tables[$i].'" name="currentTable">');
            }
            
        ?>
    </form>
    <table class = "table">
        <tr>
            <?php
                for($i=0;$i<count($tableKeys);$i++){
                    echo('<th>'.$tableKeys[$i].'</th>');
                    
                }echo('<th><button onclick="addNewFunc()">Add New</button></th>');
            ?>
        </tr>
        <?php
            for($i=0;$i<count($tableData);$i++){
                echo('<tr>');
                for($j=0;$j<count($tableData[$i]);$j++){
                    echo('<td>'.$tableData[$i][$tableKeys[$j]].'</td>');
                }
                echo('
                <td>
                    <button onclick = "openEdit('.$tableData[$i][$tableKeys[0]].')">Edit</button>
                </td>
                    <td>
                        <form method = "post" action = "delete.php">
                            <input type = "submit" value = "Delete" name = "delete">
                            <input type = "hidden" value = "'.$currentTable.'" name = "table">
                            <input type = "hidden" value = "'.$tableData[$i][$tableKeys[0]].'" name = "ID">
                        </form>
                    </td>
                </tr>');
            }
        ?>
    </table>
</div>

<div class = "modal" ID = "addModal">
    <button onclick="escape()">Close</button>
    <form method="post" action = "add.php">
        <?php
            echo('You are adding to '.$currentTable.'<br>');
            for($i=1;$i<count($tableKeys);$i++){
                echo('
                    <div class = "modalRow">
                        <div>
                            '.$tableKeys[$i].'
                        </div>
                        <div>
                            <input type= "text" required name = "'.$tableKeys[$i].'">
                        </div>
                    </div>
                ');
            }
            echo('<input type = "hidden" name = "table" value = "'.$currentTable.'">')
        ?>
        <input type="submit" value = "Add New">
    </form>
</div>

<div class = "modal" ID = "editModal">
    <button onclick="escape()">Close</button>
    <form method="post" action = "edit.php">
        <?php
            echo('You are editing '.$currentTable.'<br>');
            for($i=1;$i<count($tableKeys);$i++){
                echo('
                    <div class = "modalRow">
                        <div>
                            '.$tableKeys[$i].'
                        </div>
                        <div>
                            <input type= "text" name = "'.$tableKeys[$i].'">
                        </div>
                    </div>
                ');
            }
            echo('<input type = "hidden" name = "table" value = "'.$currentTable.'">')
        ?>
        <input type="submit" value = "Edit">
        <input type="hidden" name="editId" id="editId" value = "">
    </form>
</div>

<div ID = "overlay" onclick = "escape()"></div>

<script src="../assets/js/admin.js"></script>
<?php include_once "partials/footer.php"?>