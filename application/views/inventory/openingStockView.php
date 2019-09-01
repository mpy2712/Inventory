
    <div class="col-lg-12">
        <h2>Opening Stock Details</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'openingstock/add_openingStock_view' ?>">Add Opening Stock</a></p>
           </div>
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th>   
                            <th>OP Number</th>                         
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; 
                        foreach ($records as $r) {
                            $delUrl = base_url() . "subcategory/stud/delete/" . $r->id;
                            $editUrl = base_url() . "subcategory/stud/edit/" . $r->id;
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $r->openingNumber; ?></td>
                                <td><?php echo $r->itemName; ?></td>
                                <td><?php echo $r->ItemCode; ?></td>
                                <td><?php echo $r->qty; ?></td>
                                <td><?php echo date('Y-m-d',$r->openingDate); ?></td>
                                <td class="center"><a href ="<?php echo $editUrl; ?> ">Edit</a></td>
                                <td class="center"><a href ="<?php echo $delUrl; ?> ">Delete</a></td>
                            </tr>
                        <?php } ?>

                     </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    