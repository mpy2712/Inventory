<div class="col-lg-12">
    <h1 class="page-header">Opening Stock </h1>

    <?php echo form_open('itembasket/itemBasketAdd'); ?>  

    <div class="form-group">
    <label>Item Name</label>
        <input class="form-control" name="itemName" id="itemName" >

    </div>
    <div class="form-group">
        <label>Item Code</label>
        <input class="form-control" name="itemCode" id="itemCode" placeholder="will be created randomly">

    </div>
    <div class="form-group">
        <label>Item Desc</label>
        <input  class="form-control" name="itemDesc"  id="itemDesc" >
    </div>

    <button type="submit" id="addItem" class="btn btn-primary">Add Item</button>
    <?php echo form_close(); ?>


</div>