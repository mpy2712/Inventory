<style type="text/css">


/* Hide footnote and breadcrumb stuff for screen. See print.css for the code that displays these. */
#ku_breadcrumbs, sup.footnote_tag, #footnote_wrapper {
	display: none;
}



/***** Tabbox ****/

/**
 * Tabbed widget
 */
.tabbox > .nav {
    list-style-type: none;
    margin: 0 0 -1px 0;
    padding-left: 0;
}

.tabbox > .nav li {
    background-color: #ebebeb;
    border: 1px solid #ccc;
    display:inline-block;
    height: 30px;
    line-height: 30px;
    margin: 0;
    margin-left: -6px;
    padding-bottom: 0;
    padding-left: 0;
    padding-top: 0;
    text-indent: 0;
}

.tabbox.tabbox-rounded > .nav li {
    border-radius: 10px 10px 0 0;
}

.tabbox > .nav li.active {
    border-bottom: 1px solid #fff;
    background-color: #ffffff;
}

.tabbox > .nav li:first-child {
    margin-left: 0;
}

.tabbox > .nav li a {
    display: block;
    height: 100%;
    padding: 0 10px;
    text-decoration: none;
	font-size:13px;
	padding-top:5px;
}

.tabbox.tabbox-rounded > .nav li a {
    border-radius: 10px 10px 0 0;
}

.tabbox > .nav li.active a {
    background-color: #fff;
    color: #e8000d;
}

.tabbox > .content {
    background: #fff;
    border: 1px solid #ccc;
    padding: 10px;
}

.tabbox > .content > .tab {
    height: 0;
    visibility: hidden;
    width: 0;
    display: none;
}

.tabbox > .content > .active {
    display: block;
}

.tabbox > .content > .tab.active {
    height: auto;
    visibility: visible;
    width: auto;
}

#region-sidebar-first .tabbox > .nav li {
    background: #fff;
    border: 1px solid #fff;
    border-width: 1px 1px 0 1px;
    margin-left: -5px;
}

#region-sidebar-first .tabbox > .nav li:first-child {
    margin-left: 5px;
}

#region-sidebar-first .tabbox > .nav li.active {
    border: 1px solid #ccc;
    border-bottom: 1px solid #fff;
}

#region-sidebar-first .tabbox > .content {
    border: 0;
    border-top: 1px solid #ccc;
}

/***** Accordions ****/
.accordion {
    cursor: pointer;
    font-family: Georgia, Times, "Times New Roman", serif;
    margin: 10px 0;
    font-size: 14px;
    font-weight: bold;
    padding-left: 12px;
    background: transparent url(../images/accordion-closed.gif) no-repeat center left;
    color: #0022B4;
}

.active_accordion {
    background: transparent url(../images/accordion-open.gif) no-repeat center left;
}

.accordion_content {
    padding: 0 0 10px 32px;
}


/*--For Tree Structure--*/
.treeview, .treeview ul { 
	padding: 0;
	margin: 0;
	list-style: none;
}

.treeview ul {
	background-color: white;
	margin-top: 4px;
}

.treeview .hitarea {
	background: url(images/treeview-default.gif) -64px -25px no-repeat;
	height: 16px;
	width: 16px;
	margin-left: -16px;
	float: left;
	cursor: pointer;
}
/* fix for IE6 */
* html .hitarea {
	display: inline;
	float:none;
}

.treeview li { 
	margin: 0;
	padding: 3px 0pt 3px 16px;
}

.treeview a.selected {
	background-color: #eee;
}

.treecontrol { margin: 1em 0; display: none; }

.treeview .hover { color: red; cursor: pointer; }

.treeview li { background: url(images/treeview-default-line.gif) 0 0 no-repeat; }
.treeview li.collapsable, .treeview li.expandable { background-position: 0 -176px; }

.treeview .expandable-hitarea { background-position: -80px -3px; }

.treeview li.last { background-position: 0 -1766px }
.treeview li.lastCollapsable, .treeview li.lastExpandable { background-image: url(images/treeview-default.gif); }  
.treeview li.lastCollapsable { background-position: 0 -111px }
.treeview li.lastExpandable { background-position: -32px -67px }

.treeview div.lastCollapsable-hitarea, .treeview div.lastExpandable-hitarea { background-position: 0; }

.treeview-red li { background-image: url(images/treeview-red-line.gif); }
.treeview-red .hitarea, .treeview-red li.lastCollapsable, .treeview-red li.lastExpandable { background-image:url(images/login/treeview-red.gif); } 

.treeview-black li { background-image: url(images/treeview-black-line.gif); }
.treeview-black .hitarea, .treeview-black li.lastCollapsable, .treeview-black li.lastExpandable { background-image: url(images/treeview-black.gif); }  

.treeview-gray li { background-image: url(images/treeview-gray-line.gif); }
.treeview-gray .hitarea, .treeview-gray li.lastCollapsable, .treeview-gray li.lastExpandable { background-image: url(images/treeview-gray.gif); } 

.treeview-famfamfam li { background-image: url(images/treeview-famfamfam-line.gif); }
.treeview-famfamfam .hitarea, .treeview-famfamfam li.lastCollapsable, .treeview-famfamfam li.lastExpandable { background-image: url(images/treeview-famfamfam.gif); } 


.filetree li { padding: 3px 0 2px 16px; }
.filetree span.folder, .filetree span.file { padding: 1px 0 1px 16px; display: block; }
.filetree span.folder { background: url(images/folder.gif) 0 0 no-repeat; }
.filetree li.expandable span.folder { background: url(images/folder-closed.gif) 0 0 no-repeat; }
.filetree span.file { background: url(images/file.gif) 0 0 no-repeat; }

