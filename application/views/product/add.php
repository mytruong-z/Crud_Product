<head>
    <base href="<?php echo 'BASE_URL';?>">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
    <script src="<?php echo base_url("bootstrap/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
</head>
<html>
<style>
    .container {
        width: 30%;
        margin: auto;
        margin-top: 50px;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    input[type=text] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
        margin-right: 30px;
    }
    .cancel{
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
    #mySidenav a {
        position: absolute;
        left: -80px;
        transition: 0.3s;
        padding: 10px;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
    }

    #mySidenav a:hover {
        left: 0;
    }

    #cancel {
        top: 0px;
        background-color: #a61717;
    }


</style>

<body>
<div id="mySidenav" class="sidenav">
    <a id="cancel" href="<?=base_url()?>admin/product/show_product_id">Cancel</a>

</div>
<div class="container">
    <div style="text-align: center"><h2>Add Product</h2></div>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form action="add" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td></td>
                <td><span style="color: red;"><?php echo validation_errors(); ?></span></td>
            </tr>
            <tr>
                <td>Cat_id</td>

                <td>
                    <select name="category_id">
                        <?php foreach ($category as $value) { ?>
                    <option value="<?php  echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php } ?>
                    </select>
                </td>

            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name">
                </td>

            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price">
                </td>

            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image">
                </td>


            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnaddP" value="Add"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>