<div class="col-lg-12">
    <h1 class="page-header">Create Vendor </h1>
    
    <?php if ( $this->session->userdata("error") ) :?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?= $this->session->userdata('error');?>.
        </div>
    <?php endif;?>
    
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php } ?>
    
    <?php echo form_open('vendors/create'); ?>  
    
    <div class="form-group">
    <label>Vendor Name</label>
    <input type="text" class="form-control" name="vendor_name" id="itemName"  value="<?php echo isset($old_data) ? $old_data['vendor_name'] : '' ?>" placeholder="Enter Vendor Name" >

    </div>
    <div class="form-group">
        <label>Vendor Email</label>
        <input type="text" class="form-control" name="vendor_email" id="vendor_email" value="<?php echo isset($old_data) ? $old_data['vendor_email'] : '' ?>" placeholder="Enter Email" >

    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="number" class="form-control" name="phone_number"  id="phone_number" value="<?php echo isset($old_data) ? $old_data['phone_number'] : '' ?>" placeholder="Enter Phone Number">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="vendor_address" placeholder="Enter Address here"><?php echo isset($old_data) ? $old_data['vendor_address']: '' ?></textarea>
        
    </div>
    

    <button type="submit" id="addvendor" name="create_vendors" class="btn btn-primary">Create</button>
    <?php form_close();?>


</div>