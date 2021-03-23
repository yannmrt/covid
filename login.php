<?php

// On inclus les elements requis par la page
require_once("db.php");
require_once("function.php");

// On lance la fonction lorsque le formulaire est lancé
if(isset($_POST["form_login"])) {
    loginUser($_POST["email"], $_POST["mdp"], $sql);
}

?>
<html>  
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form method="POST">
    <input type="text" name="email" />
    <input type="password" name="mdp" />
    <input type="submit" name="form_login" />
    </form>
</body>
</html>