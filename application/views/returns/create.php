<div class="col-lg-12">
    <h1 class="page-header">Create Return Slip</h1>
    
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
    
    <?php echo form_open('return_slip/create'); ?>  
    
    <div class="form-group">
    <label>Return NO</label>
    <input type="text" class="form-control" name="return_no" id="return_no"  value="<?php echo isset($return_no) ? $return_no : '' ?>"   readonly="readonly">
    <input type="hidden" name="employee_id" id="employee_id" />
    </div>
    <div class="form-group">
    <label>Return Date</label>
    <input type="date" id="" class="form-control" name="return_date" id="return_date" />
    </div>
    <div class="form-group">
        <label>Issue Number</label>
        <select class="form-control" name="issue_no" onchange="get_issue_items(this.value)">
            <option value="">Select Issue No</option>
            <?php foreach($issue_slip_lists as $issue): ?>
            <option value="<?php echo $issue->id;?>"><?php echo $issue->slip_no;?></option>
            <?php endforeach;?>
        </select>
    </div>
    
    <div class="form-group">
        <label>
           
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pick Employee</button>
        </label>
        <input type="text" class="form-control" name="emp_name" id="emp_name" value="" readonly="readonly" placeholder="Enter Employee Name" >

    </div>
    
    <div class="form-group">
        <label>Items Details</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th style="width:235">Item Name</th>
                        <th style="width:255">Item Code</th>
                        <th style="width: 100px">Batch No</th>
                        <th>Issue. Qty</th>
                        <th>Return. Qty</th>
                        <th>Rate</th>
                        
                        <th>Action</th>
                  
                    </tr>
                    
                </thead>
                <tbody id="item_details">
                    
                </tbody>
            </table>
        
    </div>
    

    <button type="submit"  name="create_issue" class="btn btn-primary">Create</button>
    <?php form_close();?>


</div>

<!-- Vendor Lists -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Employee Lists</h4>
      </div>
      <div class="modal-body">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <td>S.No</td>
                  <td>Employee Name</td>
                  <td>Contact No</td>
                  <td>Email</td>
                  
              </tr>
              
              </thead>
              <?php if ( !empty($employee_lists) ): ?>
              <tbody>
                <?php $sn = 0;foreach($employee_lists as $key=>$val): ?>
                  <tr  style="cursor:pointer" onclick='select_employee("<?php echo $val->id ?>","<?php echo $val->name ?>")'>
                  <td>  <?= ++$sn;?></td>
                  <td><?= ucfirst($val->name) ?></td>
                  <td><?= ucfirst($val->phone_no) ?></td>
                  <td><?= $val->email ?></td>
                  
                  
              </tr>
              <?php endforeach;?>
              </tbody>
              <?php endif;?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        
      </div>
    </div>

  </div>
</div>

<!-- Item Lists -->
<div id="item_lists" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Item Lists</h4>
      </div>
      <div class="modal-body">
          <table class="table table-borderd">
              <thead>
                <tr>
                      <td><strong>S.No</strong></td>
                      <td><strong>Item Name</strong></td>
                      <td><strong>Item Code</strong></td>
                      <td><strong>Batch No</strong></td>
                      <td><strong>Stock</strong></td>
                      
                </tr>
              
              </thead>
              <?php if ( !empty($item_lists) ): ?>
              <tbody>
                <?php $sn = 0;foreach($item_lists as $key=>$item):  ?>
                  <tr  style="cursor:pointer" onclick='select_issue_item("<?php echo $item->id ?>","<?php echo $item->itemName ?>","<?php echo $item->ItemCode?>","<?php echo $item->batch_no?>")'>
                  <td>  <?= ++$sn;?></td>
                  <td><?= ucfirst($item->itemName) ?></td>
                  <td><?= $item->ItemCode ?></td>
                  <td><?= $item->batch_no?></td>
                  <td><?= $item->stock ?></td>
                  
                  
                  
              </tr>
              <?php endforeach;?>
              </tbody>
              <?php endif;?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        
      </div>
    </div>

  </div>
</div>

