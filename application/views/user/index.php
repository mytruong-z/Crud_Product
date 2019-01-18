
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href = "<?php echo base_url(); ?>bootstrap/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>bootstrap/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




    <!-- Custom CSS -->
</head>
<style>

    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        height: 100px;
        padding: 1px;
        width: 170px;
    }
    .caption{
        height: 100px;
    }
    .thumbnails {
        display: block;
        padding: 5px 2px 5px 2px;
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: border .2s ease-in-out;
        -o-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out;
    }
    .navbar-fixed-top{
        color: #3c3c3c;
        font-weight: bold;
        background-color: whitesmoke;
    }
    .logout_client{
        margin-top: 15px;
        margin-right: 15px;
        float: right;
        color: #3c3c3c;
    }

</style>
<body>
<div><nav class="navbar navbar-fixed-top">
        <div class="navbar-footer">
            <a class="logout_client" href="<?php echo base_url("user/Logout/index")?>">Logout</a>
        </div>

    </nav>
</div>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <br />
            <br />
            <br />
            <div class="list-group">
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                <p id="price_show">1000 - 65000</p>
                <div id="price_range"></div>
            </div>
            <div class="list-group">
                <h3>Brand</h3>
                <?php foreach ($category as $value) {?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $value["name"];?>"  > <?php echo $value["name"];?></label>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="col-md-9">
            <div align="center" id="pagination_link">
                <div>
                    <!-- List all products -->
                    <h2 align="center" style="margin-top: 55px;margin-bottom: 45px">All Product of Lines Auto Car</h2>

                    <div class="row" id="conmar">
                        <form method="post" action="index" >
                            <div class="col-lg-12">
                            <?php if(!empty($product)){ foreach($product as $row){ ?>
                                <div class="col-sm-4 col-lg-3 col-md-3">
                                    <div class="thumbnails">
                                        <input name="id"  value="<?php echo $row['id']; ?>">
                                        <img class="img_pro" src="<?php echo base_url('images/products/'.$row['image']); ?>" />
                                        <div class="caption">

                                            <h4><?php echo $row['name']; ?></h4>
                                            <h4>$<?php echo $row['price']; ?></h4>
                                        </div>
                                        <div class="atc">
                                            <a  href="<?php echo base_url('products/addToCart/'.$row['id']); ?>" class="btn btn-success">
                                                Add to Cart
                                            </a>
                                            <input type="submit" name="btnadd" value="add">
                                        </div>
                                    </div>
                                </div>

                            <?php } }else{ ?>
                                <p>Product(s) not found...</p>
                            <?php } ?>
                        </div>
                            <input type="submit" value="Check" name="btnCheck">
                        </form>
                    </div>
                </div>
            <div class="row filter_data">
            </div>
        </div>
    </div>

</div>
<style>
</style>


</body>

</html>