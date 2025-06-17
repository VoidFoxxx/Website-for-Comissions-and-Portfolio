<?php include_once "partials/header.php";
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Users.php');
?>
<div class ="container3d">
    <div class="description">
        <h1>Register</h1>
    </div>
    <div>
        <form method = "POST" name = "register">
            <input required placeholder = "username" type="username" name = "username">
            <input required placeholder = "email@email.com" type="email" name = "email">
            <input required placeholder = "password" type="password" name = "password">
            <input required placeholder = "repeat password" type="password" name = "repeatpassword">
            <input type="submit" value="Register" name = "userRegister">
        </form>
    </div>

    <?php
        if(isset($_POST['userRegister'])){
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new Users();
            //tu bude vzdy true alebo false
            $register_success = $user->register($email,$name,$password);
            if($register_success == true){
                header('Location: home.php');
                exit;
            }else{
                echo 'Incorrect email or password.';
            }
        }
    ?>
</div>
<?php include_once "partials/footer.php"?>