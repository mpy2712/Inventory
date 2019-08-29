<div class="col-lg-12">
    <h1 class="page-header">Edit <?php echo ucfirst($employee->name) ?> Employee </h1>
    
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
    
    <?php echo form_open('employee/update/'.$employee->id); ?>  
    
    <div class="form-group">
    <label>Employee Name</label>
    <input type="text" class="form-control" name="emp_name" id="emp_name"  value="<?php echo isset($employee) ? $employee->name : '' ?>" placeholder="Enter Employee Name" >

    </div>
    <div class="form-group">
        <label>Employee Email</label>
        <input type="text" class="form-control" name="emp_email" id="emp_email" value="<?php echo isset($employee) ? $employee->email : '' ?>" placeholder="Enter Email" >

    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="number" class="form-control" name="phone_number"  id="phone_number" value="<?php echo isset($employee) ? $employee->phone_no : '' ?>" placeholder="Enter Phone Number">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" name="emp_address" placeholder="Enter Address here"><?php echo isset($employee) ? $employee->address: '' ?></textarea>
        
    </div>
    

    <button type="submit" id="edit_employees" name="create_vendors" class="btn btn-primary">Update</button>
    <?php form_close();?>


</div>