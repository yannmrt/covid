<?php
require "db.php";

    function checkLogin() {
        if($_SESSION && ( $_SESSION["Logged"] == true )) {
            return false;
        } else {
            return true;
        }
    }
    
    function loginUser($email, $mdp){
        $email = htmlspecialchars($email);
        $mdp = hash("sha512", $mdp); 

        if(!empty($email) AND !empty($mdp)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $checkUser = $sql->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
                $checkUser->execute(array($email, $mdp));
                $userExist = $checkUser->rowCount();

                if($userExist > 0) {
                    $_USER = $checkUser->fetch();
                    $_SESSION['id'] = $_USER['id'];
                    $_SESSION['email'] = $_USER['email'];
                    $_SESSION["Logged"] = true;

                } else { $error = "Mauvais mot de passe ou adresse email"; }
            } else { $error = "Veuillez entrer une adresse email valide"; }
        } else { $error = "Tous les champs doivent être complétés"; }

        return $error;
    }

    function logout(){
            echo '<form class="deco" action="" method="post">
                <input class="deco" type="submit" name="deco" value="Déconnexion">
            </form>';

            if(isset($_POST["logout"])){
            $_SESSION["Logged"] = false;
            session_destroy();
            header("Location: index.php");
        }
    }

    function admin(){
        if($_SESSION && ( $_SESSION["admin"] == true )) {
            return false;
        } else {
            return true;
        }
    }
?>