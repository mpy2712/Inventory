<div class="col-lg-12">
    <h1 class="page-header">Items </h1>

    <?php echo form_open('itembasket/itemBasketAdd',['id'=>'item_master']); ?>  

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
    <div class="form-group">
        <label>Batch Item</label>
        <label class="radio-inline">
            <input type="radio" name="batchItem" id="batchItem" value="Y" checked="">Yes
        </label>
        <label class="radio-inline">
            <input type="radio" name="batchItem" id="batchItem" value="N">No
        </label>
       
    </div>

    <button type="submit" id="addItem" class="btn btn-primary">Add Item</button>
    <?php echo form_close(); ?>


</div>