.f13{font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;}
.f12{font-family:Arial, Helvetica, sans-serif; font-size:12px;}
</style>
<div class="col-lg-12">
    <h1 class="page-header">Role Creation </h1>
    <?php echo form_open('role/saveRoleData'); ?>  
    <div class="form-group">
        <label>Role Name </label>
        <input class="form-control" name="roleName" id="roleName" placeholder="Role Name">           
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="optionsRadios1" value="1" checked="">Active
            </label>
            <label>
                <input type="radio" name="status" id="optionsRadios2" value="0">InActive
            </label>
        </div>
    </div>
   
    <div class="container">  
        <ul class="nav nav-tabs">
        <?php $i=0; 
        foreach($module as $key=>$value){
            if($i==0){
                $className="active";
                }else{
                    $className="";
                    } 
                    ?>
     
            <li class="<?php echo $className; ?>">
                    <a href="#<?php echo $value['moduleName']; ?>" data-toggle="tab" class="<?php echo $className; ?>">
                    <?php echo $value['moduleName']; ?></a>
                </li>
                <?php $i++; } ?>
         </ul>
    
   

<div class="tab-content">
<?php $i=0; 
foreach($module as $key=>$value){ 
    if($i==0){
        $className="tab-pane fade active in";
        }else{
            $className="tab-pane fade";
            } ?>
    
        <div class="<?php echo $className; ?>" id="<?php echo $value['moduleName']; ?>">           
            <div align="center" style="margin-bottom:20px; width:500px; margin-left:330px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td width="50" align="left" valign="bottom" class="f12">
                    <input type="checkbox" id="alladd_<?php echo $value['id']; ?>"  class="all_add" /><i class="fa fa-plus-square" style="font-size:36px;"></i></td>
                    <td width="50" align="left" valign="bottom"> 
                    <input type="checkbox" id="alledit_<?php echo $value['id']; ?>" class="all_edit" /><i class="fa fa-edit" style="font-size:36px"></i></td>
                    <td width="55" align="left" valign="bottom"> 
                    <input type="checkbox" id="alldelete_<?php echo $value['id']; ?>"  class="all_delete" /><i class="fa fa-trash-o" style="font-size:36px"></i></td>
                    <td width="50" align="left" valign="bottom"> 
                    <input type="checkbox" id="allview_<?php echo $value['id']; ?>"  class="all_view" /><i class="fa fa-search-plus" style="font-size:36px"></i></td>
                    <td width="70" align="left" valign="bottom"> 
                    <input type="checkbox" id="allapproval_<?php echo $value['id']; ?>"  class="all_approve" /><i class="fa fa-check-square-o" style="font-size:36px;"></i></td>
                    <td align="left" valign="bottom"> 
                    <input type="checkbox" id="allcancel_<?php echo $value['id']; ?>"  class="all_cancel" /><i class="fa fa-remove" style="font-size:36px"></i></td>
                </tr>
                </table>
            </div>	         
                <input type="checkbox" class="full_module">
                <span style="font-weight: bold;font-style: italic;color: red">All Module</span>
           </div> 
        <ul class="red treeview-red treeview">
        <?php       
        foreach($module[$key]['submodule']  as $k=>$va)
        { 
        ?>
        <li class="expandable"><div class="hitarea expandable-hitarea">
        </div>
        <span class="f13"><?php echo $va['subModuleName']; ?></span>            
           <ul style="display: block;">
              <li class="last"><span class="f12" style="font-style: italic;color: #0a0;font-weight: bold">
              <input type="checkbox"  class="module_cat_checked" >All</span></li>
         <?php 
         foreach($module[$key]['submodule'][$k]['userForms'] as $user=>$usermodule)
          { 
          ?>
            <li class="last">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="300"><span class="f12"><input type="checkbox" id="role_form_<?php echo $usermodule['id'] ?>"   value="<?php echo $usermodule['id'] ?>"   name="role_form[]" ><?php echo $usermodule['formName'] ?>
                        <input type="hidden" name="moduleid[<?php echo $usermodule['id'] ?>]" value="<?php echo $value['id']; ?>"></span></td>
                        <td width="50" align="left"><input type="checkbox"  class="add_permission_<?php echo $value['id'] ?>" id="add_permission_<?php echo $usermodule['id'] ?>" name="add[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                        <td width="50" align="left"><input type="checkbox"   class="edit_permission_<?php echo $value['id'] ?>" id="edit_permission_<?php echo $usermodule['id'] ?>" name="edit[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                        <td width="55" align="left"><input type="checkbox"  class="delete_permission_<?php echo $value['id'] ?>" id="delete_permission_<?php echo $usermodule['id'] ?>" name="delete[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                        <td width="50" align="left"><input type="checkbox"  class="view_permission_<?php echo $value['id'] ?>" id="view_permission_<?php echo $usermodule['id'] ?>" name="view[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                        <td width="70"  align="left"><input type="checkbox" class="approval_permission_<?php echo $value['id'] ?>" id="approval_permission_<?php echo $usermodule['id'] ?>"name="approval[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                        <td align="left"><input type="checkbox"  class="cancel_permission_<?php echo $value['id'] ?>" id="cancel_permission_<?php echo $usermodule['id'] ?>" name="cancel[<?php echo $usermodule['id'] ?>]" value="1" /></td>
                    </tr>
                </table>
            </li>
        <?php } ?>
       </ul>
      </li>
    <?php } ?>
     </ul>
    </div> 
   <?php $i++; } ?>
  

     <button type="submit" id="addCategory" class="btn btn-primary">Create Role </button>
     <?php echo form_close(); ?>

 </div>
 
