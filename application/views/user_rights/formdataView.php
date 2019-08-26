<div class="col-lg-12">
    <h2>Form Data Details</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p><a href="<?php echo base_url() . 'userform/add_form' ?>">Add New Form Data</a></p>
        </div>
        <div class="panel-body">

            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>

                        <th>Sr. No</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Form Name</th>
                        <th>Form Url</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($records as $r) {
                        $delUrl = base_url() . "index.php/stud/delete/" . $r->id;
                        $editUrl = base_url() . "index.php/stud/edit/" . $r->id;

                        $showStatus = array("1" => 'Active', "0" => 'InActive');
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $r->catID; ?></td>
                             <td><?php echo $r->subCatID; ?></td>
                            <td><?php echo $r->formName; ?></td>
                            <td><?php echo $r->formUrl; ?></td>
                             <td><?php echo $showStatus[$r->status]; ?></td>
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
