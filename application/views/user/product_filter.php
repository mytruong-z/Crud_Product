<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
$user_detail = $this->session->userdata('user_data_session');
$name = $user_detail['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Filters Car</title>

    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href = "<?php echo base_url(); ?>bootstrap/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>bootstrap/style.css" rel="stylesheet">
</head>
<style>
    .search_product {
        margin-top: 45px;
    }
    .navbar-fixed-top{
        color: #3c3c3c;
        background-color: #e7e7e7;
    }
    .navbar{
        min-height: 10px;
    }
    .logout_client{
        margin-right: 15px;
        float: right;
        color: #3c3c3c;
    }
    .cart{
        float: left;
        color: #a61717  ;
    }
    .row1{
        margin-top: -50px;
    }
    .brand{
        display: none;
    }
    .brands{
        margin-right: 10px;
    }
    .brand_hover:hover{
        background-color: #5cb85c;
        color: whitesmoke;
    }
    .price{
        width: 70px;
        height: 30px;
        color:  #404040;;
        border-radius: 3px;
        border: 1px solid #ddd;
        margin-right: 3px;
    }
    .btnPrice{
        padding: 4px 8px 4px 8px;
    }
    .sort{
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .btnPriceDown{
        margin-left: 10px;
    }
    .btnPriceUp{
        margin-right: 10px;
    }
    .glyphicon-transfer{
        margin-left: 5px;
        margin-right: 5px;
    }
    .log_out{
        padding-bottom: 2px;
        padding-top: 2px;
        color: black;
        font-family: monospace;
    }
    .dropdown-menu{
        border-radius: 3px;
        padding: 5px 10px;
    }
</style>

<body>
<div>
    <nav class="navbar navbar-fixed-top log_out" role="navigation">
        <ul class="">
            <li class="dropdown logout_client ">
                <a class="log_out"  href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $name;?>  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <div><a href="<?php echo base_url("user/Logout/index")?>">Logout</a></div>
                    </li>
                </ul>

            </li>
        </ul>
    </nav>

        <div class="search_product">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-md-4">
                    <form method="post">
            <div class="input-group">
                <input type="text" name="search" id="myInput" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-success" name="btnSearch" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
                  </span>
            </div><!-- /input-group -->
                    </form>
                </div>
        <div class="col-sm-4 cart">
            <a href="<?php echo base_url('user/cart'); ?>" class="cart-link cart" title="View Cart">
                <i style="font-size: xx-large" class=" glyphicon glyphicon-shopping-cart"></i>
                <span">(<?php echo $this->cart->total_items(); ?>)</span>
            </a>
        </div>
            </div>

        </div>
</div>

<!-- Page Content -->
<div class="container">
    <div>

    </div>
    <h1 align="center" style="margin-bottom: 45px">All Product of Lines Auto Car</h1>

    <div class="row row1">
        <div class="col-md-3">

            <br />
            <div class="list-group">
             <form method="post">
                <h3>Price</h3>
                 <div class="input-group sort">
                     <button class="btn btn-primary btnPriceUp" name="btnPriceUp" type="submit"><span class="glyphicon glyphicon-sort-by-order"></span> </button>
                     <span class="glyphicon glyphicon-transfer"></span>
                     <button class="btn btn-danger btnPriceDown" name="btnPriceDown" type="submit"><span class="glyphicon glyphicon-sort-by-order-alt"></span> </button>
                 </div>
                <div class="input-group">
                <input class="price" type="number" name="priceMin" placeholder="min" value="" />-
                <input class="price" type="number" placeholder="max" name="priceMax" value="" />
                    <button class="btn btn-success btnPrice" name="btnPrice" type="submit"><span class="glyphicon glyphicon-play"></span> </button>
                </div>


             </form>
            </div>
            <div class="list-group ">
                <h3>Brand</h3>
                <div class="list-group-item checkbox brand_hover">
                <label style="font-weight: bold"><button class="brands" onclick="reload()" type="submit" name="brand_all"></button><input name="brand" type="text" class="common_selector brand" value="all">All Product</label>
                </div>
                <?php
                foreach($brand_data->result_array() as $row)
                {
                    ?>
                    <form method="post">
                    <div class="list-group-item checkbox brand_hover">
                        <label><button class="brands" type="submit" name="brands"></button><input name="brand" type="text" class="common_selector brand" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></label>
                    </div>
                    </form>
                    <?php
                }
                ?>
            </div>

        </div>

        <div class="col-md-9">
            <br />
            <div align="center" id="pagination_link">

            </div>
            <br />
            <br />
            <br />
            <div class="row filter_data">
               <? foreach($product as $row)
                { ?>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:300px;">
                        <img align="center" style="margin-bottom: 20px" src="<?php echo  base_url()?>images/products/<?php echo  $row['image'];?>" alt="" height="155px" width="150px" class="" >
                        <p align="center"><strong><a href="#"><?php echo  $row['name'];?></a></strong></p>
                        <h4 style="text-align:center;" class="text-danger" ><?php echo  $row['price'];?></h4>
                        <div align="center" class="atc">
                            <a  href="<?php echo base_url()?>user/Product_filter/addToCart/<?php echo  $row['id'];?>" class="btn btn-success">
                                Add to Cart</a>
                        </div>
                    </div>
                </div>

               <?php } ?>
            </div>
        </div>
    </div>

</div>
<script>
    function reload() {
        window.location.assign('<?php echo base_url()?>user/Product_filter');//load page again

    }
</script>


</body>

</html>
