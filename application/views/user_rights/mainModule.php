<div class="col-lg-12">
    <h1 class="page-header">Module </h1>

    <?php echo form_open('module/moduleAdd'); ?>          
    <div class="form-group">
        <label>Module Name</label>
        <input class="form-control" name="catName" id="catName" placeholder="Category Name">

    </div>
    <div class="form-group">
        <label>Module Code</label>
        <input class="form-control" name="catCode" id="catCode" placeholder="Category Name">
    </div>

    <button type="submit" id="addCategory" class="btn btn-primary">Add Module</button>
    <?php echo form_close(); ?>


</div>