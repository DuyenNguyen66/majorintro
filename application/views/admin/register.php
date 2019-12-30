<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/util.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css"/>

</head>
<body>
    
    
    <div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="width: auto;">
            <form class="login100-form validate-form"  action='' method='POST' enctype="multipart/form-data">
                <span class="login100-form-title p-b-37">
                    REGISTER
                </span>
                <?php if ($this->session->flashdata('error')):?>
                    <div style='color: red; margin: 0 0 20px 0; border: solid 1px #f0a8b5; background: rgba(230,117,136,0.15); padding: 10px; border-radius: 5px'>
                    	<?php echo $this->session->flashdata("error");?>
                    </div>
                
                <?php endif;?>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter Fullname">
                    <input class="input100 form-control" type="text" name="name" placeholder="Fullname">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                    <input class="input100 form-control" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                    <input class="input100 form-control" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>
                <div class="form-group row">
                	<label class="col-md-12">Avatar</label>
                	<div class="col-md-4">
                		<img id='image' width='120' height='120' style='border: 4px solid #c6c6c6; border-radius: 4px'/>
                	</div>
                	<div class="col-md-8">
                		<div class="" onclick="$('#imagePhoto').click()">
                			<input type="file" accept="image/*" name="image" id="imagePhoto" required />
                		</div>
                	</div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name='cmd' value="submit">
                        Sign up
                    </button>
                </div>
                <div class="text-center">
                    <a href="<?php echo base_url('login')?>" class="txt2 hov1">
                        Did you have own account? Login
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/settings.js'); ?>"></script>

</body>
</html>