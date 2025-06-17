<?php include_once "partials/header.php";
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Users.php');
?>
<div class="container3d">
    <div class="description">
        <h1>Log In</h1>
    </div>
    <div>
        <form method = "POST">
            <input placeholder = "email@email.com" type="email" name = "email">
            <input placeholder = "password" type="password" name = "password">
            <input type="submit" value="Log in" name = "userLogin">
        </form>
    </div>

    <?php
        if(isset($_POST['userLogin'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new Users();
            //tu bude vzdy true alebo false
            $login_success = $user->login($email,$password);
            if($login_success == true){
                header('Location: home.php');
                exit;
            }else{
                echo('Incorrect email or password.');
            }
        }
    ?>
</div>
<?php include_once "partials/footer.php"?>