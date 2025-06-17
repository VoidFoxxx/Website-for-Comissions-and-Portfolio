<?php include_once "partials/header.php";
require_once('../_inc/classes/Database.php');
require_once('../_inc/classes/Commissions.php');
?>
<div class = "container3d">
    <div class="description">
        <div id="title">
            <p>Commissions</p>
        </div>
        <form method = "POST">
            <select name="type">
                <option value="character">Character</option>
                <option value="object">Object</option>
                <option value="vehicle">Vehicle</option>
                <option value="other">Other</option>
            </select>
            <textarea name="description" placeholder = "description of model"></textarea>
            <input type="range" min = "0" max = "10" name = "complexity">
            <input type="range" min = "0" max = "10" name = "animation">
            <input type="range" min = "0" max = "10" name = "texture">
            <input type="range" min = "0" max = "10" name = "bumpmap">
            <input type="range" min = "0" max = "10" name = "skeleton">
            <?php
                echo('<input type="hidden" value = "'.$_SESSION['userId'].'" name = "user_id">');
            ?>
            <input type="submit" value="Send commission" name = "sendCommission">
        </form>
    </div>

    <?php
        if(isset($_POST['sendCommission'])){
            $data = array(
                'type' => $_POST["type"],
                'description' => $_POST["description"],
                'complexity' => $_POST["complexity"],
                'animation' => $_POST["animation"],
                'texture' => $_POST["texture"],
                'bumpmap' => $_POST["bumpmap"],
                'skeleton' => $_POST["skeleton"],
                'user_id' => $_POST["user_id"],
            );
                
            $commissions = new Commissions();
            //tu bude vzdy true alebo false
            $commissions_success = $commissions->sendCommission($data);
            if($commissions_success == true){
                header('Location: home.php');
                exit;
            }else{
                echo 'Incorrect email or password.';
            }
        }
    ?>
</div>

<?php include_once "partials/footer.php"?>