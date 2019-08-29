
    <div class="col-lg-12">
        <h2>Item Creation Details</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'itembasket/add_itemBasket_view' ?>">Add Item</a></p>
           </div>
            <div class="panel-body">
            <?php if (validation_errors()) : ?>
    <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
    </div>
<?php endif;;?>
<?php if ( $this->session->userdata("error") ) :?>
    <div class="alert alert-warning">
        <strong>Warning!</strong> <?= $this->session->userdata('error');?>.
    </div>
<?php endif;?>

<?php if ( $this->session->userdata("success") ) :?>
    <div class="alert alert-success">
        <?= $this->session->userdata('success');?>.
    </div>
<?php endif;?>


                <table width="100%" class="table table-striped table-bordered table-hover" id="item_list_reports">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th>                            
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Creation Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($records as $r) {
                            $delUrl = base_url() . "itemBasket/delete/" . $r->id;
                            $editUrl = base_url() . "itemBasket/edit_item_basket/" . $r->id;
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>                                
                                <td><?php echo $r->itemName; ?></td>
                                <td><?php echo $r->ItemCode; ?></td>
                                <td><?php echo date('Y-m-d',$r->creationDate); ?></td>
                                <td class="center">
                                    <a href ="<?php echo $editUrl; ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    
                                </td>
                                <td><a href ="<?php echo $delUrl; ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
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
    