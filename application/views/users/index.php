
    <div class="col-lg-12">
        <h2>User Lists</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <a href="<?php echo base_url() . 'users/register' ?>"><button class="btn btn-primary">Create User</button></a>
                 
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>DOB</th>
<!--                            <th>Locked</th>
                            -->
                            <th>Fin Year</th>
                            <th>Updated Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($userLists as $user) {?>
                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo ucfirst($user->name); ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo date('M-d-Y', strtotime($user->dob)); ?></td>
<!--                                <td><?php echo $user->locked == 0 ? 'No' : 'Yes';   ?></td>-->
                                <td><?php echo $user->finYear; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($user->updated_date)); ?></td>
                               
                               
                                <td class="center">
                                    <a href ="<?php echo base_url('/users/edit/'.$user->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td><a href ="<?php echo base_url('/users/delete/'.$user->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
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
    