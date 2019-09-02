 <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $title ? $title : 'Edit User' ?></h3>
            </div>
              <hr/>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"   method="post" id="user_register" name="user_register" >
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo isset($user_info) ? $user_info->name : '' ?>" name="name" id="name" placeholder="Enter user name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo isset($user_info) ? $user_info->email : '' ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="dob" class="col-sm-2 control-label">DOB</label>

                  <div class="col-sm-10">
                      <input type="date" value="<?php echo isset($user_info) ? $user_info->dob : '' ?>" class="form-control" name="dob" id="dob" placeholder="Select DOB">
                  </div>
                </div>
                  
                  
                  
                <div class="form-group">
                  <label for="fin_year" class="col-sm-2 control-label">Fin Year</label>

                  <div class="col-sm-10">
                      <select class="form-control" name="fin_year" id="fin_year">
                        <?php foreach ($fin_year as $year): ?>
                        <option value="<?php echo $year->id ;?>" <?php echo $user_info->finYearID == $year->id ? 'selected' : '' ?> ><?php echo $year->finYear;?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
                  
                  
                  
                  
                                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Register</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          
        </div>