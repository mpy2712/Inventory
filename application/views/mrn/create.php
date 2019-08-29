<div class="col-lg-12">
    <h1 class="page-header">Create MRN</h1>
    
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
    
    <?php echo form_open('mrn/create'); ?>  
    
    <div class="form-group">
    <label>MRN NO</label>
    <input type="text" class="form-control" name="mrn_no" id="mrn_no"  value="<?php echo isset($mrn_no) ? $mrn_no : '' ?>"   readonly="readonly">
    <input type="hidden" name="vendor_id" id="vendor_id" />
    </div>
    <div class="form-group">
    <label>MRN Date</label>
    <input type="date" id="mrn_date_picke" class="form-control datepicker" name="mrn_date" id="mrn_date" />
    </div>
    
    <div class="form-group">
        <label>
           
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pick Vendor</button>
        </label>
        <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="<?php echo isset($old_data) ? $old_data['vendor_name'] : '' ?>" readonly="readonly" placeholder="Enter vendor name" >

    </div>
    
    <div class="form-group">
        <label><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#item_lists">Pick Items</button></label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>S.No</td>
                        <td>Item Name</td>
                        <td>Item Code</td>
                        <td>Batch No</td>
                        <td>Req. Qty</td>
                        <td>Rec. Qty</td>
                        <td>Action</td>
                        
                  
                    </tr>
                    
                </thead>
                <tbody id="item_details">
                    
                </tbody>
            </table>
        
    </div>
    

    <button type="submit"  name="create_mrn" class="btn btn-primary">Create</button>
    <?php form_close();?>


</div>

<!-- Vendor Lists -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Vendor Lists</h4>
      </div>
      <div class="modal-body">
          <table class="table table-striped">
              <thead>
                  <tr>
                  <td>S.No</td>
                  <td>Vendor Name</td>
                  <td>Contact No</td>
                  <td>Email</td>
                  
              </tr>
              
              </thead>
              <?php if ( !empty($vendor_lists) ): ?>
              <tbody>
                <?php $sn = 0;foreach($vendor_lists as $key=>$val): ?>
                  <tr  style="cursor:pointer" onclick='select_vendor("<?php echo $val->id ?>","<?php echo $val->name ?>")'>
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
                  <tr  style="cursor:pointer" onclick='select_item("<?php echo $item->id ?>","<?php echo $item->itemName ?>","<?php echo $item->ItemCode?>","<?php echo $item->batch_no?>")'>
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

