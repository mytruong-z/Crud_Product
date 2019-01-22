<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <base href="<?php echo 'BASE_URL';?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
    <script src="<?php echo base_url("bootstrap/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
</head>
<style>
    .container{
        width: 80%;
        margin-top: 100px;
    }
    .bold{
        font-weight: bold;
    }
    .table{
        margin-top: 10px;
    }
    .add {
        float:right;
        margin-top:10px;
    }
    #hide{
        display: none;
    }
    .editbtn{
        background-color: #d58512;
        color: white;
    }
    .form-but {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 10px;
        resize: vertical;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    #detail{
        width: 30%;
    }
    .border-form{
        border-style: dashed;
        border-width: 5px;
        border-color: #2cc36b;
        padding: 15px;
    }
    .glyphicon-remove{
        float: right;
        color: #a61717;
        z-index: 1;
        font-size: xx-large;
    }
    .h2_style{
        color: white;
        text-align: center;
        margin-top: 10px;
    }
    .input_search{
        margin-top: 10px;
        width: 20%;
    }
    .input-group .form-control:first-child{
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<body>
<div><nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url()?>admin/Home/index">Home</a>
        </div>
        <div><h2 style="text-align: center" class="h2_style">Users</h2></div>
    </nav>
</div>
<div class="container">

    <div id="detail">
        <?php foreach ($single_client as $cli) {?>

            <form class="border-form" method="post" action="<?php echo base_url("admin/Crud_user/update_user_id") ?>" enctype="multipart/form-data">
                <a id="cancel"  class="cancel" href="<?php echo base_url()."admin/Crud_user/show_user_id"?>"><span  class="glyphicon glyphicon-remove"></span></a>

                <div class="form-group"><label id="hide">Id :</label>
                    <input type="text" id="hide" name="id" class="form-but" value="<?php echo $cli->id; ?>">
                </div>
                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" name="username" class="form-but" value="<?php echo $cli->username; ?>">
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input type="text" name="email" class="form-but" value="<?php echo $cli->email; ?>">
                </div>
                <div class="form-group">
                    <label>First Name :</label>
                    <input type="text" name="first_name" class="form-but" value="<?php echo $cli->first_name; ?>">
                </div>
                <div class="form-group">
                    <label>Last Name :</label>
                    <input type="text" name="last_name" class="form-but" value="<?php echo $cli->last_name; ?>">
                </div>
                <div class="form-group">
                    <label>User Type :</label>
                    <input type="text" name="user_type" class="form-but" value="<?php echo $cli->user_type; ?>">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="text" name="password" class="form-but" value="<?php echo $cli->password; ?>">
                </div>
                <input class="editbtn" type="submit" id="submit" name="dsubmit" value="Update">
            </form>
        <?php } ?>
    </div>

    <div id="add">
        <a class="bold" href = "<?=base_url()?>admin/Crud_user/add"><button class="add btn-success">Add User</button></a>
    </div>
    <form method="get" action="<?php echo base_url("admin/Crud_user/show_user_id") ?>">
        <div class="input-group input_search">
            <input type="text" name="search" id="myInput" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-success" name="btnSearch" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
            </span>
        </div>
    </form>
    <table class="table" border="0">
        <tr class="danger">
            <td class="bold" id="hide">Id</td>
            <td class="bold">Username</td>
            <td class="bold">Email</td>
            <td class="bold">First Name</td>
            <td class="bold">Last Name</td>
            <td class="bold">User_type</td>
            <td class="bold">Password</td>
            <td class="bold">Action</td>
        </tr>
        <?php foreach ($client as $value) {?>
            <tr>
                <td id="hide"><?php echo $value["id"];?></td>
                <td><?php echo $value["username"];?></td>
                <td><?php echo $value["email"];?></td>
                <td><?php echo $value["first_name"];?></td>
                <td><?php echo $value["last_name"];?></td>
                <td><?php echo $value["user_type"];?></td>
                <td><?php echo $value["password"];?></td>
                <td>
                    <a id="edit" href="<?=base_url()?>admin/Crud_user/show_user_id/<?php echo $value["id"];?>""><button class="btn-primary">Edit</button></a>
                    <a href="<?=base_url()?>admin/Crud_user/delete/<?php echo $value["id"];?>""><button class="btn-danger">Delete</button></a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>
</body>
</html>
