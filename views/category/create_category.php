<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 23/12/2016
 * Time: 23:57
 */
?>

<div class="col-lg-12">
    <form method="post" action="<?php echo WEBROOT . "category/addcategoryaction"?>">
        <div class="form-group">
            <label for="inputCategory">Titre</label>
            <input type="text" class="form-control" id="inputCategory"
                   name="category"
                   placeholder="Categorie">
        </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
