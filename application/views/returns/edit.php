<div class="col-lg-12">
    <h1 class="page-header">Edit Return Slip</h1>
    
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
    
    <?php echo form_open('return_slip/update/'.$return->id); ?>  
    
    <div class="form-group">
    <label>Return NO</label>
    <input type="text" class="form-control" name="return_no" id="return_no"  value="<?php echo $return->return_no ?>"   readonly="readonly">
    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $return->employee_id ?>" />
    </div>
    <div class="form-group">
    <label>Return Date</label>
    <input type="date" id="" class="form-control" name="return_date" id="return_date" value="<?php echo date("Y-m-d",$return->return_date);?>" />
    </div>
    <div class="form-group">
        <label>Issue Number</label>
        <select class="form-control" name="issue_no" onchange="get_issue_items(this.value)">
            <option value="">Select Issue No</option>
            <?php foreach($issue_slip_lists as $issue): ?>
            <option value="<?php echo $issue->id;?>" <?php if($return->issue_slip_id == $issue->id){ echo "Selected"; } ?> ><?php echo $issue->slip_no;?></option>
            <?php endforeach;?>
        </select>
    </div>
    
    <div class="form-group">
        <label>
           
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pick Employee</button>
        </label>
        <input type="text" class="form-control" name="emp_name" id="emp_name" value="<?php echo $return->employee_name; ?>" readonly="readonly" placeholder="Enter Employee Name" >

    </div>
    
    <div class="form-group">
        <label>Items Details</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>S.No</td>
                        <td>Item Name</td>
                        <td>Item Code</td>
                        <td>Batch No</td>
                        <td>Issue. Qty</td>
                        <td>Return. Qty</td>
                        
                        <td>Date</td>
                        <td>Action</td>
                        
                  
                    </tr>
                    
                </thead>
                <tbody id="item_details">
                    <?php $sno = 0;foreach($item_details as $key=>$item): ?>
                    <tr>
                        <td><?= ++$sno; ?></td>
                        <td><?= $item->itemName ?></td>
                        <td><?= $item->itemCode ?></td>
                        <td><?= $item->batch_no ?></td>
                        <td>
                            <input type="text" class="form-control" name="item[<?php echo $sno ?>][issue_qty]" value="<?= $item->issue_qty ?>" readonly=""/>
                            <input type="hidden" name="item[<?php echo $sno ?>][item_id]" value="<?= $item->item_id ?>" />
                            
                        </td>
                        <td>
                            <input type="text" class="form-control" name="item[<?php echo $sno ?>][return_qty]" value="<?= $item->return_qty ?>" />
                        </td>
                        <td>
                            <input type="date" class="form-control" name="item[<?php echo $sno ?>][return_date]" value="<?= date("Y-m-d",$item->return_date); ?>" />
                        </td>
                        
                        <td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        
    </div>
    

    <button type="submit"  name="" class="btn btn-primary">Update</button>
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

