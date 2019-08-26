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
    <div class="form-group">
        <label>Inline Checkboxes</label>
        <label class="checkbox-inline">
            <input type="checkbox">Add
        </label>
        <label class="checkbox-inline">
            <input type="checkbox">Edit
        </label>
        <label class="checkbox-inline">
            <input type="checkbox">Delete
        </label>
    </div>
    <ul class="red treeview-red treeview">
        <li class="expandable">
            <div class="hitarea expandable-hitarea">
                
            </div>
            <span class="f13">
                
            </span>

            <ul style="display: block;">
                <li class="last">
                    <span class="f12" style="font-style: italic;color: #0a0;font-weight: bold">
                        <input type="checkbox"  class="module_cat_checked" >All</span>
                </li>
            </ul>
            <li class="last">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
                    <tr>
                        <td width="300">
                            <span class="f12"><input type="checkbox" id="role_form_"   value=""   name="role_form[]" >
                                <input type="hidden" name="moduleid[]" value=""></span></td>
                        <td width="50" align="left"><input type="checkbox"  class="add_permission_h" id="add_permission_" name="add[]" value="1" /></td>
                        <td width="50" align="left"><input type="checkbox"   class="edit_permission_" id="edit_permission_" name="edit[]" value="1" /></td>
                        <td width="55" align="left"><input type="checkbox"  class="delete_permission_" id="delete_permission_" name="delete[]" value="1" /></td>
                        <td width="50" align="left"><input type="checkbox"  class="view_permission_" id="view_permission_" name="view[]" value="1" /></td>
                        <td width="70"  align="left"><input type="checkbox" class="approval_permission_" id="approval_permission_"name="approval[]" value="1" /></td>
                        <td align="left"><input type="checkbox"  class="cancel_permission_" id="cancel_permission_" name="cancel[]" value="1" /></td>
                    </tr>
                </table>
            </li>

	</ul>
	</li>
	
	
        </ul>
            <button type="submit" id="addCategory" class="btn btn-primary">Create Role </button>
            <?php echo form_close(); ?>


            </div>