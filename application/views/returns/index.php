
    <div class="col-lg-12">
        <h2>Return Slip Lists</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'return_slip/create' ?>">Create Return Slip</a></p>
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
                       
                            <th>Sr. No</th>
                            <th>Return No</th>
                            <th>Employee Name</th>
                            <th>Issue Slip No</th>
                            <th>Return Date</th>
                            
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($resturn_lists)): ?>
                        <?php
                        $i = 0;
                        foreach ($resturn_lists as $return) { ?>

                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo $return->return_no; ?></td>
                                <td><?php echo $return->employee_name; ?></td>
                                <td><?php echo $return->issue_slip_no; ?></td>
                                
                                <td><?php echo date('Y-m-d',$return->return_date); ?></td>
                                <td><?php echo $return->created_by_user_name; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($return->created_date)); ?></td>
                               
                               
                                <td class="center">
                                    <a href ="<?php echo base_url('/return_slip/edit/'.$return->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td><a href ="<?php echo base_url('/return_slip/delete/'.$return->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
                            </tr>
                        <?php } ?>
                        <?php else:?>
                            <tr>
                                <td colspan="8">No Record Found</td>
                            </tr>
                        <?php endif;?>
                     </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    