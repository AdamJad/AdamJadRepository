<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 06/12/2016
 * Time: 05:21
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?> </title>
    <link rel="stylesheet" href=<?php echo WEBROOT . "web/css/authenticate.css" ?>>


</head>

<body>

<div class="pen-title"></div>
<div class="module form-module">
    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    </div>

    <div class="form">
        <?php echo $data["MessageError"] ?>
        <h2>Connectez-vous</h2>
        <form method="post" name="fromm" action="<?php echo WEBROOT . "user/authenticate" ?>">
            <input type="text" placeholder="Utilisateur" name="username"/>
            <input type="password" placeholder="Mot de passe" name="password"/>
            <button name="submit"> Connexion</button>
        </form>
    </div>
    <div class="cta"></div>
</div>

</body>
</html>