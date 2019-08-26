    <div class="col-lg-12">
        <h2>Category Details</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p><a href="<?php echo base_url() . 'category/add_category_view' ?>">Add New Category</a></p>
            </div>
            <div class="panel-body">
              
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Category Name</th>
                                <th>Category Code</th>
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
                                    <td><?php echo $r->catName; ?></td>
                                    <td><?php echo $r->catCode; ?></td>
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
  
