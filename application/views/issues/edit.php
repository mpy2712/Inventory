<div class="col-lg-12">
    <h1 class="page-header">Edit Issue Slip</h1>
    
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
    
    <?php echo form_open('issue/update/'.$issue->id); ?>  
    
    <div class="form-group">
    <label>Issue NO</label>
    <input type="text" class="form-control" name="issue_no" id="issue_no"  value="<?php echo isset($issue) ? $issue->slip_no : '' ?>"   readonly="readonly">
    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $issue->employee_id ?>"/>
    </div>
    <div class="form-group">
    <label>Issue Date</label>
    <input type="date"  class="form-control" name="issue_date" id="issue_date" value="<?php echo date("Y-m-d",$issue->issue_date) ?>"/>
    </div>
    
    <div class="form-group">
        <label>
           
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pick Employee</button>
        </label>
        <input type="text" class="form-control" name="emp_name" id="emp_name" value="<?php echo $issue->employee_name; ?>" readonly="readonly" placeholder="Enter Employee Name" >

    </div>
    
    <div class="form-group">
        <label><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#item_lists">Pick Items</button></label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th style="width:235">Item Name</th>
                        <th style="width:255">Item Code</th>
                        <th>Batch No</th>
                        <th>Issue. Qty</th>
                        <th>Issue Date</th>
                        <th>Action</th>
                </thead>
                <tbody id="item_details">
                    <?php if(!empty($item_details)): ?>
                    <?php $sn=0;$index=0; foreach($item_details as $item):?>
                    <tr>
                        <td><?= ++$sn ?></td>
                        <td><?= $item->itemName ?></td>
                        <td><?= $item->itemCode ?></td>
                        <td>   <input type="text" class="form-control" name="item[<?php echo $index ?>][batch_no]" value="<?= $item->batch_no ?>" /> </td>
                        <td>
                            <input type="text" class="form-control" name="item[<?php echo $index ?>][issue_qty]" value="<?= $item->issue_qty ?>"/> 
                            <input type="hidden" class="form-control" name="item[<?php echo $index ?>][item_id]" value="<?= $item->item_id ?>"/> 
                        </td>
                        <td><input type="date" class="form-control" name="item[<?php echo $index ?>][issue_date]" value="<?= date("Y-m-d",$item->issue_date) ?>"/> </td>
                        <td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>
                    </tr>
                    <?php $index++; endforeach;?>
                    <?php else:?>
                    <tr>
                        <td colspan="7">No Item Founds</td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        
    </div>
    

    <button type="submit"  name="create_issue" class="btn btn-primary">Update</button>
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

