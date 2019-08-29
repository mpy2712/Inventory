
    <div class="col-lg-12">
        <h2>Employee Lists</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'employee/create' ?>">Create Employee</a></p>
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


                <table width="100%" class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                       
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Created By</th>
                            
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($employee_lists as $emp) {?>

                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo $emp->name; ?></td>
                                <td><?php echo $emp->email; ?></td>
                                <td><?php echo $emp->phone_no; ?></td>
                                <td><?php echo $emp->address; ?></td>
                                <td><?php echo $emp->created_by_name; ?></td>
                                
                               <td><?php echo date('Y-m-d',strtotime($emp->created_date)); ?></td>
                               <td><?php echo date('Y-m-d',strtotime($emp->updated_date)); ?></td>
                               
                                <td class="center">
                                    <a href ="<?php echo base_url('/employee/edit/'.$emp->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    
                                </td>
                                <td><a href ="<?php echo base_url('/employee/delete/'.$emp->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
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
    