
    <div class="col-lg-12">
        <h2>Sub Category Details</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                 <p><a href="<?php echo base_url() . 'subcategory/add_subcategory_view' ?>">Add New Sub Category</a></p>
           </div>
            <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                       
                            <th>Sr. No</th>
                            <th>Sub Category Name</th>
                            <th>Sub Category Code</th>
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
                                <td><?php echo $r->subCatName; ?></td>
                                <td><?php echo $r->subCatCode; ?></td>
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
    