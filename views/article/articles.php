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
            if (!empty($data)) {
                foreach ($data as $article) {
                    ?>
                    <tr>
                        <td><?php echo $article["title"]; ?></td>
                        <td><?php echo substr(preg_replace('/<[^>]*>/', ' ', $article["abstract"]), 0, 50) . "..."; ?></td>
                        <td><?php echo $article["description"]; ?></td>
                        <td>
                            <a href="<?php echo WEBROOT . "article/updatearticle/" . $article["id"]; ?>"
                               class="span6 btn btn-success btn-xs">modifier</a>
                            <a href="<?php echo WEBROOT . "article/deletearticle/" . $article["id"]; ?>"
                               class="span6 btn btn-danger btn-xs">supprimer</a>
                        </td>
                    </tr>
                    <?php
                }

            }
            ?>

            </tbody>
        </table>
    </div>
</div>



