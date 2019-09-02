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
        <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/morrisjs/morris.css" /> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/datatables/css/jquery.dataTables.min.css" />
 
        <style>
            .invalid-feedback {
    display: none;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
        </style>
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
                                    <a href="<?php echo base_url() . 'module/module_view' ?>">Module</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'submodule/subModuleView' ?>">Sub Module</a>
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
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Transactions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <a href="../../config/routes.php"></a>
                                <li>
                                <a href="<?php echo base_url() . 'mrn' ?>">MRN</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'issue' ?>">Issue Slip</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'return_slip' ?>">Return Slip</a>
                                </li>
                                
                                
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Masters <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'vendors/' ?>">Vendor Master</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'employee/' ?>">Employee Master</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'openingStock/openingStockView' ?>">Opening Stock</a>
                                </li>
                                <li>
                                <a href="<?php echo base_url() . 'itemBasket/itemBasketView' ?>">Item Creation</a>
                                </li>
                                <li>
                                
                                <a href="<?php echo base_url() . 'users/lists' ?>">Users</a>
                                </li>
                                
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- /.nav-second-level -->

                          <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() . 'reports/stockLedgerSearch' ?>">Stock Ledger</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'reports/stockSummarySearch' ?>">Stock Summary</a>
                                </li>
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- /.nav-second-level -->
                       
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
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.js"></script>

<script src="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/raphael/raphael.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>vendor/morrisjs/morris.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>data/morris-data.js"></script> -->
<script src="<?php echo base_url(); ?>dist/js/sb-admin-2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tree/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tree/jquery_003.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tree/demo.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>-->


<!-- <script src="<?php echo base_url(); ?>assets/js/form-validation.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script> -->



<script>
 $(document).ready(function() {
        $('.all_add').click(function(){
            var id=this.id.split("_"); 
            if($('#'+this.id).attr('checked')==true)
             {                 
              $('.add_permission_'+id[1]).attr('checked',true);
             }
            else  if($('#'+this.id).attr('checked')==false)
             {
                $('.add_permission_'+id[1]).removeAttr('checked');
             }
        });
        
        
        $('.all_edit').click(function(){
            var id1=this.id.split("_");
         if($("#alledit_"+id1[1]).attr('checked')==true)
             { 
              $('.edit_permission_'+id1[1]).attr('checked',true);
             }
            else if($("#alledit_"+id1[1]).attr('checked')==false)
             {
                $('.edit_permission_'+id1[1]).removeAttr('checked');
             }
        });
        
         $('.all_delete').click(function(){
            var id2=this.id.split("_");
         if($("#alldelete_"+id2[1]).attr('checked')==true)
             { 
              $('.delete_permission_'+id2[1]).attr('checked',true);
             }
            else if($("#alldelete_"+id2[1]).attr('checked')==false)
             {
                $('.delete_permission_'+id2[1]).removeAttr('checked');
             }
        });
      
      
       $('.all_view').click(function(){
            var id3=this.id.split("_");
         if($("#allview_"+id3[1]).attr('checked')==true)
             { 
              $('.view_permission_'+id3[1]).attr('checked',true);
             }
            else if($("#allview_"+id3[1]).attr('checked')==false)
             {
                $('.view_permission_'+id3[1]).removeAttr('checked');
             }
        });
        
         $('.all_approve').click(function(){
            var id4=this.id.split("_");
            
         if($("#allapproval_"+id4[1]).attr('checked')==true)
             { 
              $('.approval_permission_'+id4[1]).attr('checked',true);
             }
            else if($("#allapproval_"+id4[1]).attr('checked')==false)
             {
                $('.approval_permission_'+id4[1]).removeAttr('checked');
             }
        });
        
        
        $('.all_cancel').click(function(){
            var id4=this.id.split("_");
         if($("#allcancel_"+id4[1]).attr('checked')==true)
             { 
              $('.cancel_permission_'+id4[1]).attr('checked',true);
             }
            else if($("#allcancel_"+id4[1]).attr('checked')==false)
             {
                $('.cancel_permission_'+id4[1]).removeAttr('checked');
             }
        });
        
        
      $('input[name="role_form[]"]').click(function(){
          var frm_id=this.id.split("_");
          if($('#'+this.id).attr('checked')==true)
              {
                 
                   $('#add_permission_'+frm_id[2]).attr('checked','true');
                   $('#edit_permission_'+frm_id[2]).attr('checked','true');
                   $('#delete_permission_'+frm_id[2]).attr('checked','true');
                   $('#view_permission_'+frm_id[2]).attr('checked','true');
                   $('#approval_permission_'+frm_id[2]).attr('checked','true');
                   $('#cancel_permission_'+frm_id[2]).attr('checked','true');
              }
              else
                  {
                   $('#add_permission_'+frm_id[2]).removeAttr('checked');
                   $('#edit_permission_'+frm_id[2]).removeAttr('checked');
                   $('#delete_permission_'+frm_id[2]).removeAttr('checked');
                   $('#view_permission_'+frm_id[2]).removeAttr('checked');
                   $('#approval_permission_'+frm_id[2]).removeAttr('checked');
                   $('#cancel_permission_'+frm_id[2]).removeAttr('checked');
                  }
      });
      
      $('.module_cat_checked').click(function(){
        $(this).parent().parent().siblings('li').find("input[type='checkbox']").attr('checked', this.checked);
        });
      $('.full_module').click(function(){
         $(this).parent().siblings('ul').find("input[type='checkbox']").attr('checked', this.checked);
      });
   });
</script>


</body>
</html>