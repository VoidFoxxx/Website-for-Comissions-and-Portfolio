<?php include_once "partials/header.php"?>

    <div class="description">
        <h1>Log In</h1>
    </div>
    <div>
        <form method = "POST">
            <input type="email" name = "email">
            <input type="password" name = "password">
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
                echo 'Nesprávne meno alebo heslo';
            }
        }
    ?>
<?php include_once "partials/footer.php"?>