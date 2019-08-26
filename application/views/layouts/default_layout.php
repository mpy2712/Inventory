<?php
if ($this->session->userdata('is_authenticated') == FALSE) {
    redirect('users/login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inventory Management</title>

        <meta name="description" content="overview &amp; stats" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" />
         <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.css" />
         <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.css" />
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" class="theme-stylesheet" id="theme-style" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/morrisjs/morris.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables/css/jquery.dataTables.min.css" />
 
        
        <!-- page specific plugin styles -->
    </head>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Inventory Management System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>Welcome <?php echo $this->session->userdata['name']; ?></li>    


                <li><a href="<?php echo base_url() . 'Users/logout' ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>

                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User Rights<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'category/category_view' ?>">Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'subcategory/subCategoryView' ?>">Sub Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'userform/formView' ?>">User Forms</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url() . 'role/roleView' ?>">Role Creation & Assignment</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'openingStock/openingStockView' ?>">Opening Stock</a>
                                </li>
                                <li>
                                <a href="<?php echo base_url() . 'itemBasket/itemBasketView' ?>">Item Creation</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           
           
            <div class="row">                

                <?php echo $contents; ?> 

            </div>


        </div>

    </div>
   
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- basic scripts -->

<script type="text/javascript" src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.js"></script>




<script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>data/morris-data.js"></script>
<script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>




<script>
    
    jQuery(document).ready(function() {
        jQuery('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>