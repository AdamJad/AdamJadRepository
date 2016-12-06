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
        <?php print_r($data) ?>
        <h2>Login to your account</h2>
        <form method="post" name="fromm" action="">
            <input type="text" placeholder="Username" name="username"/>
            <input type="password" placeholder="Password" name="password"/>
            <button name="submit"> Login</button>
        </form>
    </div>

    <div class="form">
        <h2>Create an account</h2>
        <form>
            <input type="text" placeholder="Username"/>
            <input type="password" placeholder="Password"/>
            <input type="email" placeholder="Email Address"/>
            <input type="tel" placeholder="Phone Number"/>
            <input type="submit" value="login" name="submit"/>
            <button>Register</button>
        </form>
    </div>

    <div class="cta"><a href="xxxxxxx">Forgot your password?</a></div>
</div>

</body>
</html>