<div class="col-lg-12">
    <h1 class="page-header">Stock Summary </h1>

    <?php echo form_open('reports/stockSummarySearch'); ?>  
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label>Items </label>
        <select class="form-control" name="item" id="item">
            <option value ="">Select</option>
            <?php  
            $records = getItems();         
             foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"
                 <?php if($this->input->post('item')==$r->id) { ?>selected<?php } ?>><?php echo $r->itemName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>From Date</label>
        <?php if($this->input->post('frmDate')){ 
            $formDate=$this->input->post('frmDate'); 
        } else { 
            $formDate='';
        } 
        ?>
        <input class="form-control" value="<?php echo $formDate; ?>"  name="frmDate" id="frmDate" placeholder="m/d/Y" type="date">

    </div>
    <div class="form-group">
        <label>To Date</label>
        <?php if($this->input->post('toDate')){ 
            $toDate=$this->input->post('toDate'); 
        } else { 
            $toDate='';
        } 
        ?>
        <input class="form-control" value="<?php echo $toDate; ?>" name="toDate" id="toDate" placeholder="m/d/Y" type="date">

    </div>

    <button type="submit" id="search" class="btn btn-primary">Search</button>
    <?php echo form_close(); ?>



       
       
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th> 
                            <th>Transaction Type</th>
                            <th>Transaction No</th>
                            <th>In Qty</th>
                            <th>Out Qty</th>
                            <th>Stock</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                        if(!empty($stockSummary)){ 
                        $i = 1;
                        $itemFlag='';
                       
                        foreach ($stockSummary as $r) {    
                                                 
                           if($itemFlag!=$r->item_id) { $i=1; 
                            
                            ?>
                             <tr class="odd gradeX">
                                <td colspan="6" style="text-align:left"><strong><?php echo $r->itemName." => (  ". $r->ItemCode.")"; ?></strong></td>
                               </tr>
                           <?php $itemFlag=$r->item_id;  } ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo strtoupper($r->transaction_type);?> </td>
                                <td><?php echo $r->transaction_id;?></td>
                                <td><?php echo $r->stock_in; $stockIn[$r->item_id][]=$r->stock_in; ?></td>
                                <td><?php echo $r->stock_out; $stockout[$r->item_id][]=$r->stock_out; ?></td>
                                <td><?php echo (array_sum($stockIn[$r->item_id])-array_sum($stockout[$r->item_id])); ?></td>
                               </tr>
                              
                        <?php  } ?>
                        
                      <?php  } else{
                          ?>
                            <tr class="odd gradeX">
                             <td colspan="6" style="text-align:center">&nbsp;<b>No Records</b></td>
                          </tr>
                     <?php }
                        ?>

                     </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
           
      
    