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
        <h2>Login to your account</h2>
        <form method="post" name="fromm" action="<?php echo WEBROOT . "user/authenticate" ?>">
            <input type="text" placeholder="Username" name="username"/>
            <input type="password" placeholder="Password" name="password"/>
            <button name="submit"> Login</button>
        </form>
    </div>

    <div class="cta"><a href="">Forgot your password?</a></div>
</div>

</body>
</html>