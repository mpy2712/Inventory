<div class="col-lg-12">
    <h1 class="page-header">Category </h1>

    <?php echo form_open('category/categoryAdd'); ?>          
    <div class="form-group">
        <label>Category Name</label>
        <input class="form-control" name="catName" id="catName" placeholder="Category Name">

    </div>
    <div class="form-group">
        <label>Category Code</label>
        <input class="form-control" name="catCode" id="catCode" placeholder="Category Name">
    </div>

    <button type="submit" id="addCategory" class="btn btn-primary">Add Category</button>
    <?php echo form_close(); ?>


</div>