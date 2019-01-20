
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>
    <link href="<?php echo base_url(); ?>assets4/css/style.css" rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
    .container {
        width: 30%;
        margin-top: 50px;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .form-but {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .form_login{
        margin-top: 50px;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<body>
<div class="container">
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form class="form_login" action="<?php echo base_url("admin/Login/login_auth") ?>" method="post">
        <h2 style="text-align: center">Admin</h2>
        <img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>assets4/image/avatar_2x.png" />

        <?php echo (!empty($error) ? '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</p>' : ''); ?>
        <div class="form-group has-feedback">
            <input type="text" id="inputUsername" class="form-control form-but" name="email" placeholder="email" required="" value="">
            <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="password" id="inputPassword" class="form-control form-but" name="password" placeholder="Password" required="">
            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <div align="center" class="form-group">
            <input type="submit" name="loginSubmit" class="btn-primary " value="Login"/>
            <?php
            echo '<label class="text-danger">'.$this->session->flashdata
                ("error").'</label>';
            ?>
        </div>
    </form>
</div>

</body>
</html>