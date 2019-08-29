<html>
    <head>
                  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/metisMenu/metisMenu.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/sb-admin-2.css" class="theme-stylesheet" id="theme-style" />
     
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" />
        <title><?php echo ( isset($title) && $title !='' ) ? $title : 'Tech Arise' ?></title>
    </head>
    <body>
   

<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                         <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
                <?php if (!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
                    <div class="alert alert-danger">
                        Please Enter Your Valid Information.
                    </div>
                <?php } ?>
                <?php echo form_open('users/dologin'); ?> 
                       
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            </fieldset>
                           <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>