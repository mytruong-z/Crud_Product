<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
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
        margin-top: 50px;
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



</style>


<body>
<div><nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url()?>admin/Home/index">Home</a>
        </div>
        <div><h2 style="text-align: center" class="h2_style">Categories</h2></div>
    </nav>
</div>

<div class="container">

    <div id="detail">
        <?php foreach ($single_category as $cate) {?>

            <form class="border-form" method="post" action="<?php echo base_url("admin/category/update_category_id") ?>" enctype="multipart/form-data">
                <a id="cancel"  class="cancel" href="<?php echo base_url()."admin/category/show_category_id"?>"><span  class="glyphicon glyphicon-remove"></span></a>

                <div class="form-group"><label id="hide">Id :</label>
                    <input type="text" id="hide" name="id" class="form-but" value="<?php echo $cate->id; ?>">
                </div>
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-but" value="<?php echo $cate->name; ?>">
                </div>
                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" name="image" value="<?php echo $cate->image; ?>">
                    <input  id="hide" type="text" class="form-but" name="name_image" value="<?php echo $cate->image; ?>">
                    <p><img src="<?=base_url()?>images/categories/<?php echo $cate->image;?>" class="img-thumbnail" alt="Cinque Terre" width="100px" height="100px" >
                    </p>
                </div>
                <input class="editbtn" type="submit" id="submit" name="dsubmit" value="Update">
            </form>
        <?php } ?>
    </div>

    <div id="add">
        <a class="bold" href = "<?=base_url()?>admin/category/add"><button class="add btn-success">Add Category</button></a>
    </div>

    <table class="table" border="0">
        <tr class="danger">
            <td class="bold" id="hide">Id</td>
            <td class="bold">Name</td>
            <td class="bold">Picture</td>
            <td class="bold">Action</td>
        </tr>
        <?php foreach ($category as $value) {?>
            <tr>
                <td id="hide"><?php echo $value["id"];?></td>
                <td><?php echo $value["name"];?></td>
                <td><img src="<?=base_url()?>images/categories/<?php echo $value['image'];?>" class="img-thumbnail" alt="Cinque Terre" width="100px" height="100px" ></td>
                <td>
               <a id="edit" href="<?=base_url()?>admin/category/show_category_id/<?php echo $value["id"];?>""><button class="btn-primary">Edit</button></a>
                    <a href="<?=base_url()?>admin/category/delete_category/<?php echo $value["id"];?>""><button class="btn-danger">Delete</button></a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>

</body>
</html>
