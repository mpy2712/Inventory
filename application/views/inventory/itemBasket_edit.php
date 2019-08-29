<div class="col-lg-12">
    <h1 class="page-header">Opening Stock </h1>
    
    <?php if ( $this->session->userdata("error") ) :?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?= $this->session->userdata('error');?>.
        </div>
    <?php endif;?>
    <?php echo form_open('itembasket/update_item/'.$item_info->id); ?>  
    
    <div class="form-group">
    <label>Item Name</label>
    <input type="text" class="form-control" name="item_name" id="itemName" value="<?= $item_info->itemName?>" >

    </div>
    <div class="form-group">
        <label>Item Code</label>
        <input type="text" class="form-control" name="item_code" id="itemCode" value="<?= $item_info->ItemCode ?>" placeholder="will be created randomly" >

    </div>
    <div class="form-group">
        <label>Item Desc</label>
        <input type="text" class="form-control" name="item_desc"  id="itemDesc" value="<?= $item_info->itemDesc?>">
    </div>

    <button type="submit" id="addItem" class="btn btn-primary">Update</button>
    <?php form_close();?>


</div>