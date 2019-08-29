
    <div class="col-lg-12">
        <h2>MRN Lists</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'mrn/create' ?>">Create MRN</a></p>
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
                            <th>MRN No</th>
                            <th>Vendor</th>
                            <th>Recieved_date</th>
                            <th>Creatd By</th>
                            <th>Created Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($mrn_lists as $mrn) {?>

                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo $mrn->mrn_no; ?></td>
                                <td><?php echo $mrn->vendor_name; ?></td>
                                <td><?php echo date('Y-m-d',$mrn->mrn_date); ?></td>
                                <td><?php echo $mrn->created_by_user_name; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($mrn->created_date)); ?></td>
                               
                               
                                <td class="center">
                                    <a href ="<?php echo base_url('/mrn/edit/'.$mrn->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td><a href ="<?php echo base_url('/mrn/delete/'.$mrn->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>
                                
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
    