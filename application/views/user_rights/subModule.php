<div class="col-lg-12">
    <h1 class="page-header">Sub Module </h1>

    <?php echo form_open('submodule/submoduleAdd'); ?>  

    <div class="form-group">
        <label>Module </label>
        <select class="form-control" name="catName" id="catName">
            <option>Select</option>
            <?php foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"><?php echo $r->moduleName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Sub Module Name</label>
        <input class="form-control" name="subcatName" id="subcatName" placeholder="Category Name">

    </div>
    <div class="form-group">
        <label>Sub Module Code</label>
        <input class="form-control" name="subcatCode" id="subcatCode" placeholder="Category Name">
    </div>

    <button type="submit" id="addCategory" class="btn btn-primary">Add SubCategory</button>
    <?php echo form_close(); ?>


</div>