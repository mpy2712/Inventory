<div class="col-lg-12">
    <h1 class="page-header">Edit MRN</h1>
    
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
    
    <?php echo form_open('mrn/update/'.$mrn->id); ?>  
    
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="mrn_no">MRN NO</label>
        <div class="col-sm-6">
            
    <input type="text" class="form-control" name="mrn_no" id="mrn_no"  value="<?php echo $mrn->mrn_no; ?>"   readonly="readonly">
    <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $mrn->vendor_id ?>"/>
        </div>
    </div>
    
   <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="mrn_date">MRN Date</label>
        <div class="col-sm-6">
    <input type="date" id="mrn_date_picke" class="form-control datepicker" value="<?php echo date("Y-m-d",$mrn->mrn_date) ?>" name="mrn_date" id="mrn_date" />
        </div>
    </div> 
    
     <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="pick_vendor"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Pick Vendor</button></label>
        <div class="col-sm-6">
        <?php $vendor_info = get_vendor_info($mrn->vendor_id); ?>
        <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="<?php echo $vendor_info ? $vendor_info->name : ''  ?>" readonly="readonly" placeholder="Enter vendor name" >
</div>
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
                    <?php if (!empty($item_details)): ?>
                        <?php $i=0;$index = 0;foreach($item_details as $mrn_item):?>
                            <tr>
                                <td><?= ++$i; ?>
                                    <input type="hidden" name="item[item_id][]" value="<?php echo $mrn_item->item_id?>"/>
                                </td>
                                <td><?= $mrn_item->itemName ?></td>
                                <td><?= $mrn_item->itemCode ?></td>
                                <td><input type="text" class="form-control" name="item[batch_no][]" value="<?= $mrn_item->batch_no ?>"/> </td>
                                <td><input type="text" class="form-control" name="item[req_qty][]" value="<?= $mrn_item->required_qty ?>"/> </td>
                                <td><input type="text" class="form-control" name="item[rec_qty][]" value="<?= $mrn_item->received_qty ?>"/> </td>
                                <td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>
                                
                                
                            </tr>
                        <?php $index++; endforeach; ?>
                    <?php endif;?>
                </tbody>

            </table>
        
    </div>
    

    <button type="submit"  name="create_mrn" class="btn btn-primary">Update</button>
    <?php form_close();?>


</div>


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
                  <td><?= $item->batch_no ?></td>
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

