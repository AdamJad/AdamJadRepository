<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 12/12/2016
 * Time: 12:13
 */
?>

<div class="col-lg-12">
    <form method="post" action="<?php echo WEBROOT . "article/updatearticleaction" ?>">
        <input type="hidden" name="id" value="<?php echo $data["article"]->getId(); ?>">
        <div class="form-group">
            <label for="inputTitle">Titre</label>
            <input type="text" class="form-control" id="inputTitle"
                   name="title"
                   value="<?php echo $data["article"]->getTitle(); ?>"
                   placeholder="Titre">
        </div>
        <div class="form-group">
            <label for="inputAbstract">Abstract</label>
            <textarea class="form-control" id="inputAbstract"
                      name="abstract"

                      placeholder="Abstract">
                <?php echo $data["article"]->getAbstract(); ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="inputContent">Contenu</label>
            <textarea class="form-control" id="inputContent"
                      name="content"
                      placeholder="Contenu">
                <?php echo $data["article"]->getContent(); ?>
            </textarea>
        </div>

        <div class="form-group">
            <label for="selectCategory">Categorie</label>

            <select class="form-control" id="selectCategory" name="category">
                <?php
                foreach ($data["categories"] as $category) {
                    if ($category->getId() == $data["article"]->getCategory()) {
                        ?>
                        <option value="<?php echo $category->getId() ?>"
                                selected><?php echo $category->getDescription() ?></option>
                        <?php
                    } else {
                        ?>
                        <option
                            value="<?php echo $category->getId() ?>"><?php echo $category->getDescription() ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
