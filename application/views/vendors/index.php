
    <div class="col-lg-12">
        <h2>Vendor Lists</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'vendors/create' ?>">Create Vendors</a></p>
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


                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th>
                            <th>Vendor Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>                            
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($vendor_lists as $vendor) {?>

                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo $vendor->name; ?></td>
                                <td><?php echo $vendor->email; ?></td>
                                <td><?php echo $vendor->phone_no; ?></td>
                                <td><?php echo $vendor->address; ?></td>
                               <td><?php echo date('Y-m-d',strtotime($vendor->created_date)); ?></td>
                               <td><?php echo date('Y-m-d',strtotime($vendor->updated_date)); ?></td>
                               
                                <td class="center">
                                    <a href ="<?php echo base_url('/vendors/edit/'.$vendor->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    
                                </td>
                                <td><a href ="<?php echo base_url('/vendors/delete/'.$vendor->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
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
    