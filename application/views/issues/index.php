<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
    }
    
</style>
<div class="col-lg-12">
    <h2>Issue Slip Lists</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p><a href="<?php echo base_url() . 'issue/create' ?>" class="btn btn-primary" style="text-decoration: none">Create Issue Slip</a></p>
        </div>
        <div class="panel-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif;
            ;
            ?>
<?php if ($this->session->userdata("error")) : ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?= $this->session->userdata('error'); ?>.
                </div>
            <?php endif; ?>

                <?php if ($this->session->userdata("success")) : ?>
                <div class="alert alert-success">
                <?= $this->session->userdata('success'); ?>.
                </div>
<?php endif; ?>


            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                <thead>
                    <tr>

                        <th>Sr. No</th>
                        <th>Issue No</th>
                        <th>Employee Name</th>
                        <th>Slip Date</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Edit</th>
                        <th>Delete</th>


                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($issue_lists)): ?>
                        <?php
                        $i = 0;
                        foreach ($issue_lists as $issue) {
                            $disabled = false;
                            if ( $issue->has_return_slip != '' && (int) $issue->has_return_slip > 0 ){
                                $disabled = true;
                            }
                            ?>

                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>                                
                                <td><?php echo $issue->slip_no; ?></td>
                                <td><?php echo $issue->employee_name; ?></td>
                                <td><?php echo date('Y-m-d', $issue->issue_date); ?></td>
                                <td><?php echo $issue->created_by_user_name; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($issue->created_date)); ?></td>
                                <?php
                                 ?>

                                <td class="center">
                                    <a  class="<?= $disabled ? 'disabled' : ''  ?>"  href ="<?php echo base_url('/issue/edit/' . $issue->id) ?> " title='Edit'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td><a <?= $disabled ? 'disabled' : ''  ?>href ="<?php echo base_url('/issue/delete/' . $issue->id) ?> " title='Delete'><i class="fa fa-trash-o"></i></a></td>

                            </tr>
    <?php } ?>
<?php else: ?>
                        <tr>
                            <td colspan="8">No Record Found</td>
                        </tr>
<?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
