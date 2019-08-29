    <div class="col-lg-12">
        <h2>Modules Details</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p><a href="<?php echo base_url() . 'module/add_module_view' ?>">Add New Module</a></p>
            </div>
            <div class="panel-body">
              
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Module Name</th>
                                <th>Module Code</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($records as $r) {
                                $delUrl = base_url() . "index.php/stud/delete/" . $r->id;
                                $editUrl = base_url() . "index.php/stud/edit/" . $r->id;
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $r->moduleName; ?></td>
                                    <td><?php echo $r->moduleCode; ?></td>
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
  
