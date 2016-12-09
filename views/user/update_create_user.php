<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 08/12/2016
 * Time: 06:18
 */
?>
<?php
$url = WEBROOT . "user/";
if (!empty($data)) {
    $user = $data;
    $url .= "updateUserAction";
} else {
    $user = new User();
    $url .= "addUserAction";
}
?>
<div class="col-lg-12">
    <form method="post" action="<?php echo $url ?>">
        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
        <div class="form-group">
            <label for="inputFirstName">Prénom</label>
            <input type="text" class="form-control" id="inputFirstName"
                   name="firstName"
                   value="<?php echo $user->getFirstName(); ?>"
                   placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="inputLastName">Nom</label>
            <input type="text" class="form-control" id="inputLastName"
                   name="lastName"
                   value="<?php echo $user->getLastName(); ?>"
                   placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="inputUserName">Utlisateur</label>
            <input type="text" class="form-control" id="inputUserName"
                   name="userName"
                   value="<?php echo $user->getUsername(); ?>"
                   placeholder="Nom d'utlisateur">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail"
                   name="email"
                   value="<?php echo $user->getEmail() ?>"
                   placeholder="Email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword"
                   name="password"
                   placeholder="Password">
        </div>
        <div class="form-group">
            <label for="selectRole">Role</label>

            <select class="form-control" id="selectRole" name="role">
                <?php
                foreach (User::arrayRole() as $key => $value) {
                    if ($value == $user->getRole()) {
                        ?>
                        <option value="<?php echo $value ?>" selected><?php echo $key ?></option>
                        <?php
                    }
                    ?>
                    <option value="<?php echo $value ?>"><?php echo $key ?></option>
                    <?php
                }
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>