<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 12/12/2016
 * Time: 12:13
 */
?>
<div class="col-lg-12">
    <form method="post" action="">
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <label for="inputTitle">Titre</label>
            <input type="text" class="form-control" id="inputTitle"
                   name="title"
                   value=""
                   placeholder="Titre">
        </div>
        <div class="form-group">
            <label for="inputAbstract">Abstract</label>
            <textarea type="text" class="form-control" id="inputAbstract"
                      name="abstract"
                      value=""
                      placeholder="Abstract"></textarea>
        </div>

        <div class="form-group">
            <label for="selectCategory">Role</label>

            <select class="form-control" id="selectCategory" name="category">
                <?php
                foreach ($data["categories"] as $category) { ?>

                    <option value="<?php echo $category->getId() ?>"><?php echo $category->getDescription() ?></option>
                    <?php
                }
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
