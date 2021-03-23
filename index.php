<?php

$db = new PDO("mysql:host=localhost;dbname=yannmartin_covid;", "229066", "yann1234");

if(isset($_POST["form_login"])) {
    $reqUser = $db->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $reqUser->execute(array($_POST["email"], $_POST["password"]));
    $countUser = $reqUser->rowCount();

    if($countUser > 0) {
        $user = $reqUser->fetch();
        echo "ok";
    }
}

?>
<html>  
<head>
    <title>Connexion</title>

    <form method="POST">
    <input type="text" name="email" />
    <input type="password" name="password" />
    <input type="submit" name="form_login" />
    </form>
</head>
<body>
</body>
</html>