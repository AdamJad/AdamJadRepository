<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 06/12/2016
 * Time: 04:41
 */
?>


<div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Utilisateur</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $user) {
                ?>
                <tr>
                    <td><?php echo $user->getFirstName() . " " . $user->getLastName(); ?></td>
                    <td><?php echo $user->getUserName(); ?></td>
                    <td><?php echo $user->displayRole(); ?></td>
                    <td>
                        <a href="<?php echo WEBROOT . "user/updateUser/" . $user->getId(); ?>"
                           class="span6 btn btn-success btn-xs">modifier</a>
                        <a href="#" class="span6 btn btn-danger btn-xs">supprimer</a>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>



