<div class="col-lg-12">
    <h1 class="page-header">Stock Ledger </h1>

    <?php echo form_open('reports/stockLedgerSearch'); ?>  

    <div class="form-group">
        <label>Items </label>
        <select class="form-control" name="item" id="item">
            <option>Select</option>
            <?php foreach ($records as $r) { ?>
                <option value="<?php echo $r->id; ?>"><?php echo $r->itemName; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>From Date</label>
        <input class="form-control" name="frmDate" id="frmDate" placeholder="m/d/Y" type="date">

    </div>
    <div class="form-group">
        <label>To Date</label>
        <input class="form-control" name="toDate" id="toDate" placeholder="m/d/Y" type="date">

    </div>

    <button type="submit" id="search" class="btn btn-primary">Search</button>
    <?php echo form_close(); ?>



       
       
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th> 
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>In Qty</th>
                            <th>Out Qty</th>
                            <th> Stock</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                        if(!empty($stockLedger)){
                        $i = 1;
                        foreach ($stockLedger as $r) {
                           
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $r->ItemCode; ?></td>
                                <td><?php echo $r->itemName; ?></td>
                                <td><?php echo $r->stock_in; $stockIn[$r->item_id][]=$r->stock_in; ?></td>
                                <td><?php echo $r->stock_out; $stockout[$r->item_id][]=$r->stock_out; ?></td>
                                <td><?php echo (array_sum($stockIn[$r->item_id])-array_sum($stockout[$r->item_id])); ?></td>
                               </tr>
                        <?php } ?>
                         <tr class="odd gradeX">
                             <td colspan="5" style="text-align:right">&nbsp;<b>Current Stock</b></td>
                         <td ><b><?php echo (array_sum($stockIn[$r->item_id])-array_sum($stockout[$r->item_id])); ?></b></td>
                        </tr>
                      <?php  }
                        ?>

                     </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
           
      
    