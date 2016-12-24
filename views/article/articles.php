<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 06/12/2016
 * Time: 03:33
 */
?>
<div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titre</th>
                <th>abstract</th>
                <th>category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $article) {
                ?>
                <tr>
                    <td><?php echo $article->getTitle(); ?></td>
                    <td><?php echo $article->getAbstract(); ?></td>
                    <td><?php echo $article->getCategory(); ?></td>
                    <td>
                        <a href="<?php echo WEBROOT . "article/updatearticle/" . $article->getId(); ?>"
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



