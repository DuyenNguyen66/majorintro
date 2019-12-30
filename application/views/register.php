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
                <div class="row">
	                <div class="col-md-6 form-group">
	                	<label>Fullname</label>
	                    <input class="form-control" type="text" name="name" placeholder="Type fullname" required>
	                </div>
	                <div class="col-md-6 form-group">
	                	<label>Student Code</label>
	                    <input class="form-control" type="text" name="code" placeholder="Type Code" required>
	                </div>
                </div>
                <div class="row">
                	<div class="col-md-6 form-group">
	                	<label>Email</label>
	                    <input class="form-control" type="text" name="email" placeholder="Type email" required>
	                </div>
	                <div class="col-md-6 form-group">
	                	<label>Password</label>
	                    <input class="form-control" type="password" name="password" placeholder="Type password" required>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6 form-group">
	                	<label>Phone number</label>
	                    <input class="form-control" type="text" name="phone" placeholder="Type phone" required>
	                </div>
	                <div class="col-md-6 form-group">
	                	<label>Address</label>
	                    <input class="form-control" type="text" name="address" placeholder="Type address" required>
	                </div>
	            </div>
                <div class="row">
                	<div class="col-md-4 form-group">
	                	<label>Gender</label>
	                	<div class="col-md-12">
	                		<input type="radio" name="gender" value="1" checked >&nbsp;Male&nbsp;&nbsp;&nbsp;
	                		<input type="radio" name="gender" value="0">&nbsp;Female
	                	</div>
	                </div>
	                <div class="col-md-4 form-group">
	                	<label>Birthday</label>
	                    <input class="form-control" type="date" name="birthday" required>
	                </div>
	               
	            </div>
                <div class="row">
                	<div class="col-md-6 form-group">
	                	<label>Ethnic</label>
	                	<select class="form-control" name="ethnic_id" required="">
	                		<option value="">Select Ethnic</option>
	                		<?php foreach($ethnics as $ethnic):?>
	                		<option value="<?php echo $ethnic['ethnic_id'] ?>"><?php echo $ethnic['name'] ?></option>
	                		<?php endforeach;?>
	                	</select>
	                </div>
	                <div class="col-md-6 form-group">
	                	<label>Religion</label>
	                	<select class="form-control" name="religion_id" required="">
	                		<option value="">Select Religion</option>
	                		<?php foreach($religions as $religion):?>
	                		<option value="<?php echo $religion['religion_id'] ?>"><?php echo $religion['name'] ?></option>
	                		<?php endforeach;?>
	                		<option value="0">None</option>
	                	</select>
	                </div>
	            </div>
                <div class=" form-group">
                	<label class="col-md-12">Student Card</label>
                	<div class="col-md-6">
                		<div class="" onclick="$('#imagePhoto').click()">
                			<input type="file" accept="image/*" name="image" id="imagePhoto" required />
                		</div>
                	</div>
                	<div class="col-md-6">
                		<img id='image' width='300' height='200' style='border: 4px solid #c6c6c6; border-radius: 4px'/>
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