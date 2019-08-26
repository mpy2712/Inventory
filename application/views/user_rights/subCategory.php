<div class="col-lg-12">
    <h1 class="page-header">Sub Category </h1>

    <?php echo form_open('subcategory/subcategoryAdd'); ?>  

    <div class="form-group">
        <label>Category </label>
        <select class="form-control" name="catName" id="catName">
            <option>Select</option>
            <?php foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"><?php echo $r->catName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Sub Category Name</label>
        <input class="form-control" name="subcatName" id="subcatName" placeholder="Category Name">

    </div>
    <div class="form-group">
        <label>Sub Category Code</label>
        <input class="form-control" name="subcatCode" id="subcatCode" placeholder="Category Name">
    </div>

    <button type="submit" id="addCategory" class="btn btn-primary">Add SubCategory</button>
    <?php echo form_close(); ?>


</div>